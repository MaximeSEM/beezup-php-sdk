<?php

namespace BeezupSDK\Core\Domain;

use ArrayIterator;
use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Core\Exception\RequestValidationException;
use BeezupSDK\Core\Utility\Functions;
use DateTime;
use Exception;
use InvalidArgumentException;
use IteratorAggregate;
use JetBrains\PhpStorm\Pure;
use Traversable;

class BaseObject implements ArrayableInterface, IteratorAggregate
{
    use DataObjectTrait;
    use HeaderTrait;

    /**
     * Array that will be used for aliasing data keys of current object
     * For example:
     * With:
     * $mapping = [
     *     'product_sku' => 'product/sku'
     * ]
     * Before map():
     * $data = [
     *     'product_sku' => 'SKU-1234'
     * ];
     * After map():
     * $data = [
     *     'product' => [
     *         'sku' => 'SKU-1234'
     *     ]
     * ]
     *
     * @var array
     */
    protected static array $mapping = [];

    /**
     * Array of key => callable static method to call when setting data
     * For example:
     * [
     *     'foo' => [BaseObject::class, 'create'] // will transform an array into BaseObject for key 'foo'
     * ];
     *
     * @see setData()
     * @var array
     */
    protected static array $dataTypes = [];
    /**
     * Array of key => array of allowed strings to set value
     * For example:
     * [
     *     'size' => ["S","L","XL"]
     * ];
     * @see setData()
     * @var array
     */
    protected static array $allowedValues = [];

    /**
     * @param array $data
     * @param array|null $headers
     */
    public function __construct(array $data = [], ?array $headers = [])
    {
        if (!empty($data)) {
            $this->setData($data);
        }
        if ($headers) {
            $this->setHeaders($headers);
        }
    }

    /**
     * @param array|string $key
     * @param mixed|null $value
     * @return $this
     */
    public function setData(array|string $key, mixed $value = null): static
    {
        if (is_array($key)) {
            $this->setDataArray($key);
        } else {
            $this->setDataValue($key, $value);
        }

        $this->cleanup();

        return $this;
    }

    /**
     * Sets array of data to current object after doing a map on it
     *
     * @param array $data
     * @return  $this
     */
    protected function setDataArray(array $data): static
    {
        $data = static::map($data);
        foreach ($data as $key => $value) {
            $method = 'set' . Functions::pascalize($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            } else {
                $this->setDataValue($key, $value);
            }
        }

        return $this;
    }

    /**
     * @param array $data
     * @return  array
     */
    public static function map(array $data): array
    {
        return Functions::arrayMapKeys($data, static::$mapping);
    }

    /**
     * Associates value to key after doing a map on key and validation on value
     *
     * @param string $key
     * @param mixed $value
     * @return  $this
     */
    protected function setDataValue(string $key, mixed $value): static
    {
        if (null !== $value) {
            $this->data[$this->delimit($key)] = static::value($key, $value); // value has to be transformed and validated
        }

        return $this;
    }

    /**
     * Transforms data value according to $dataTypes and $dateFields properties
     *
     * @param string $key
     * @param mixed $value
     * @return  mixed
     */
    public static function value(string $key, mixed $value): mixed
    {
        $dataTypes = static::getDataTypes();
        if (isset(self::$allowedValues[$key]) && is_array(self::$allowedValues[$key])) {
            if (!is_string($value))
                throw new InvalidArgumentException(sprintf("%s need to be a string, %s is sent", $key, gettype($value)));
            if (!in_array($value, self::$allowedValues[$key]))
                throw new InvalidArgumentException(sprintf("Only \"%s\" are allowed for %s. \"%s\" is try to be set", implode('", "', self::$allowedValues[$key]), $key, $value));
        }
        if (isset($dataTypes[$key])) {
            $callable = $dataTypes[$key];
            if (is_string($callable) && function_exists($callable)) {
                $value = $callable($value);
            } else if (is_string($callable) && $callable == DateTime::class) {
                try {
                    $value = new DateTime($value);
                } catch (Exception $e) {
                    throw new InvalidArgumentException(
                        sprintf('DateTime %s with value %s get error : %s', $key, $value, $e->getMessage())
                    );
                }
            } else if (!is_object($value)) {
                $value = forward_static_call($callable, $value);
            } elseif (!$value instanceof $callable[0]) {
                throw new InvalidArgumentException(
                    sprintf('%s must be an instance of %s', $key, $callable[0])
                );
            }
        }

        return $value;
    }

    /**
     * Returns all merged $dataTypes properties
     *
     * @return  array
     */
    public static function getDataTypes(): array
    {
        static $dataTypesCache = [];
        $class = $parent = get_called_class();
        if (!isset($dataTypesCache[$class])) {
            $dataTypes = [];
            do {
                if ($dataTypesParent = @get_class_vars($parent)['dataTypes']) {
                    $dataTypes += $dataTypesParent;
                }
            } while ($parent = get_parent_class($parent));
            $dataTypesCache[$class] = $dataTypes;
        }

        return $dataTypesCache[$class];
    }

    /**
     * Cleans up data by removing null values
     *
     * @return  void
     */
    public function cleanup(): void
    {
        // Remove null values
        $this->data = array_filter($this->data, function ($val) {
            return null !== $val;
        });
    }

    /**
     * Useful method for requests returning domain objects
     *
     * @param string|null $key
     * @return  \BeezupSDK\Core\Response\Decorator\BaseObject
     */
    #[Pure]
    public static function decorator(?string $key = null): \BeezupSDK\Core\Response\Decorator\BaseObject
    {
        return new \BeezupSDK\Core\Response\Decorator\BaseObject(static::class, $key);
    }

    /**
     * Creates a collection of current object
     *
     * @param array $items
     * @return  BaseCollection
     */
    public static function getCollection(array $items = []): BaseCollection
    {
        $collection = new BaseCollection();
        $collection->setItemClass(get_called_class());
        foreach ($items as $item) {
            $collection->add(is_object($item) ? $item : static::create($item));
        }

        return $collection;
    }

    /**
     * @return Traversable
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->data);
    }

    /**
     * @return  array
     */
    public function wrap(): array
    {
        return static::map($this->toArray());
    }

    /**
     * @return  array
     */
    public function unwrap(): array
    {
        return static::unmap($this->toArray());
    }

    /**
     * @param array $data
     * @return  array
     */
    public static function unmap(array $data): array
    {
        return Functions::arrayMapKeys($data, array_flip(static::$mapping));
    }
}
