<?php

namespace BeezupSDK\Domain\Orders\Batches\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Orders\Batches\OrderBatchOperation;

/**
 * @method  OrderBatchOperation   current()
 * @method  OrderBatchOperation   first()
 * @method  OrderBatchOperation   get($offset)
 * @method  OrderBatchOperation   offsetGet($offset)
 * @method  OrderBatchOperation   last()
 * @method  OrderBatchOperation[] getIterator()
 */
class OrderBatchOperationCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = OrderBatchOperation::class;
}
