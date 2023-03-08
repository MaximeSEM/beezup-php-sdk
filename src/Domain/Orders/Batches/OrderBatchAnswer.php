<?php

namespace BeezupSDK\Domain\Orders\Batches;

use BeezupSDK\Core\Domain\BaseObject;
use BeezupSDK\Domain\Orders\Batches\Collection\OrderBatchOperationCollection;

/**
 * @method  OrderBatchOperationCollection  getOperations()
 */
class OrderBatchAnswer extends BaseObject
{
    protected static array $dataTypes = [
        'operations' => [OrderBatchOperationCollection::class, 'create']
    ];
}
