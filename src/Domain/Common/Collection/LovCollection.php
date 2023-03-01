<?php

namespace BeezupSDK\Domain\Common\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Common\Lov;

/**
 * @method  Lov   current()
 * @method  Lov   first()
 * @method  Lov   get($offset)
 * @method  Lov   offsetGet($offset)
 * @method  Lov   last()
 * @method  Lov[] getIterator()
 */
class LovCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = Lov::class;
}
