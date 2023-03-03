<?php

namespace BeezupSDK\Domain\Customer\Contracts;

use BeezupSDK\Core\Domain\BaseObject;

/**
 * @method  string  getBonusType()
 * @method  float  getAmount()
 */
class ContractBonus extends BaseObject
{
    protected static array $dataTypes = [
        'amount' => 'floatval'
    ];
}