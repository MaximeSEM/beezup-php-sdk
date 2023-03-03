<?php

namespace BeezupSDK\Domain\Common\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Common\FieldConfiguration;

/**
 * @method  FieldConfiguration   current()
 * @method  FieldConfiguration   first()
 * @method  FieldConfiguration   get($offset)
 * @method  FieldConfiguration   offsetGet($offset)
 * @method  FieldConfiguration   last()
 * @method  FieldConfiguration[] getIterator()
 */
class FieldConfigurationCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = FieldConfiguration::class;
}
