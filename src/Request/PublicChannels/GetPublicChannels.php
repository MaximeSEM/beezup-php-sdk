<?php

namespace BeezupSDK\Request\PublicChannels;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Request\EtagTrait;
use BeezupSDK\Core\Response\Decorator\BaseCollection;
use BeezupSDK\Domain\PublicChannels\Collection\PublicChannelCollection;

class GetPublicChannels extends AbstractRequest
{
    use EtagTrait;

    protected string $endpoint = '/public/channels';

    public function __construct()
    {
        parent::__construct();
    }

    public function getResponseDecorator(): BaseCollection|PublicChannelCollection
    {
        return PublicChannelCollection::decorator('channels');
    }
}
