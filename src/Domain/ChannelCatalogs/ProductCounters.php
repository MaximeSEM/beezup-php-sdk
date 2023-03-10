<?php

namespace BeezupSDK\Domain\ChannelCatalogs;

use BeezupSDK\Core\Domain\BaseObject;

/**
 * @method  int  getExistingProductCount()
 * @method  int  getUncategorizedProductCount()
 * @method  int  getDisabledProductCountIncludingUncategorized()
 * @method  int  getDisabledProductCountExcludingUncategorized()
 * @method  int  getExcludedProductCountIncludingUncategorizedAndDisabled()
 * @method  int  getExcludedProductCountExcludingUncategorizedAndDisabled()
 */
class ProductCounters extends BaseObject
{
    protected static array $dataTypes = [
        'existingProductCount' => 'intval',
        'uncategorizedProductCount' => 'intval',
        'disabledProductCountIncludingUncategorized' => 'intval',
        'disabledProductCountExcludingUncategorized' => 'intval',
        'excludedProductCountIncludingUncategorizedAndDisabled' => 'intval',
        'excludedProductCountExcludingUncategorizedAndDisabled' => 'intval',
    ];
}
