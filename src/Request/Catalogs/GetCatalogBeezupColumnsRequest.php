<?php

namespace BeezupSDK\Request\Catalogs;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseCollection;
use BeezupSDK\Domain\Common\Collection\FieldConfigurationCollection;

class GetCatalogBeezupColumnsRequest extends AbstractRequest
{
    protected string $endpoint = '/user/catalogs/beezupColumns';

    public function getResponseDecorator(): BaseCollection|FieldConfigurationCollection
    {
        return FieldConfigurationCollection::decorator(null, 'beezUPColumnName');
    }
}

