<?php

namespace BeezupSDK\Domain\Orders;

use BeezupSDK\Core\Domain\BaseObject;

/**
 * @method  string  getBeezUPOrderItemId()
 * @method  string  getMerchantImportedProductId()
 * @method  string  getMerchantImportedProductIdColumnName()
 * @method  string  getMerchantImportedProductUrl()
 * @method  string  getMerchantProductIdColumnName()
 * @method  string  getBeezUPStoreId()
 * @method  float  getItemTax()
 * @method  string  getTitle()
 * @method  string  getImageUrl()
 * @method  string  getMerchantProductId()
 * @method  string  getMarketPlaceProductId()
 * @method  string  getGtin()
 * @method  float  getItemPrice()
 * @method  int  getQuantity()
 * @method  float  getTotalPrice()
 * @method  float  getShippingPrice()
 * @method  string  getCondition()
 * @method  string  getMarketplaceProductUri()
 * @method  string  getMarketplaceImageUri()
 * @method  array  getOrderHarvestErrors()
 */
class OrderItem extends BaseObject
{
    protected static array $mapping = [
        'orderItem_OrderItemType' => 'orderItemType',
        'orderItem_MerchantImportedProductId' => 'merchantImportedProductId',
        'orderItem_MerchantImportedProductIdColumnName' => 'merchantImportedProductIdColumnName',
        'orderItem_MerchantImportedProductUrl' => 'merchantImportedProductUrl',
        'orderItem_MerchantProductIdColumnName' => 'merchantProductIdColumnName',
        'orderItem_BeezUPStoreId' => 'beezUPStoreId',
        'orderItem_ItemTax' => 'itemTax',
        'orderItem_Title' => 'title',
        'orderItem_ImageUrl' => 'imageUrl',
        'orderItem_MerchantProductId' => 'merchantProductId',
        'orderItem_MarketPlaceProductId' => 'marketPlaceProductId',
        'orderItem_gtin' => 'gtin',
        'orderItem_ItemPrice' => 'itemPrice',
        'orderItem_Quantity' => 'quantity',
        'orderItem_TotalPrice' => 'totalPrice',
        'orderItem_Shipping_Price' => 'shippingPrice',
        'orderItem_Condition' => 'condition',
        'orderItem_MarketplaceProductUri' => 'marketplaceProductUri',
        'orderItem_MarketplaceImageUri' => 'marketplaceImageUri',
    ];

    protected static array $dataTypes = [
        'itemTax' => 'floatval',
        'itemPrice' => 'floatval',
        'quantity' => 'intval',
        'totalPrice' => 'floatval',
        'shippingPrice' => 'floatval',
    ];
}
