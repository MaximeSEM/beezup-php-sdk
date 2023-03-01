<?php

namespace BeezupSDK\Domain\Orders\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Orders\OrderItem;

/**
 * @method  OrderItem   current()
 * @method  OrderItem   first()
 * @method  OrderItem   get($offset)
 * @method  OrderItem   offsetGet($offset)
 * @method  OrderItem   last()
 * @method  OrderItem[] getIterator()
 */
class OrderItemCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = OrderItem::class;
}
