<?php

namespace BeezupSDK\Domain\ChannelCatalogs\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\ChannelCatalogs\ChannelCatalog;

/**
 * @method  ChannelCatalog   current()
 * @method  ChannelCatalog   first()
 * @method  ChannelCatalog   get($offset)
 * @method  ChannelCatalog   offsetGet($offset)
 * @method  ChannelCatalog   last()
 * @method  ChannelCatalog[] getIterator()
 */
class ChannelCatalogCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = ChannelCatalog::class;
}
