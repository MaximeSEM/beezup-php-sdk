<?php

namespace BeezupSDK\Domain\Orders\Batches\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Orders\Batches\OrderBatch;

/**
 * @method  OrderBatch   current()
 * @method  OrderBatch   first()
 * @method  OrderBatch   get($offset)
 * @method  OrderBatch   offsetGet($offset)
 * @method  OrderBatch   last()
 * @method  OrderBatch[] getIterator()
 */
class OrderBatchCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = OrderBatch::class;
}
