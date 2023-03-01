<?php

namespace BeezupSDK\Domain\ChannelCatalogs\Common\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\ChannelCatalogs\Common\ExclusionFilter;

/**
 * @method   ExclusionFilter   current()
 * @method   ExclusionFilter   first()
 * @method   ExclusionFilter   get($offset)
 * @method   ExclusionFilter   offsetGet($offset)
 * @method   ExclusionFilter   last()
 * @method   ExclusionFilter[] getIterator()
 */
class ExclusionFilterCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = ExclusionFilter::class;
}
