<?php

namespace BeezupSDK;

use BeezupSDK\Core\Client\AbstractApiClient;
use BeezupSDK\Domain\ApiIndex\ValuesList;
use BeezupSDK\Request\ApiIndex\GetValuesListRequest;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;

/**
 * @method ValuesList|Response getValuesList(GetValuesListRequest $request)
 **/
class ClientAttributes extends AbstractApiClient
{
    protected string $url = 'https://mkp-attributes.beezup.com/public';

    /**
     * @return  GuzzleClient
     */
    protected function getDefaultClient(): GuzzleClient
    {
        $stack = HandlerStack::create();
        $stack->push(Middleware::history($this->history));

        $logger = $this->getLogger();
        if (!empty($logger)) {
            $stack->push(Middleware::log($logger, $this->getMessageFormatter()));
        }

        return new GuzzleClient([
            'handler' => $stack,
            'base_uri' => rtrim($this->getBaseUrl(), '/') . '/',
            'verify' => false,
            'headers' => [
                'User-Agent' => $this->getUserAgent() ?: static::getDefaultUserAgent(),
                'Accept' => 'application/json',
                'Accept-Encoding' => 'gzip, deflate, br'
            ],
        ]);
    }

    public function getBaseUrl(): string
    {
        return $this->url;
    }
}
