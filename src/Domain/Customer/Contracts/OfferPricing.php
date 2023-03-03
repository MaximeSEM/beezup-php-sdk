<?php

namespace BeezupSDK\Domain\Customer\Contracts;

use BeezupSDK\Core\Domain\BaseObject;
use BeezupSDK\Domain\Customer\Contracts\Collection\ContractBonusCollection;

/**
 * @method  PreviousFixPeriodInvoiceProrataInfo  getPreviousFixPeriodInvoiceProrataInfo()
 * @method  ContractBillingPeriodInfo  getContractBillingPeriodInfo()
 * @method  ContractClickInfo  getContractClickInfo()
 * @method  ContractCommitmentInfo  getContractCommitmentInfo()
 * @method  ContractDiscountInfo  getContractDiscountInfo()
 * @method  ContractMoneyInfo  getContractMoneyInfo()
 * @method  ContractStoreInfo  getContractStoreInfo()
 * @method  ContractBonusCollection  getContractBonus()
 * @method  string  getContractTerminationReasonType()
 * @method  string  getContractTerminationReason()
 * @method  bool  isNotifyVatExemption()
 */
class OfferPricing extends BaseObject
{
    protected static array $dataTypes = [
        'previousFixPeriodInvoiceProrataInfo' => [PreviousFixPeriodInvoiceProrataInfo::class, 'create'],
        'contractBillingPeriodInfo' => [ContractBillingPeriodInfo::class, 'create'],
        'contractClickInfo' => [ContractClickInfo::class, 'create'],
        'contractDiscountInfo' => [ContractDiscountInfo::class, 'create'],
        'contractMoneyInfo' => [ContractMoneyInfo::class, 'create'],
        'contractStoreInfo' => [ContractStoreInfo::class, 'create'],
        'contractBonusInfo' => [ContractBonusCollection::class, 'create'],
    ];
    protected static array $mapping = [
        'contractBonusInfo.bonuses' => 'contractBonus'
    ];
}
