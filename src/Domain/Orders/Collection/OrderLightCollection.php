<?php

namespace BeezupSDK\Domain\Orders\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Orders\OrderLight;

/**
 * @method  OrderLight   current()
 * @method  OrderLight   first()
 * @method  OrderLight   get($offset)
 * @method  OrderLight   offsetGet($offset)
 * @method  OrderLight   last()
 * @method  OrderLight[] getIterator()
 */
class OrderLightCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = OrderLight::class;
}
