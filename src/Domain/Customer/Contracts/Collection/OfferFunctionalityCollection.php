<?php

namespace BeezupSDK\Domain\Customer\Contracts\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Customer\Contracts\OfferFunctionality;

/**
 * @method  OfferFunctionality   current()
 * @method  OfferFunctionality   first()
 * @method  OfferFunctionality   get($offset)
 * @method  OfferFunctionality   offsetGet($offset)
 * @method  OfferFunctionality   last()
 * @method  OfferFunctionality[] getIterator()
 */
class OfferFunctionalityCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = OfferFunctionality::class;
}
