<?php

namespace BeezupSDK\Request\Customer\Contracts;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;

/**
 * @method string getOfferId()
 * @method $this setOfferId(string $offerId)
 * @method string getStoreCount()
 * @method $this setStoreCount(int $storeCount)
 * @method string getBillingPeriodInMonth()
 * @method $this setBillingPeriodInMonth(int $billingPeriodInMonth)
 * @method string getCouponDiscountCode()
 * @method $this setCouponDiscountCode(string $couponDiscountCode)
 * @method string getCouponOfferCode()
 * @method $this setCouponOfferCode(string $couponOfferCode)
 */
class PostContractRequest extends AbstractRequest
{
    protected string $method = 'POST';
    protected string $endpoint = '/user/customer/contracts';

    public array $bodyParams = [
        'offerId',
        'storeCount',
        'couponDiscountCode',
        'couponOfferCode',
        'billingPeriodInMonth',
    ];

    /**
     * @param string $offerId
     * @param int $storeCount
     * @param int $billingPeriodInMonth
     * @param string|null $couponDiscountCode
     * @param string|null $couponOfferCode
     */
    public function __construct(string $offerId, int $storeCount, int $billingPeriodInMonth, ?string $couponDiscountCode = null, ?string $couponOfferCode = null)
    {
        parent::__construct();
        $this->setOfferId($offerId);
        $this->setStoreCount($storeCount);
        $this->setbillingPeriodInMonth($billingPeriodInMonth);
        if (isset($couponDiscountCode))
            $this->setCouponDiscountCode($couponDiscountCode);
        if (isset($couponOfferCode))
            $this->setCouponOfferCode($couponOfferCode);
    }

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
