<?php

namespace BeezupSDK\Domain\ChannelCatalogs\Common\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\ChannelCatalogs\Common\ColumnMapping;

/**
 * @method  ColumnMapping   current()
 * @method  ColumnMapping   first()
 * @method  ColumnMapping   get($offset)
 * @method  ColumnMapping   offsetGet($offset)
 * @method  ColumnMapping   last()
 * @method  ColumnMapping[] getIterator()
 */
class ColumnMappingCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = ColumnMapping::class;
}
