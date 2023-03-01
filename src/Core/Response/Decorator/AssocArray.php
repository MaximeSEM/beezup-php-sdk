<?php

namespace BeezupSDK\Core\Response\Decorator;

use BeezupSDK\Core\Exception\ApiException;
use BeezupSDK\Core\Response\ResponseDecoratorInterface;
use BeezupSDK\Core\Utility\Functions;
use Psr\Http\Message\ResponseInterface;

class AssocArray implements ResponseDecoratorInterface
{
    /**
     * @param ResponseInterface $response
     * @return array
     * @throws ApiException
     */
    public function decorate(ResponseInterface $response): array
    {

        if (str_starts_with($response->getHeaderLine('Content-Type'), 'application/json')) {
            return Functions::parseJsonResponse($response);
        } else if (str_starts_with($response->getHeaderLine('Content-Type'), 'application/xml') || str_starts_with($response->getHeaderLine('Content-Type'), 'text/xml')) {
            return Functions::parseXmlResponse($response);
        } else if (!$response->getBody()->getContents()) {
            return [];
        }
        throw new ApiException($response->getBody()->getContents());

    }
}
