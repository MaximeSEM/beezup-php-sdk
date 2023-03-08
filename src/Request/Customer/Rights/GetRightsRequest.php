<?php

namespace BeezupSDK\Request\Customer\Rights;

use BeezupSDK\Core\Request\AbstractStoreRequest;
use BeezupSDK\Core\Response\Decorator\BaseCollection;
use BeezupSDK\Domain\Customer\Rights\Collection\RightCollection;

class GetRightsRequest extends AbstractStoreRequest
{
    protected string $endpoint = '/user/customer/stores/{storeId}/rights';

    public function getResponseDecorator(): BaseCollection|RightCollection
    {
        return RightCollection::decorator(null, 'functionalityCode');
    }
}
