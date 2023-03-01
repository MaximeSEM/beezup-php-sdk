<?php

namespace BeezupSDK\Domain\Customer\Rights\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Customer\Rights\Right;

/**
 * @method  Right   current()
 * @method  Right   first()
 * @method  Right   get($offset)
 * @method  Right   offsetGet($offset)
 * @method  Right   last()
 * @method  Right[] getIterator()
 */
class RightCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = Right::class;
}
