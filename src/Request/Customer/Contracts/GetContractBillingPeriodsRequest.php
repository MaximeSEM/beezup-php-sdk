<?php

namespace BeezupSDK\Request\Customer\Contracts;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Request\EtagTrait;
use BeezupSDK\Core\Response\Decorator\BaseCollection;
use BeezupSDK\Domain\Customer\Contracts\Collection\BillingPeriodCollection;

class GetContractBillingPeriodsRequest extends AbstractRequest
{
    use EtagTrait;

    protected string $endpoint = '/user/customer/billingPeriods';

    public function getResponseDecorator(): BaseCollection|BillingPeriodCollection
    {
        return BillingPeriodCollection::decorator('billingPeriods');
    }
}
