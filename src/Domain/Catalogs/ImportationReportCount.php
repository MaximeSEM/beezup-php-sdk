<?php

namespace BeezupSDK\Domain\Catalogs;

use BeezupSDK\Core\Domain\BaseObject;

/**
 * @method  int  getCreatedCount()
 * @method  int  getUpdatedCount()
 * @method  int  getDeletedCount()
 * @method  int  getUnchangedCount()
 */
class ImportationReportCount extends BaseObject
{
    protected static array $dataTypes = [
        'createdCount' =>'intval',
        'updatedCount' =>'intval',
        'deletedCount' =>'intval',
        'unchangedCount' =>'intval',
    ];
}
