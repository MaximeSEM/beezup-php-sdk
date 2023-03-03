<?php

namespace BeezupSDK\Domain\Customer\Contracts;

use BeezupSDK\Core\Domain\BaseObject;

/**
 * @method  float  getAmountBillingPeriodDiscount()
 * @method  float  getBillingPeriodPercentDiscount()
 * @method  int  getBillingPeriodInMonth()
 */
class ContractBillingPeriodInfo extends BaseObject
{
    protected static array $dataTypes = [
        'amountBillingPeriodDiscount' => 'floatval',
        'billingPeriodPercentDiscount' => 'floatval',
        'billingPeriodInMonth' => 'intval'
    ];
}