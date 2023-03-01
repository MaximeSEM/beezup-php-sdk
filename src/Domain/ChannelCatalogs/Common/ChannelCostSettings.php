<?php

namespace BeezupSDK\Domain\ChannelCatalogs\Common;

use BeezupSDK\Core\Domain\BaseObject;

/**
 * @method  string  getCostType()
 * @method  float  getGlobalCostValue()
 */
class ChannelCostSettings extends BaseObject
{
    protected static array $dataTypes = [
        'globalCostValue' => 'floatval',
    ];
}
