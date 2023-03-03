<?php

namespace BeezupSDK\Request\Catalogs;

use BeezupSDK\Core\Request\AbstractStoreRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Catalogs\AutoImport;

class GetCatalogAutoImport extends AbstractStoreRequest
{
    protected string $endpoint = '/user/catalogs/{storeId}/autoImport';

    public function getResponseDecorator(): BaseObject|AutoImport
    {
        return AutoImport::decorator();
    }
}

