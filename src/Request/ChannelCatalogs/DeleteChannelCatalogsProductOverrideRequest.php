<?php

namespace BeezupSDK\Request\ChannelCatalogs;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;

/**
 * @method  string  getChannelCatalogId()
 * @method  $this setChannelCatalogId(string $channelCatalogId)
 * @method  string  getProductId()
 * @method  $this setProductId(string $productId)
 * @method  string  getChannelColumnId()
 * @method  $this setChannelColumnId(string $fieldId)
 */
class DeleteChannelCatalogsProductOverrideRequest extends AbstractRequest
{
    protected string $method = 'DELETE';

    protected string $endpoint = '/user/channelCatalogs/{channelCatalogId}/products/{productId}/overrides/{channelColumnId}';

    public function __construct(string $productId, string $channelCatalogId, string $channelColumnId)
    {
        if (!isset($this->uriVars['productId'])) {
            $this->uriVars['productId'] = 'productId';
        }
        if (!isset($this->uriVars['channelCatalogId'])) {
            $this->uriVars['channelCatalogId'] = 'channelCatalogId';
        }
        if (!isset($this->uriVars['channelColumnId'])) {
            $this->uriVars['channelColumnId'] = 'channelColumnId';
        }
        parent::__construct();
        $this->setChannelCatalogId($channelCatalogId);
        $this->setProductId($productId);
        $this->setChannelColumnId($channelColumnId);
    }

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
