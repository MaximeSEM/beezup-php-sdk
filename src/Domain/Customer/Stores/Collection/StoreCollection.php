<?php

namespace BeezupSDK\Domain\Customer\Stores\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Customer\Stores\Store;

/**
 * @method  Store   current()
 * @method  Store   first()
 * @method  Store   get($offset)
 * @method  Store   offsetGet($offset)
 * @method  Store   last()
 * @method  Store[] getIterator()
 */
class StoreCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = Store::class;
}
