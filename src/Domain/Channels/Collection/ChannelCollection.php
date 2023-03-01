<?php

namespace BeezupSDK\Domain\Channels\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Channels\Channel;

/**
 * @method  Channel   current()
 * @method  Channel   first()
 * @method  Channel   get($offset)
 * @method  Channel   offsetGet($offset)
 * @method  Channel   last()
 * @method  Channel[] getIterator()
 */
class ChannelCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = Channel::class;
}
