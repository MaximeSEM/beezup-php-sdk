<?php

namespace BeezupSDK\Domain\Customer\Contracts\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Customer\Contracts\ContractBonus;

/**
 * @method  ContractBonus   current()
 * @method  ContractBonus   first()
 * @method  ContractBonus   get($offset)
 * @method  ContractBonus   offsetGet($offset)
 * @method  ContractBonus   last()
 * @method  ContractBonus[] getIterator()
 */
class ContractBonusCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = ContractBonus::class;
}
