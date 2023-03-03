<?php

namespace BeezupSDK\Domain\Customer\Contracts;

use BeezupSDK\Core\Domain\BaseObject;
use DateTime;

/**
 * @method  DateTime  getCommitmentCalculatedFinishDate()
 * @method  DateTime  getNewContractStartDate()
 * @method  int  getCommitmentPeriodInMonth()
 * @method  int  getTrialPeriodInMonth()
 * @method  int  getTrialPeriodFinishDate()
 * @method  int  getPaymentDelayInDays()
 * @method  string  getOfferId()
 * @method  string  getOfferName()
 * @method  string  getCurrentContractId()
 * @method  string  getCommercialUserId()
 * @method  string  getModel()
 * @method  DateTime  getCurrentContractTerminationDate()
 * @method  string  getRequestedPaymentMethod()
 * @method  string  getCurrentCustomerPaymentMethod()
 * @method  string  getContractType()
 * @method  bool  isModelMustBeTransmittedInNewContract()
 * @method  array  getFixedAndVariableClickInfo()
 * @method  array  getVariableModelInfo()
 * @method  string  getPaymentMethodAuthorized()
 * @method  string  getCouponOfferCode()
 * @method  string  getCommercialCreatorUserId()
 * @method  int  getMinBillingPeriodInMonths()
 * @method  bool  isCustomerWantsToTerminateHisContract()
 */
class ContractCommitmentInfo extends BaseObject
{
    protected static array $dataTypes = [
        'commitmentCalculatedFinishDate' => DateTime::class,
        'newContractStartDate' => DateTime::class,
        'commitmentPeriodInMonth' => 'intval',
        'trialPeriodInMonth' => 'intval',
        'trialPeriodFinishDate' => 'intval',
        'paymentDelayInDays' => 'intval',
        'currentContractTerminationDate' => DateTime::class,
        'minBillingPeriodInMonths' => 'intval',
    ];
    protected static array $mapping = [
        'isModelMustBeTransmittedInNewContract' => 'modelMustBeTransmittedInNewContract',
        'isCustomerWantsToTerminateHisContract' => 'customerWantsToTerminateHisContract',
    ];
}