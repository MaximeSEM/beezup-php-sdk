<?php

namespace BeezupSDK\Domain\Customer\Contracts;

use BeezupSDK\Core\Domain\BaseObject;

/**
 * @method  float  getAmountExcludingTaxesAndExcludingCodePromoDiscountIncludingBillingPeriodDiscount()
 * @method  float  getAmountExcludingTaxesIncludingDiscounts()
 * @method  float  getAmountTaxesExcludingDiscountIncludingBillingPeriodDiscount()
 * @method  float  getAmountIncludingTaxesExcludingDiscountIncludingBillingPeriodDiscount()
 * @method  string  getCurrencyCode()
 * @method  float  getVatPercent()
 * @method  float  getAmountExcludingTaxesIncludingDiscountsPerMonth()
 * @method  float  getAmountExcludingTaxesAndExcludingDiscounts()
 * @method  float  getAmountTaxesIncludingDiscounts()
 * @method  float  getAmountIncludingTaxesIncludingDiscounts()
 * @method  float  getInitialOfferFixedPrice()
 */
class ContractMoneyInfo extends BaseObject
{
    protected static array $dataTypes = [
        'amountExcludingTaxesAndExcludingCodePromoDiscountIncludingBillingPeriodDiscount' => 'floatval',
        'amountExcludingTaxesIncludingDiscounts' => 'floatval',
        'amountTaxesExcludingDiscountIncludingBillingPeriodDiscount' => 'floatval',
        'amountIncludingTaxesExcludingDiscountIncludingBillingPeriodDiscount' => 'floatval',
        'vatPercent' => 'floatval',
        'amountExcludingTaxesIncludingDiscountsPerMonth' => 'floatval',
        'amountExcludingTaxesAndExcludingDiscounts' => 'floatval',
        'amountTaxesIncludingDiscounts' => 'floatval',
        'amountIncludingTaxesIncludingDiscounts' => 'floatval',
        'initialOfferFixedPrice' => 'floatval'
    ];
}