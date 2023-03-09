<?php

namespace BeezupSDK\Domain\Catalogs;

use BeezupSDK\Core\Domain\BaseObject;

/**
 * @method  int  getDetectedCount()
 * @method  int  getDuplicatedCount()
 * @method  int  getFailedCount()
 * @method  int  getActiveCount()
 */
class ImportationReportMetrics extends BaseObject
{
    protected static array $dataTypes = [
        'detectedCount' => 'intval',
        'duplicatedCount' => 'intval',
        'failedCount' => 'intval',
        'activeCount' => 'intval',
    ];
}
