<?php

namespace BeezupSDK\Domain\Marketplaces\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Marketplaces\Publication;

/**
 * @method  Publication   current()
 * @method  Publication   first()
 * @method  Publication   get($offset)
 * @method  Publication   offsetGet($offset)
 * @method  Publication   last()
 * @method  Publication[] getIterator()
 */
class PublicationCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = Publication::class;
}
