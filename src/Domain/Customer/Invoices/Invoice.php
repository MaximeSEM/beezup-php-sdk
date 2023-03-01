<?php

namespace BeezupSDK\Domain\Customer\Invoices;

use BeezupSDK\Core\Domain\BaseObject;
use DateTime;

/**
 * @method  DateTime  getInvoiceDate()
 * @method  string  getContractId()
 * @method  string  getInvoiceNumber()
 * @method  float  getAmount()
 * @method  float  getAmountToBePaid()
 * @method  string  getCurrencyCode()
 * @method  string  getPaymentStatus()
 * @method  DateTime  getDueDate()
 * @method  string  getInvoiceUrl()
 */
class Invoice extends BaseObject
{
    protected static array $dataTypes = [
        'invoiceDate' => DateTime::class,
        'amount' => 'floatval',
        'amountToBePaid' => 'floatval',
        'dueDate' => DateTime::class
    ];
}
