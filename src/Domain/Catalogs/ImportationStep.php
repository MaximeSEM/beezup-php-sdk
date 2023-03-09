<?php

namespace BeezupSDK\Domain\Catalogs;

use BeezupSDK\Core\Domain\BaseObject;

/**
 * @method  bool  isCatalogImportPrepareReadCompleted()
 * @method  bool  isCatalogImportComputeDiffCompleted()
 * @method  bool  isCatalogUpdateCompleted()
 * @method  bool  isSavedInDb()
 */
class ImportationStep extends BaseObject
{
    protected static array $mapping = [
        'isCatalogImportPrepareReadCompleted' => 'catalogImportPrepareReadCompleted',
        'isCatalogImportComputeDiffCompleted' => 'catalogImportComputeDiffCompleted',
        'isCatalogUpdateCompleted' => 'catalogUpdateCompleted',
        'isSavedInDb' => 'savedInDb',
    ];
}
