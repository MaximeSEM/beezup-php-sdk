<?php

namespace BeezupSDK\Domain\Customer\Contracts;

use BeezupSDK\Core\Domain\BaseObject;

/**
 * @method  int  getStoreCount()
 * @method  int  getMaxStoreCount()
 * @method  int  getMinStoreCount()
 * @method  int  getOwnedStoreCount()
 * @method  int  getAdditionalStorePrice()
 * @method  int  getStoreIncluded()
 */
class ContractStoreInfo extends BaseObject
{
    protected static array $dataTypes = [
        'storeCount' => 'intval',
        'maxStoreCount' => 'intval',
        'minStoreCount' => 'intval',
        'ownedStoreCount' => 'intval',
        'additionalStorePrice' => 'intval',
        'storeIncluded' => 'intval',
    ];
}