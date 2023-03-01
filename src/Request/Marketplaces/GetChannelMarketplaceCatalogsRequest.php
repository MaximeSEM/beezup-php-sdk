<?php

namespace BeezupSDK\Request\Marketplaces;

use BeezupSDK\Core\Request\AbstractStoreRequest;
use BeezupSDK\Core\Response\Decorator\BaseCollection;
use BeezupSDK\Domain\Marketplaces\Collection\ChannelMarketplaceCatalogCollection;

class GetChannelMarketplaceCatalogsRequest extends AbstractStoreRequest
{
    public array $queryParams = ['storeId'];
    protected string $endpoint = '/user/marketplaces/channelcatalogs';

    public function getResponseDecorator(): BaseCollection|ChannelMarketplaceCatalogCollection
    {
        return ChannelMarketplaceCatalogCollection::decorator('marketplaceChannelCatalogs', 'beezUPChannelCatalogId');
    }
}
