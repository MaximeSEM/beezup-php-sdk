<?php

namespace BeezupSDK\Domain\Customer\Friends\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Customer\Friends\Friend;

/**
 * @method  Friend   current()
 * @method  Friend   first()
 * @method  Friend   get($offset)
 * @method  Friend   offsetGet($offset)
 * @method  Friend   last()
 * @method  Friend[] getIterator()
 */
class FriendCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = Friend::class;
}
