<?php

namespace BeezupSDK\Domain\ChannelCatalogs\Common\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\ChannelCatalogs\Common\Override;

/**
 * @method   Override   current()
 * @method   Override   first()
 * @method   Override   get($offset)
 * @method   Override   offsetGet($offset)
 * @method   Override   last()
 * @method   Override[] getIterator()
 */
class OverrideCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = Override::class;
}
