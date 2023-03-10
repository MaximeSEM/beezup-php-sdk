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
    protected array $uriVars = [
        'productId',
        'channelCatalogId',
        'channelColumnId',
    ];

    public function __construct(string $channelCatalogId, string $productId)
    {
        parent::__construct();
        $this->setChannelCatalogId($channelCatalogId);
        $this->setProductId($productId);
    }

    public function getResponseDecorator(): BaseObject|Product
    {
        return Product::decorator();
    }
}
