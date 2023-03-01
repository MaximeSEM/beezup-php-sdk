<?php

namespace BeezupSDK\Request\Customer\Stores;

use BeezupSDK\Core\Request\AbstractStoreRequest;
use BeezupSDK\Core\Request\EtagTrait;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Customer\Stores\Store;

/**
 * @method  string  getStoreId()
 * @method  $this  setStoreId(string $storeId)
 */
class GetStoreRequest extends AbstractStoreRequest
{
    use EtagTrait;

    protected string $endpoint = '/user/customer/stores/{storeId}';

    public function getResponseDecorator(): BaseObject|Store
    {
        return Store::decorator();
    }
}
