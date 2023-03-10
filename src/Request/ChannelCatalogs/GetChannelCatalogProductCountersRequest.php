<?php

namespace BeezupSDK\Request\ChannelCatalogs;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\ChannelCatalogs\ProductCounters;

/**
 * @method  string  getChannelCatalogId()
 * @method  $this setChannelCatalogId(string $channelCatalogId)
 */
class GetChannelCatalogProductCountersRequest extends AbstractRequest
{
    protected string $endpoint = '/user/channelCatalogs/{channelCatalogId}/products/counters';

    protected array $uriVars = [
        'channelCatalogId'
    ];

    public function __construct(string $channelCatalogId)
    {
        parent::__construct();
        $this->setChannelCatalogId($channelCatalogId);
    }

    public function getResponseDecorator(): BaseObject|ProductCounters
    {
        return ProductCounters::decorator();
    }
}
