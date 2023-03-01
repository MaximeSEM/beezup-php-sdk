<?php

namespace BeezupSDK\Request\Customer\Stores;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseCollection;
use BeezupSDK\Domain\Customer\Stores\Collection\StoreCollection;

class GetStoresRequest extends AbstractRequest
{
    protected string $endpoint = '/user/customer/stores';

    public function getResponseDecorator(): BaseCollection|StoreCollection
    {
        return StoreCollection::decorator('stores', 'storeId');
    }
}
