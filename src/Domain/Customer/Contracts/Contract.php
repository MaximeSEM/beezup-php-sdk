<?php

namespace BeezupSDK\Domain\Customer\Contracts;

use BeezupSDK\Core\Domain\BaseObject;
use DateTime;

/**
 * @method  int  getTrialPeriodInMonth()
 * @method  int  getBillingPeriodPercentDiscount()
 * @method  int  getDiscountDurationInMonth()
 * @method  int  getPercentDiscount()
 * @method  string  getOfferId()
 * @method  int  getStoreCount()
 * @method  DateTime  getStartUtcDate()
 * @method  DateTime  getCommitmentCalculatedFinishUtcDate()
 * @method  int  getBillingPeriodInMonth()
 * @method  int  getFixedPrice()
 * @method  string  getOfferName()
 * @method  string  getCurrencyCode()
 * @method  string  getContractId()
 * @method  int  getCommitmentPeriodInMonth()
 * @method  int  getClickIncluded()
 * @method  int  getAdditionalClickPrice()
 * @method  string  getIpUserCreation()
 * @method  string  getIpUserModification()
 * @method  array  getFixedAndVariableClickInfo()
 * @method  array  getVariableModelInfo()
 * @method  bool  isCommitmentRenewalAutomatically()
 * @method  DateTime  getDiscountEndUtcDate()
 * @method  bool  isModifiableContract()
 */
class Contract extends BaseObject
{
    protected static array $dataTypes = [
        'trialPeriodInMonth' => 'intval',
        'billingPeriodPercentDiscount' => 'intval',
        'discountDurationInMonth' => 'intval',
        'percentDiscount' => 'intval',
        'storeCount' => 'intval',
        'startUtcDate' => DateTime::class,
        'commitmentCalculatedFinishUtcDate' => DateTime::class,
        'fixedPrice' => 'intval',
        'commitmentPeriodInMonth' => 'intval',
        'clickIncluded' => 'intval',
        'additionalClickPrice' => 'intval',
        'discountEndUtcDate' => DateTime::class,
    ];

    protected static array $mapping = [
        'isCommitmentRenewalAutomatically' => 'commitmentRenewalAutomatically',
        'isModifiableContract' => 'modifiableContract',
    ];

}