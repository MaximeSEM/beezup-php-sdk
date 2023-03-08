<?php

namespace BeezupSDK\Request\Channels;

use BeezupSDK\Core\Request\AbstractChannelRequest;
use BeezupSDK\Core\Response\Decorator\BaseCollection;
use BeezupSDK\Domain\Channels\Collection\ColumnCollection;

/**
 * @method array getColumnsId()
 * @method $this setColumnsId(array $columnsId)
 */
class GetChannelColumnsRequest extends AbstractChannelRequest
{
    protected string $method = 'POST';

    protected string $endpoint = '/user/channels/{channelId}/columns';

    protected ?string $dataRoot = 'columnsId';

    public array $bodyParams = ['columnsId'];

    public function __construct(string $channelId, array $columnsId = [])
    {
        parent::__construct($channelId);
        $this->setColumnsId($columnsId);
    }

    public function getResponseDecorator(): BaseCollection|ColumnCollection
    {
        return ColumnCollection::decorator(null, 'channelColumnId');
    }
}
