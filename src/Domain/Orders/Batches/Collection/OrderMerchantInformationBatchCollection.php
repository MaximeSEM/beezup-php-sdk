<?php

namespace BeezupSDK\Domain\Orders\Batches\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Orders\Batches\OrderMerchantInformationBatch;

/**
 * @method  OrderMerchantInformationBatch   current()
 * @method  OrderMerchantInformationBatch   first()
 * @method  OrderMerchantInformationBatch   get($offset)
 * @method  OrderMerchantInformationBatch   offsetGet($offset)
 * @method  OrderMerchantInformationBatch   last()
 * @method  OrderMerchantInformationBatch[] getIterator()
 */
class OrderMerchantInformationBatchCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = OrderMerchantInformationBatch::class;
}
