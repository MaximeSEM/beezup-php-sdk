<?php

namespace BeezupSDK\Domain\ChannelCatalogs;

use BeezupSDK\Core\Domain\BaseObject;
use BeezupSDK\Domain\ChannelCatalogs\Common\Collection\OverrideCollection;

/**
 * @method  string  getProductId()
 * @method  string  getProductSku()
 * @method  string  getProductTitle()
 * @method  string  getProductImageUrl()
 * @method  boolean  isProductExists()
 * @method  OverrideCollection  getOverrides()
 * @method  boolean  isDisabled()
 * @method  boolean  isExcluded()
 * @method  boolean  isUncategorized()
 * @method  array  getExcludedBy()
 */
class Product extends BaseObject
{
    protected static array $dataTypes = [
        'overrides' => [OverrideCollection::class, 'create'],
    ];
}
