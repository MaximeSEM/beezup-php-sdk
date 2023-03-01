<?php

namespace BeezupSDK\Request\ChannelCatalogs;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\ChannelCatalogs\Product;

/**
 * @method  string  getChannelCatalogId()
 * @method  $this setChannelCatalogId(string $channelCatalogId)
 * @method  string  getProductId()
 * @method  $this setProductId(string $productId)
 */
class GetChannelCatalogProductRequest extends AbstractRequest
{
    protected string $endpoint = '/user/channelCatalogs/{channelCatalogId}/products/{productId}';

    public function __construct(string $channelCatalogId, string $productId)
    {
        if (!isset($this->uriVars['channelCatalogId'])) {
            $this->uriVars['channelCatalogId'] = 'channelCatalogId';
        }
        if (!isset($this->uriVars['productId'])) {
            $this->uriVars['productId'] = 'productId';
        }

        parent::__construct();
        $this->setChannelCatalogId($channelCatalogId);
        $this->setProductId($productId);
    }

    public function getResponseDecorator(): BaseObject|Product
    {
        return Product::decorator();
    }
}
