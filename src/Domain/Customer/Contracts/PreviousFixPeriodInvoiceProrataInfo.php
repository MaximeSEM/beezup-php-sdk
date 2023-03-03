<?php

namespace BeezupSDK\Domain\Customer\Contracts;

use BeezupSDK\Core\Domain\BaseObject;
use DateTime;

/**
 * @method  float  getComputedProrataToBeDeducted()
 * @method  string  getInvoiceNumber()
 * @method  float  getAmountToBePaid()
 * @method  float  getAmountAfterTax()
 * @method  string  getContractId()
 * @method  DateTime  getFixedPeriodEndDate()
 * @method  DateTime  getFixedPeriodStartDate()
 */
class PreviousFixPeriodInvoiceProrataInfo extends BaseObject
{
    protected static array $dataTypes = [
        'computedProrataToBeDeducted' => 'floatval',
        'amountToBePaid' => 'floatval',
        'amountAfterTax' => 'floatval',
        'position' => 'intval',
        'functionalities' => DateTime::class,
    ];
}