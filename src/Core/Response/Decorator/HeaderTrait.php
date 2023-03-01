<?php

namespace BeezupSDK\Core\Response\Decorator;

use Psr\Http\Message\ResponseInterface;

trait HeaderTrait
{
    /***
     * @param ResponseInterface $response
     * @return array
     */
    protected function getDataHeader(ResponseInterface $response): array
    {
        return $response->getHeaders();
    }
}
