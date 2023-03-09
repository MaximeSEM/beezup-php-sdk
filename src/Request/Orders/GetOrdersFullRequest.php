<?php

namespace BeezupSDK\Request\Orders;

use BeezupSDK\Core\Request\EtagTrait;
use BeezupSDK\Core\Response\Decorator\BaseCollection;
use BeezupSDK\Domain\Orders\Collection\OrderCollection;
use DateTime;

/**
 * @method  DateTime getBeginPeriodUtcDate()
 * @method  $this setBeginPeriodUtcDate(string $beginPeriodUtcDate)
 * @method  DateTime getEndPeriodUtcDate()
 * @method  $this setEndPeriodUtcDate(string $beginPeriodUtcDate)
 * @method  int getPageNumber()
 * @method  $this setPageNumber(int $pageNumber)
 * @method  int getPageSize()
 * @method  $this setPageSize(int $pageSize)
 * @method  string[] getMarketplaceTechnicalCodes()
 * @method  $this setMarketplaceTechnicalCodes(string[] $marketplaceTechnicalCodes)
 * @method  string[] getMarketplaceBusinessCodes()
 * @method  $this setMarketplaceBusinessCodes(string[] $marketplaceBusinessCodes)
 * @method  int[] getAccountIds()
 * @method  $this setAccountIds(int[] $accountIds)
 * @method  string[] getStoreIds()
 * @method  $this setStoreIds(string[] $storesId)
 * @method  string[] getBeezUPOrderStatuses()
 * @method  $this setBeezUPOrderStatuses(string[] $beezUPOrderStatuses)
 * @method  string getDateSearchType() Value in [Modification, Purchase, MarketPlaceModification]
 * @method  $this setDateSearchType(string[] $storeIds) Must be in [Modification, Purchase, MarketPlaceModification]
 * @method  string getInvoiceAvailabilityType() Value in [All, Generated, NotGenerated]
 * @method  $this setInvoiceAvailabilityType(string $invoiceAvailabilityType) Must be in [All, Generated, NotGenerated]
 * @method  string getOrder_Buyer_Name()
 * @method  $this setOrder_Buyer_Name(string $order_Buyer_Name)
 * @method  string[] getMarketplaceOrderIds()
 * @method  $this setMarketplaceOrderIds(string[] $marketplaceOrderIds)
 * @method  string getOrderMerchantInfoSynchronizationStatus() Value in [All, Synchronized, NotSynchronized]
 * @method  $this setOrderMerchantInfoSynchronizationStatus(string $orderMerchantInfoSynchronizationStatus) Must be in [All, Synchronized, NotSynchronized]
 * @method  string[] getOrder_MerchantOrderIds()
 * @method  $this setOrder_MerchantOrderIds(string[] $order_MerchantOrderIds)
 */
class GetOrdersFullRequest extends GetOrdersLightRequest
{
    use EtagTrait;

    protected string $endpoint = '/list/full';

    /**
     * @return BaseCollection|OrderCollection
     * @noinspection PhpDocSignatureInspection
     */
    public function getResponseDecorator(): BaseCollection
    {
        return OrderCollection::decorator('orders', 'beezUPOrderId');
    }
}
