<?php

namespace BeezupSDK\Domain\Orders\Batches;

use BeezupSDK\Core\Domain\BaseObject;
use BeezupSDK\Domain\Common\Collection\ErrorCollection;

/**
 * @method  OrderBatch  getOrder()
 * @method  boolean  isSuccess()
 * @method  int  getStatus()
 * @method  ErrorCollection  getErrors()
 */
class OrderBatchOperation extends BaseObject
{
    protected static array $dataTypes = [
        'order' => [OrderBatch::class, 'create'],
        'status' => 'intval',
        'errors' => [ErrorCollection::class, 'create']
    ];
}
