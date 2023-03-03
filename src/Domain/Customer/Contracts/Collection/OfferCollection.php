<?php

namespace BeezupSDK\Domain\Customer\Contracts\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Customer\Contracts\Offer;

/**
 * @method  Offer   current()
 * @method  Offer   first()
 * @method  Offer   get($offset)
 * @method  Offer   offsetGet($offset)
 * @method  Offer   last()
 * @method  Offer[] getIterator()
 */
class OfferCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = Offer::class;
}
