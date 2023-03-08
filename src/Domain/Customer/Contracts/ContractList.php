<?php

namespace BeezupSDK\Domain\Customer\Contracts;

use BeezupSDK\Core\Domain\BaseObject;

/**
 * @method  Contract  getCurrent()
 * @method  Contract  getNext()
 */
class ContractList extends BaseObject
{
    protected static array $dataTypes = [
        'current' => [Contract::class, 'create'],
        'next' => [Contract::class, 'create']
    ];
}