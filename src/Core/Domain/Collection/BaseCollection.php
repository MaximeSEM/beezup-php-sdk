<?php

namespace BeezupSDK\Core\Domain\Collection;

use ArrayAccess;
use ArrayIterator;
use BeezupSDK\Core\Response\Decorator;
use BeezupSDK\Core\Domain\ArrayableInterface;
use BeezupSDK\Core\Domain\HeaderTrait;
use Countable;
use IteratorAggregate;
use JetBrains\PhpStorm\Pure;
use Traversable;

class BaseCollection implements ArrayableInterface, ArrayAccess, IteratorAggregate, Countable
{
    use HeaderTrait;
    /**
     * Collection items
     *
     * @var array
     */
    protected array $items = [];

    /**
     * @var string|null
     */
    protected ?string $itemClass;

    /**
     * @var int|null
     */
    protected ?int $totalCount;

    /**
     * @param array $items
     * @param int|null $totalCount
     * @param array|null $headers
     */
    public function __construct(array $items = [], ?int $totalCount = null, ?array $headers = [])
    {
        $this->setItems($items);
        if (null !== $totalCount) {
            $this->setTotalCount($totalCount);
        }
        if ($headers) {
            $this->setHeaders($headers);
        }
    }

    /**
     * @param array $items
     * @param int|null $totalCount
     * @return  $this
     */
    public static function create(array $items = [], ?int $totalCount = null): static
    {
        if (!isset($totalCount)) {
            if ($items) {
                $totalCount = count($items);
            } else {
                $totalCount = 0;
            }
        }
        return new static($items, $totalCount);
    }

    /**
     * Useful method for requests returning collections
     *
     * @param string|null $key
     * @param string|null $idColumn
     * @return  Decorator\BaseCollection
     */
    #[Pure]
    public static function decorator(?string $key = null,?string $idColumn = null): Decorator\BaseCollection
    {
        return new Decorator\BaseCollection(static::class, $key, $idColumn);
    }

    /**
     * @param mixed $item
     * @return  $this
     */
    public function add(mixed $item): self
    {
        $this->items[] = !is_object($item) ? $this->newItem($item) : $item;

        return $this;
    }

    /**
     * @param array $item
     * @return  mixed
     */
    public function newItem(array $item): mixed
    {
        return strlen($this->itemClass) ? new $this->itemClass($item) : $item;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * @return  mixed
     */
    public function current(): mixed
    {
        return current($this->items);
    }

    /**
     * @param mixed $offset
     * @return  bool
     */
    public function exists(mixed $offset): bool
    {
        return $this->offsetExists($offset);
    }

    /**
     * @param mixed $offset
     * @return  bool
     */
    public function offsetExists(mixed $offset): bool
    {
        return isset($this->items[$offset]);
    }

    /**
     * @return  mixed
     */
    public function first(): mixed
    {
        return reset($this->items);
    }

    /**
     * @param   $offset
     * @return  mixed
     */
    public function get($offset): mixed
    {
        return $this->offsetGet($offset);
    }

    /**
     * @param $offset
     * @return mixed
     */
    public function offsetGet($offset): mixed
    {
        return $this->items[$offset] ?? null;
    }

    /**
     * @return array
     */
    public function getEmptyValue(): array
    {
        return [];
    }

    /**
     * @return  array
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     * @return  $this
     */
    public function setItems(array $items): self
    {
        if ($this->itemClass) {
            array_walk($items, function (&$item) {
                if (is_array($item)) {
                    $item = $this->newItem($item);
                }
            });
        }
        $this->items = $items;

        return $this;
    }

    /**
     * @return  int|null
     */
    public function getTotalCount(): ?int
    {
        return $this->totalCount;
    }

    /**
     * @param int $totalCount
     * @return  $this
     */
    public function setTotalCount(int $totalCount): self
    {
        $this->totalCount = $totalCount;

        return $this;
    }

    /**
     * @return Traversable
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }

    /**
     * @return bool
     */
    public function isEmpty(): bool
    {
        return empty($this->items);
    }

    /**
     * @return  mixed
     */
    public function last(): mixed
    {
        return end($this->items);
    }

    /**
     * @return  mixed
     */
    public function next(): mixed
    {
        return next($this->items);
    }

    /**
     * @return  mixed
     */
    public function prev(): mixed
    {
        return prev($this->items);
    }

    /**
     * @param mixed $offset
     */
    public function remove(mixed $offset): void
    {
        $this->offsetUnset($offset);
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset(mixed $offset): void
    {
        if (isset($this->items[$offset])) {
            unset($this->items[$offset]);
        }
    }

    /**
     * @return  $this
     */
    public function reset(): self
    {
        $this->items = [];

        return $this;
    }

    /**
     * @param mixed $key
     * @param mixed $value
     */
    public function set(mixed $key, mixed $value): void
    {
        $this->offsetSet($key, $value);
    }

    /**
     * @param mixed $offset
     * @param $value
     * @return void
     */
    public function offsetSet(mixed $offset, $value): void
    {
        $this->items[$offset] = $value;
    }

    /**
     * @param string $class
     * @return  $this
     */
    public function setItemClass(string $class): self
    {
        $this->itemClass = $class;

        return $this;
    }

    /**
     * @return  array
     */
    public function toArray(): array
    {
        $result = [];
        foreach ($this as $k => $item) {
            if ($item instanceof ArrayableInterface) {
                $item = $item->toArray();
            }
            $result[$k] = $item;
        }

        return $result;
    }

    /**
     * @param string $method
     * @param array $args
     * @return  array
     */
    public function walk(string $method, array $args = []): array
    {
        $result = [];
        foreach ($this as $k => $item) {
            $result[$k] = call_user_func_array([$item, $method], $args);
        }

        return $result;
    }
}
