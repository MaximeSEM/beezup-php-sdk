<?php

namespace BeezupSDK\Request\Catalogs;

use BeezupSDK\Core\Request\AbstractStoreRequest;
use BeezupSDK\Core\Response\Decorator\BaseCollection;
use BeezupSDK\Domain\Catalogs\Collection\CatalogColumnCollection;

class GetCatalogColumnsRequest extends AbstractStoreRequest
{
    protected string $endpoint = '/user/catalogs/{storeId}/catalogColumns';

    public function __construct(string $storeId)
    {
        parent::__construct($storeId);
    }

    public function getResponseDecorator(): BaseCollection|CatalogColumnCollection
    {
        return CatalogColumnCollection::decorator('catalogColumns', 'id');
    }
}

