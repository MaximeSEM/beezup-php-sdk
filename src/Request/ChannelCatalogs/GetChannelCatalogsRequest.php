<?php

namespace BeezupSDK\Request\ChannelCatalogs;

use BeezupSDK\Core\Request\AbstractStoreRequest;
use BeezupSDK\Core\Response\Decorator\BaseCollection;
use BeezupSDK\Domain\ChannelCatalogs\Collection\ChannelCatalogCollection;


class GetChannelCatalogsRequest extends AbstractStoreRequest
{
    public array $queryParams = ['storeId'];
    protected string $endpoint = '/user/channelcatalogs';

    public function getResponseDecorator(): BaseCollection|ChannelCatalogCollection
    {
        return ChannelCatalogCollection::decorator('channelCatalogs', 'channelId');
    }
}
