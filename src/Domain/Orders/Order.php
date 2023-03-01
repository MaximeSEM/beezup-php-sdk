<?php

namespace BeezupSDK\Domain\Orders;

use BeezupSDK\Domain\Orders\Collection\OrderItemCollection;
use DateTime;

/**
 * @method  float  getTotalTax()
 * @method  float  getTotalCommission()
 * @method  string  getPaymentMethod()
 * @method  DateTime getPayingUtcDate()
 * @method  string  getComment()
 * @method  string  getShippingFirstName()
 * @method  string  getShippingLastName()
 * @method  string  getShippingCivility()
 * @method  string  getShippingCompanyName()
 * @method  string  getShippingAddressName()
 * @method  string  getShippingEmail()
 * @method  string  getShippingAddressLine1()
 * @method  string  getShippingAddressLine2()
 * @method  string  getShippingAddressLine3()
 * @method  string  getShippingAddressPostalCode()
 * @method  string  getShippingAddressCity()
 * @method  string  getShippingAddressStateOrRegion()
 * @method  string  getShippingAddressCountryName()
 * @method  string  getShippingAddressCountryIsoCodeAlpha2()
 * @method  string  getShippingPhone()
 * @method  string  getShippingMobilePhone()
 * @method  float  getShippingPrice()
 * @method  string  getShippingMethod()
 * @method  float  getShippingTax()
 * @method  DateTime  getShippingEarliestShipUtcDate()
 * @method  DateTime  getShippingLatestShipUtcDate()
 * @method  string  getBuyerIdentifier()
 * @method  string  getBuyerFirstName()
 * @method  string  getBuyerLastName()
 * @method  string  getBuyerCivility()
 * @method  string  getBuyerCompanyName()
 * @method  string  getBuyerEmail()
 * @method  string  getBuyerAddressLine1()
 * @method  string  getBuyerAddressLine2()
 * @method  string  getBuyerAddressLine3()
 * @method  string  getBuyerAddressPostalCode()
 * @method  string  getBuyerAddressCity()
 * @method  string  getBuyerAddressStateOrRegion()
 * @method  string  getBuyerAddressCountryName()
 * @method  string  getBuyerAddressCountryIsoCodeAlpha2()
 * @method  string  getBuyerPhone()
 * @method  string  getBuyerMobilePhone()
 * @method  boolean  isPrime()
 * @method  string  getFulfilledBy()
 * @method  boolean isBusiness()
 * @method  string  getOrderSourceUri()
 * @method  string  getOrderItemsSourceUri()
 * @method  array  getOrderHarvestErrors()
 * @method  OrderItemCollection  getOrderItems()
 */
class Order extends OrderLight
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
        'order_MarketPlaceChannel' => 'marketPlaceChannel',
        'order_TotalTax' => 'totalTax',
        'order_TotalCommission' => 'totalCommission',
        'order_PaymentMethod' => 'paymentMethod',
        'order_PayingUtcDate' => 'payingUtcDate',
        'order_Comment' => 'comment',
        'order_Shipping_FirstName' => 'shippingFirstName',
        'order_Shipping_LastName' => 'shippingLastName',
        'order_Shipping_Civility' => 'shippingCivility',
        'order_Shipping_CompanyName' => 'shippingCompanyName',
        'order_Shipping_AddressName' => 'shippingAddressName',
        'order_Shipping_Email' => 'shippingEmail',
        'order_Shipping_AddressLine1' => 'shippingAddressLine1',
        'order_Shipping_AddressLine2' => 'shippingAddressLine2',
        'order_Shipping_AddressLine3' => 'shippingAddressLine3',
        'order_Shipping_AddressPostalCode' => 'shippingAddressPostalCode',
        'order_Shipping_AddressCity' => 'shippingAddressCity',
        'order_Shipping_AddressStateOrRegion' => 'shippingAddressStateOrRegion',
        'order_Shipping_AddressCountryName' => 'shippingAddressCountryName',
        'order_Shipping_AddressCountryIsoCodeAlpha2' => 'shippingAddressCountryIsoCodeAlpha2',
        'order_Shipping_Phone' => 'shippingPhone',
        'order_Shipping_MobilePhone' => 'shippingMobilePhone',
        'order_Shipping_Price' => 'shippingPrice',
        'order_Shipping_Method' => 'shippingMethod',
        'order_Shipping_ShippingTax' => 'shippingTax',
        'order_Shipping_EarliestShipUtcDate' => 'shippingEarliestShipUtcDate',
        'order_Shipping_LatestShipUtcDate' => 'shippingLatestShipUtcDate',
        'order_Buyer_Identifier' => 'buyerIdentifier',
        'order_Buyer_FirstName' => 'buyerFirstName',
        'order_Buyer_LastName' => 'buyerLastName',
        'order_Buyer_Civility' => 'buyerCivility',
        'order_Buyer_CompanyName' => 'buyerCompanyName',
        'order_Buyer_Email' => 'buyerEmail',
        'order_Buyer_AddressLine1' => 'buyerAddressLine1',
        'order_Buyer_AddressLine2' => 'buyerAddressLine2',
        'order_Buyer_AddressLine3' => 'buyerAddressLine3',
        'order_Buyer_AddressPostalCode' => 'buyerAddressPostalCode',
        'order_Buyer_AddressCity' => 'buyerAddressCity',
        'order_Buyer_AddressStateOrRegion' => 'buyerAddressStateOrRegion',
        'order_Buyer_AddressCountryName' => 'buyerAddressCountryName',
        'order_Buyer_AddressCountryIsoCodeAlpha2' => 'buyerAddressCountryIsoCodeAlpha2',
        'order_Buyer_Phone' => 'buyerPhone',
        'order_Buyer_MobilePhone' => 'buyerMobilePhone',
        'order_FulfilledBy' => 'fulfilledBy',
        'order_IsPrime' => 'prime',
        'order_IsBusiness' => 'business',
        'order_OrderSourceUri' => 'orderSourceUri',
        'order_OrderItemsSourceUri' => 'orderItemsSourceUri'];

    protected static array $dataTypes = [
        'purchaseUtcDate' => DateTime::class,
        'lastModificationUtcDate' => DateTime::class,
        'marketplaceLastModificationUtcDate' => DateTime::class,
        'totalPrice' => 'floatval',
        'totalTax' => 'floatval',
        'totalCommission' => 'floatval',
        'payingUtcDate' => DateTime::class,
        'shippingPrice' => 'floatval',
        'shippingShippingTax' => 'floatval',
        'shippingEarliestShipUtcDate' => DateTime::class,
        'shippingLatestShipUtcDate' => DateTime::class,
        'orderItems' => [OrderItemCollection::class, 'create'],
    ];
}
