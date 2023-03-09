<?php

namespace BeezupSDK\Domain\Catalogs\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Catalogs\ImportationStep;

/**
 * @method  ImportationStep   current()
 * @method  ImportationStep   first()
 * @method  ImportationStep   get($offset)
 * @method  ImportationStep   offsetGet($offset)
 * @method  ImportationStep   last()
 * @method  ImportationStep[] getIterator()
 */
class ImportationStepCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = ImportationStep::class;
}
