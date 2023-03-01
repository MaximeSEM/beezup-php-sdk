<?php

namespace BeezupSDK\Domain\Catalogs\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Catalogs\CustomColumn;

/**
 * @method  CustomColumn   current()
 * @method  CustomColumn   first()
 * @method  CustomColumn   get($offset)
 * @method  CustomColumn   offsetGet($offset)
 * @method  CustomColumn   last()
 * @method  CustomColumn[] getIterator()
 */
class CustomColumnCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = CustomColumn::class;
}
