<?php

namespace BeezupSDK\Domain\Common\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Common\LovLink;

/**
 * @method  LovLink   current()
 * @method  LovLink   first()
 * @method  LovLink   get($offset)
 * @method  LovLink   offsetGet($offset)
 * @method  LovLink   last()
 * @method  LovLink[] getIterator()
 */
class LovLinkCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = LovLink::class;
}
