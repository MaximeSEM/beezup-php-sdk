<?php

namespace BeezupSDK\Domain\Customer\Alerts\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Customer\Alerts\Property;

/**
 * @method  Property   current()
 * @method  Property   first()
 * @method  Property   get($offset)
 * @method  Property   offsetGet($offset)
 * @method  Property   last()
 * @method  Property[] getIterator()
 */
class PropertyCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = Property::class;
}
