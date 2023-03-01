<?php

namespace BeezupSDK\Domain\Catalogs\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Catalogs\CatalogColumn;

/**
 * @method  CatalogColumn   current()
 * @method  CatalogColumn   first()
 * @method  CatalogColumn   get($offset)
 * @method  CatalogColumn   offsetGet($offset)
 * @method  CatalogColumn   last()
 * @method  CatalogColumn[] getIterator()
 */
class CatalogColumnCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = CatalogColumn::class;
}
