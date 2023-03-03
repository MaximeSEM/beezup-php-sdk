<?php

namespace BeezupSDK\Domain\Customer\Contracts;

use BeezupSDK\Core\Domain\BaseObject;

/**
 * @method  int  getBillingPeriodInMonth()
 * @method  int  getDiscountPercentage()
 */
class BillingPeriod extends BaseObject
{
    protected static array $dataTypes = [
        'billingPeriodInMonth' => 'intval',
        'discountPercentage' => 'intval'
    ];
}
