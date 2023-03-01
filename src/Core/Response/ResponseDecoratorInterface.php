<?php

namespace BeezupSDK\Core\Response;

use BeezupSDK\Core\Exception\ApiException;
use Psr\Http\Message\ResponseInterface;

interface ResponseDecoratorInterface
{
    /**
     * @param ResponseInterface $response
     * @return  mixed
     * @throws ApiException
     */
    public function decorate(ResponseInterface $response): mixed;
}
