<?php

namespace BeezupSDK\Request\Customer\Shares;

use BeezupSDK\Core\Request\AbstractStoreRequest;
use BeezupSDK\Core\Request\EtagTrait;
use BeezupSDK\Core\Response\Decorator\BaseCollection;
use BeezupSDK\Domain\Customer\Shares\Collection\ShareCollection;

class GetSharesRequest extends AbstractStoreRequest
{
    use EtagTrait;

    protected string $endpoint = '/user/customer/stores/{storeId}/shares';

    public function getResponseDecorator(): BaseCollection|ShareCollection
    {
        return ShareCollection::decorator('shares');
    }
}
