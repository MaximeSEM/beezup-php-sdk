<?php

namespace BeezupSDK\Request\Orders;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseCollection;
use BeezupSDK\Core\Utility\Functions;
use BeezupSDK\Domain\Orders\Collection\OrderCollection;
use BeezupSDK\Domain\Orders\Collection\OrderLightCollection;
use DateTime;
use Exception;

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
class GetOrdersLightRequest extends AbstractRequest
{

    protected static array $dataTypes = [
        'beginPeriodUtcDate' => DateTime::class,
        'endPeriodUtcDate' => DateTime::class,
    ];
    public array $queryParams = ['storeId'];
    public array $bodyParams = [
        'marketplaceTechnicalCodes',
        'marketplaceBusinessCodes',
        'accountIds',
        'storeIds',
        'dateSearchType',
        'beezUPOrderStatuses',
        'beginPeriodUtcDate',
        'endPeriodUtcDate',
        'invoiceAvailabilityType',
        'order_Buyer_Name',
        'marketplaceOrderIds',
        'orderMerchantInfoSynchronizationStatus',
        'order_MerchantOrderIds',
        'pageNumber',
        'pageSize',
    ];
    protected string $method = 'POST';
    protected string $version = 'orders/v3';
    protected string $endpoint = '/list/light';
    protected int $maxOrderDays = 62;

    /**
     * @param DateTime|null $beginPeriodUtcDate
     * @param DateTime|null $endPeriodUtcDate
     * @param int $pageNumber
     * @param int $pageSize
     * @param array $data
     * @throws Exception
     */
    public function __construct(DateTime $beginPeriodUtcDate = null, DateTime $endPeriodUtcDate = null, int $pageNumber = 1, int $pageSize = 25, array $data = [])
    {
        if (!isset($beginPeriodUtcDate))
            $beginPeriodUtcDate = new DateTime('-' . $this->maxOrderDays . ' DAYS');
        if (!isset($endPeriodUtcDate))
            $endPeriodUtcDate = new DateTime();

        parent::__construct($data);
        $this->setBeginPeriodUtcDate(Functions::dateFormat($beginPeriodUtcDate));
        $this->setEndPeriodUtcDate(Functions::dateFormat($endPeriodUtcDate));
        $this->setPageSize($pageSize);
        $this->setPageNumber($pageNumber);
    }

    /**
     * @return BaseCollection|OrderLightCollection
     * @noinspection PhpDocSignatureInspection
     */
    public function getResponseDecorator(): BaseCollection
    {
        return OrderCollection::decorator('orders', 'beezUPOrderId');
    }
}
