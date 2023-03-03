<?php

namespace BeezupSDK\Request\Catalogs;

use BeezupSDK\Core\Request\AbstractStoreRequest;
use BeezupSDK\Core\Response\Decorator\BaseCollection;
use BeezupSDK\Domain\Catalogs\Collection\CustomColumnCollection;

class GetCustomColumnsRequest extends AbstractStoreRequest
{
    protected string $endpoint = '/user/catalogs/{storeId}/customColumns';

    public function getResponseDecorator(): BaseCollection|CustomColumnCollection
    {
        return CustomColumnCollection::decorator('customColumns', 'id');
    }
}

