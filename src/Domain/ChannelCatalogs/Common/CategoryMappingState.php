<?php

namespace BeezupSDK\Domain\ChannelCatalogs\Common;

use BeezupSDK\Core\Domain\BaseObject;

/**
 * @method  string  getStatus()
 * @method  int  getUncategorizedProductCount()
 * @method  int  getWithoutCategoryCostProductCount()
 */
class CategoryMappingState extends BaseObject
{
    protected static array $dataTypes = [
        'uncategorizedProductCount' => 'intval',
        'withoutCategoryCostProductCount' => 'intval',
    ];
}
