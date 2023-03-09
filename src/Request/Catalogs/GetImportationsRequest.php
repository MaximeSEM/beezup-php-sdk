<?php

namespace BeezupSDK\Request\Catalogs;

use BeezupSDK\Core\Request\AbstractStoreRequest;
use BeezupSDK\Core\Response\Decorator\BaseCollection;
use BeezupSDK\Domain\Catalogs\Collection\ImportationCollection;

class GetImportationsRequest extends AbstractStoreRequest
{
    protected string $endpoint = '/user/catalogs/{storeId}/importations';

    public function getResponseDecorator(): BaseCollection|ImportationCollection
    {
        return ImportationCollection::decorator('importations', 'executionId');
    }
}

