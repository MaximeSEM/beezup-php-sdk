<?php

namespace BeezupSDK\Core\Response\Decorator;

use BeezupSDK\Core\Exception\ApiException;
use BeezupSDK\Core\Exception\EtagException;
use BeezupSDK\Core\Response\ResponseDecoratorInterface;
use Psr\Http\Message\ResponseInterface;

class BaseObject implements ResponseDecoratorInterface
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

    /**
     * @param string $class
     * @param string|null $key
     */
    public function __construct(string $class = \BeezupSDK\Core\Domain\BaseObject::class, ?string $key = null)
    {
        $this->class = $class;
        $this->key = $key;
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
        $data = $this->afterDecorate($data);
        if ($this->key) {
            $keys = explode('.', $this->key);
            foreach ($keys as $k) {
                $data = $data[$k];
            }
        }
        $headers = $this->getDataHeader($response);
        return new $this->class($data, $headers);
    }
}
