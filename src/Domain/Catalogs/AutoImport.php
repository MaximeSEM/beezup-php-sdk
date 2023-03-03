<?php

namespace BeezupSDK\Domain\Catalogs;

use BeezupSDK\Core\Domain\BaseObject;
use DateTime;

/**
 * @method  AutoImportInput  getInput()
 * @method  string  getInputConfiguredByUserId()
 * @method  string  getSchedulingType()
 * @method  string  getScheduledByUserId()
 * @method  array  getSchedulingValue()
 * @method  bool  isPaused()
 * @method  string  getPauseStatusChangedByUserId()
 * @method  DateTime  getPauseStatusChangedUtcDate()
 * @method  AutoImportDuplicatedProductConfiguration  getDuplicateProductConfiguration()
 * @method  string  getSchedulingLocalTimeZoneName()
 */
class AutoImport extends BaseObject
{
    protected static array $dataTypes = [
        'input' => [AutoImportInput::class, 'create'],
        'pauseStatusChangedUtcDate' => DateTime::class,
        'duplicateProductConfiguration' => [AutoImportDuplicatedProductConfiguration::class, 'create']
    ];
}