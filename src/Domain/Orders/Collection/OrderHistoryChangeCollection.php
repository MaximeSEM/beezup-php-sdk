<?php

namespace BeezupSDK\Domain\Orders\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Orders\OrderHistoryChange;

/**
 * @method  OrderHistoryChange  current()
 * @method  OrderHistoryChange   first()
 * @method  OrderHistoryChange   get($offset)
 * @method  OrderHistoryChange   offsetGet($offset)
 * @method  OrderHistoryChange   last()
 * @method  OrderHistoryChange[] getIterator()
 */
class OrderHistoryChangeCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = OrderHistoryChange::class;
}
