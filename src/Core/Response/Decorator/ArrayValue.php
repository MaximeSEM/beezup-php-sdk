<?php

namespace BeezupSDK\Core\Response\Decorator;

use BeezupSDK\Core\Exception\ApiException;
use BeezupSDK\Core\Response\ResponseDecoratorInterface;
use Psr\Http\Message\ResponseInterface;

class ArrayValue implements ResponseDecoratorInterface
{
    /**
     * @var string
     */
    protected string $key;

    /**
     * @param string $key
     */
    public function __construct(string $key)
    {
        $this->key = $key;
    }

    /**
     * @param ResponseInterface $response
     * @return mixed
     * @throws ApiException
     */
    public function decorate(ResponseInterface $response): mixed
    {
        return (new AssocArray())->decorate($response)[$this->key];
    }
}
