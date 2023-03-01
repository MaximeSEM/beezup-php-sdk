<?php

namespace BeezupSDK\Domain\Orders\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Orders\OrderHistoryHarvest;

/**
 * @method  OrderHistoryHarvest  current()
 * @method  OrderHistoryHarvest   first()
 * @method  OrderHistoryHarvest   get($offset)
 * @method  OrderHistoryHarvest   offsetGet($offset)
 * @method  OrderHistoryHarvest   last()
 * @method  OrderHistoryHarvest[] getIterator()
 */
class OrderHistoryHarvestCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = OrderHistoryHarvest::class;
}
