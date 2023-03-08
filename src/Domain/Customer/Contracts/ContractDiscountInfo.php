<?php

namespace BeezupSDK\Domain\Customer\Contracts;

use BeezupSDK\Core\Domain\BaseObject;

/**
 * @method  float  getAmountCodePromoDiscountPerMonth()
 * @method  int  getDiscountDurationInMonth()
 * @method  float  getPercentDiscount()
 * @method  string  getPromotionalCodeValidity()
 * @method  float  getAmountCodePromoDiscount()
 * @method  string  getCouponDiscountCode()
 * @method  string  getCouponDiscountId()
 * @method  bool  isCouponDiscountLinkedToCouponOffer()
 * @method  bool  isCustomerHasActualDiscount()
 */
class ContractDiscountInfo extends BaseObject
{
    protected static array $dataTypes = [
        'amountCodePromoDiscountPerMonth' => 'floatval',
        'discountDurationInMonth' => 'intval',
        'percentDiscount' => 'floatval',
        'amountCodePromoDiscount' => 'floatval',
    ];

    protected static array $mapping = [
        'isCouponDiscountLinkedToCouponOffer' => 'couponDiscountLinkedToCouponOffer'
    ];
}