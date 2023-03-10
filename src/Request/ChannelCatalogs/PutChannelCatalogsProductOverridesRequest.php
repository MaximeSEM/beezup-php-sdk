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
 * @method  string  getOverrides()
 */
class PutChannelCatalogsProductOverridesRequest extends AbstractRequest
{
    protected string $method = 'PUT';

    protected string $endpoint = '/user/channelCatalogs/{channelCatalogId}/products/{productId}/overrides';

    protected array $uriVars = [
        'channelCatalogId',
        'productId'
    ];

    public function __construct(string $productId, string $channelCatalogId, array $overrides)
    {
        parent::__construct();
        $this->setChannelCatalogId($channelCatalogId);
        $this->setProductId($productId);
        $this->setOverrides($overrides);
    }

    /**
     * @param array $overrides
     * @return PutChannelCatalogsProductOverridesRequest
     */
    public function setOverrides(array $overrides): static
    {
        foreach ($overrides as $fieldId => $value) {
            $this->setData($fieldId, $value);
            if (!in_array($fieldId, $this->bodyParams))
                $this->bodyParams[] = $fieldId;
        }
        return $this;
    }

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
