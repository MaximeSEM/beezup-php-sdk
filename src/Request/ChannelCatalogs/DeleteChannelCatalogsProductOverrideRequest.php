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

    protected array $uriVars = [
        'productId',
        'channelCatalogId',
        'channelColumnId',
    ];

    public function __construct(string $productId, string $channelCatalogId, string $channelColumnId)
    {
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
