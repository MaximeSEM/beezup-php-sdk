<?php

namespace BeezupSDK\Domain\ApiIndex\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\ApiIndex\Value;

/**
 * @method  Value   current()
 * @method  Value   first()
 * @method  Value   get($offset)
 * @method  Value   offsetGet($offset)
 * @method  Value   last()
 * @method  Value[] getIterator()
 */
class ValueCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = Value::class;
}
