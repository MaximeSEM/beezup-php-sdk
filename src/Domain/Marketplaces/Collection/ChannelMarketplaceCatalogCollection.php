<?php

namespace BeezupSDK\Domain\Marketplaces\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Marketplaces\ChannelMarketplaceCatalog;

/**
 * @method  ChannelMarketplaceCatalog   current()
 * @method  ChannelMarketplaceCatalog   first()
 * @method  ChannelMarketplaceCatalog   get($offset)
 * @method  ChannelMarketplaceCatalog   offsetGet($offset)
 * @method  ChannelMarketplaceCatalog   last()
 * @method  ChannelMarketplaceCatalog[] getIterator()
 */
class ChannelMarketplaceCatalogCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = ChannelMarketplaceCatalog::class;
}
