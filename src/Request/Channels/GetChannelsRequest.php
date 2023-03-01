<?php

namespace BeezupSDK\Request\Channels;

use BeezupSDK\Core\Request\AbstractStoreRequest;
use BeezupSDK\Core\Response\Decorator\BaseCollection;
use BeezupSDK\Domain\Channels\Collection\ChannelCollection;


class GetChannelsRequest extends AbstractStoreRequest
{
    public array $queryParams = ['storeId'];
    protected string $endpoint = '/user/channels';

    public function getResponseDecorator(): BaseCollection|ChannelCollection
    {
        return ChannelCollection::decorator(null, 'channelId');
    }
}
