<?php

namespace BeezupSDK\Domain\PublicChannels\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\PublicChannels\PublicChannelByCountry;

/**
 * @method  PublicChannelByCountry   current()
 * @method  PublicChannelByCountry   first()
 * @method  PublicChannelByCountry   get($offset)
 * @method  PublicChannelByCountry   offsetGet($offset)
 * @method  PublicChannelByCountry   last()
 * @method  PublicChannelByCountry[] getIterator()
 */
class PublicChannelByCountryCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = PublicChannelByCountry::class;
}
