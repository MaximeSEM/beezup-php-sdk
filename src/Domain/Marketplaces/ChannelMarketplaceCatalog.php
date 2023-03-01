<?php

namespace BeezupSDK\Domain\Marketplaces;

use BeezupSDK\Core\Domain\BaseObject;
use BeezupSDK\Domain\Common\LovLinksTrait;

/**
 * @method  string  getApiSettingsStatus()
 * @method  boolean  isEnabled()
 * @method  string  getMarketplaceTechnicalCode()
 * @method  string  getMarketplaceBusinessCode()
 * @method  string  getMarketplaceMarketPlaceId()
 * @method  string  getMarketplaceAccountId()
 * @method  string  getMarketplaceIsoCountryCodeAlpha2()
 * @method  string  getBeezUPChannelId()
 * @method  string  getBeezUPChannelCatalogId()
 * @method  string  getBeezUPStoreId()
 * @method  string  getBeezUPStoreName()
 * @method  array  getMarketplaceMerchantIdentifiers()
 */
class ChannelMarketplaceCatalog extends BaseObject
{
    use LovLinksTrait;
}
