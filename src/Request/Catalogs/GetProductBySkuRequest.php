<?php

namespace BeezupSDK\Request\Catalogs;

use BeezupSDK\Core\Request\AbstractStoreRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Catalogs\Product;

/**
 * @method  string  getSku()
 * @method $this setSku(string $sku)
 */
class GetProductBySkuRequest extends AbstractStoreRequest
{
    public array $queryParams = ['sku'];
    protected string $endpoint = '/user/catalogs/{storeId}/products';

    public function __construct(string $storeId, string $sku)
    {
        parent::__construct($storeId);
        $this->setSku($sku);
    }

    public function getResponseDecorator(): BaseObject|Product
    {
        return Product::decorator();
    }
}

