<?php

namespace BeezupSDK\Domain\Marketplaces\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Marketplaces\Feed;

/**
 * @method  Feed   current()
 * @method  Feed   first()
 * @method  Feed   get($offset)
 * @method  Feed   offsetGet($offset)
 * @method  Feed   last()
 * @method  Feed[] getIterator()
 */
class FeedCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = Feed::class;
}
