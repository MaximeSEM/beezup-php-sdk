<?php

namespace BeezupSDK\Request\Catalogs;

use BeezupSDK\Core\Request\AbstractStoreRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Catalogs\AutoImport;
use BeezupSDK\Domain\Common\EmptyAnswer;

class DeleteCatalogAutoImport extends AbstractStoreRequest
{
    protected string $method = 'DELETE';
    protected string $endpoint = '/user/catalogs/{storeId}/autoImport';

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}

