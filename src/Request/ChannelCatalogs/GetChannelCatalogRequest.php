<?php

namespace BeezupSDK\Request\ChannelCatalogs;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\ChannelCatalogs\ChannelCatalog;

/**
 *
 * @method  string  getChannelCatalogId()
 * @method  $this setChannelCatalogId(string $channelCatalogId)
 */
class GetChannelCatalogRequest extends AbstractRequest
{
    protected string $endpoint = '/user/channelcatalogs/{channelCatalogId}';

    public function __construct(string $channelCatalogId)
    {
        if (!isset($this->uriVars['channelCatalogId'])) {
            $this->uriVars['channelCatalogId'] = 'channelCatalogId';
        }
        parent::__construct();
        $this->setChannelCatalogId($channelCatalogId);
    }

    public function getResponseDecorator(): BaseObject|ChannelCatalog
    {
        return ChannelCatalog::decorator();
    }
}
