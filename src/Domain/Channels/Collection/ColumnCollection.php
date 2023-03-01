<?php

namespace BeezupSDK\Domain\Channels\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Channels\Column;

/**
 * @method  Column   current()
 * @method  Column   first()
 * @method  Column   get($offset)
 * @method  Column   offsetGet($offset)
 * @method  Column   last()
 * @method  Column[] getIterator()
 */
class ColumnCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = Column::class;
}
