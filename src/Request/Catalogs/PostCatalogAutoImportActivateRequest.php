<?php

namespace BeezupSDK\Request\Catalogs;

use BeezupSDK\Core\Request\AbstractStoreRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;

class PostCatalogAutoImportActivateRequest extends AbstractStoreRequest
{
    protected string $method ='POST';
    protected string $endpoint = '/user/catalogs/{storeId}/autoImport/activate';

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}

