<?php

namespace BeezupSDK\Domain\Customer\Contracts;

use BeezupSDK\Core\Domain\BaseObject;

/**
 * @method  float  getAdditionalClickPrice()
 * @method  int  getClickIncluded()
 * @method  int  getInitialOfferClickIncluded()
 */
class ContractClickInfo extends BaseObject
{
    protected static array $dataTypes = [
        'additionalClickPrice' => 'floatval',
        'clickIncluded' => 'intval',
        'initialOfferClickIncluded' => 'intval'
    ];
}