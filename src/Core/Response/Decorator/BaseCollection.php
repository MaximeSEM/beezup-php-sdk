<?php

namespace BeezupSDK\Core\Response\Decorator;

use BeezupSDK\Core\Exception\ApiException;
use BeezupSDK\Core\Exception\EtagException;
use BeezupSDK\Core\Response\ResponseDecoratorInterface;
use Psr\Http\Message\ResponseInterface;

class BaseCollection implements ResponseDecoratorInterface
{

    use ErrorTrait;
    use HeaderTrait;

    /**
     * @var string
     */
    protected string $class;

    /**
     * @var null|string
     */
    protected ?string $key;
    protected ?string $idColumn;

    /**
     * @param string $class
     * @param string|null $key
     * @param null $idColumn
     */
    public function __construct(string $class = \BeezupSDK\Core\Domain\Collection\BaseCollection::class, string $key = null, $idColumn = null)
    {
        $this->class = $class;
        $this->key = $key;
        $this->idColumn = $idColumn;
    }

    /**
     * @param ResponseInterface $response
     * @return mixed
     * @throws ApiException
     * @throws EtagException
     */
    public function decorate(ResponseInterface $response): mixed
    {
        $this->beforeDecorate($response);
        $data = (new AssocArray())->decorate($response);
        $this->afterDecorate($data);

        $totalCount = null;
        if ($this->key) {
            if (isset($data['paginationResult']['totalEntryCount'])) {
                $totalCount = $data['paginationResult']['totalEntryCount'];
            }
            $keys = explode('.', $this->key);
            foreach ($keys as $k) {
                $data = $data[$k];
            }
        }
        if ($this->idColumn) {
            $return = [];
            foreach ($data as $d) {
                if (is_array($d)) {
                    $return[$d[$this->idColumn]] = $d;
                } else if (is_object($d)) {
                    $return[$d->{$this->idColumn}] = $d;
                }
            }
            $data = $return;
        }
        $headers = $this->getDataHeader($response);
        return new $this->class($data, $totalCount, $headers);
    }
}
