<?php
namespace BeezupSDK\Domain\PublicChannels\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\PublicChannels\PublicChannel;

/**
 * @method  PublicChannel   current()
 * @method  PublicChannel   first()
 * @method  PublicChannel   get($offset)
 * @method  PublicChannel   offsetGet($offset)
 * @method  PublicChannel   last()
 * @method  PublicChannel[] getIterator()
 */
class PublicChannelCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = PublicChannel::class;
}
