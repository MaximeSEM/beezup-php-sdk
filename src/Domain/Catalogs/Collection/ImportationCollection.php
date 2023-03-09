<?php

namespace BeezupSDK\Domain\Catalogs\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Catalogs\Importation;

/**
 * @method  Importation   current()
 * @method  Importation   first()
 * @method  Importation   get($offset)
 * @method  Importation   offsetGet($offset)
 * @method  Importation   last()
 * @method  Importation[] getIterator()
 */
class ImportationCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = Importation::class;
}
