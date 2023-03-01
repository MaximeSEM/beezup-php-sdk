<?php

namespace BeezupSDK\Request\Channels;

use BeezupSDK\Core\Request\AbstractChannelRequest;
use BeezupSDK\Core\Response\Decorator\BaseCollection;
use BeezupSDK\Domain\Channels\Collection\ColumnCollection;

class GetChannelColumnsRequest extends AbstractChannelRequest
{
    protected string $method = 'POST';

    protected string $endpoint = '/user/channels/{channelId}/columns';

    public function getResponseDecorator(): BaseCollection|ColumnCollection
    {
        return ColumnCollection::decorator(null, 'channelColumnId');
    }
}
