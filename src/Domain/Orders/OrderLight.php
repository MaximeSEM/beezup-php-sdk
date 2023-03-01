<?php

namespace BeezupSDK\Domain\Orders;

use BeezupSDK\Core\Domain\BaseObject;
use DateTime;

/**
 * @method  string  getMarketplaceTechnicalCode()
 * @method  int  getAccountId()
 * @method  string  getBeezUPOrderId()
 * @method  string  getBeezUPOrderUrl()
 * @method  string  getMarketplaceBusinessCode()
 * @method  string  getMarketplaceOrderId()
 * @method  string  getBeezUPOrderStatus()
 * @method  string  getMarketplaceOrderStatus()
 * @method  string  getMerchantOrderId()
 * @method  string  getMerchantECommerceSoftwareName()
 * @method  string  getMerchantECommerceSoftwareVersion()
 * @method  DateTime  getPurchaseUtcDate()
 * @method  DateTime  getLastModificationUtcDate()
 * @method  DateTime  getMarketplaceLastModificationUtcDate()
 * @method  string  getBuyerName()
 * @method  float  getTotalPrice()
 * @method  string  getCurrencyCode()
 * @method  string  getInvoiceNumber()
 * @method  string  getInvoiceUri()
 * @method  boolean  isProcessing()
 */
class OrderLight extends BaseObject
{
    protected static array $mapping = [
        'order_MarketplaceOrderId' => 'marketplaceOrderId',
        'order_Status_BeezUPOrderStatus' => 'beezUPOrderStatus',
        'order_Status_MarketplaceOrderStatus' => 'marketplaceOrderStatus',
        'order_MerchantOrderId' => 'merchantOrderId',
        'order_MerchantECommerceSoftwareName' => 'merchantECommerceSoftwareName',
        'order_MerchantECommerceSoftwareVersion' => 'merchantECommerceSoftwareVersion',
        'order_PurchaseUtcDate' => 'purchaseUtcDate',
        'order_LastModificationUtcDate' => 'lastModificationUtcDate',
        'order_MarketplaceLastModificationUtcDate' => 'marketplaceLastModificationUtcDate',
        'order_Buyer_Name' => 'buyerName',
        'order_TotalPrice' => 'totalPrice',
        'order_CurrencyCode' => 'currencyCode',
        'order_Invoice_Number' => 'invoiceNumber',
        'order_Invoice_Uri' => 'invoiceUri',
    ];

    protected static array $dataTypes = [
        'purchaseUtcDate' => DateTime::class,
        'lastModificationUtcDate' => DateTime::class,
        'marketplaceLastModificationUtcDate' => DateTime::class,
        'totalPrice' => 'floatval',
    ];

    public function canShipOrder(): bool
    {
        return (!$this->isProcessing() && $this->getTransitionLinks('ShipOrder'));
    }

    /**
     * @param string|null $linkType
     * @return array
     */
    public function getTransitionLinks(?string $linkType = null): array
    {
        $links = $this->getData('transitionLinks');
        $data = [];
        if ($links) {
            foreach ($links as $link) {
                if ($link['rel'] == $linkType || !isset($linkType)) {
                    $data[$link['rel']] = $link;
                }
            }
        }
        return $data;
    }

    /**
     * @return bool
     */
    public function canCancelOrder(): bool
    {
        return (!$this->isProcessing() && $this->getTransitionLinks('CancelOrder'));
    }

    /**
     * @return bool
     */
    public function canRefundOrder(): bool
    {
        return (!$this->isProcessing() && $this->getTransitionLinks('RefundOrder'));
    }
}
