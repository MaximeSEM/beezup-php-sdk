<?php

namespace BeezupSDK\Domain\Orders\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Orders\Order;

/**
 * @method  Order   current()
 * @method  Order   first()
 * @method  Order   get($offset)
 * @method  Order   offsetGet($offset)
 * @method  Order   last()
 * @method  Order[] getIterator()
 */
class OrderCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = Order::class;
}
