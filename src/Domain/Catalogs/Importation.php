<?php

namespace BeezupSDK\Domain\Catalogs;

use BeezupSDK\Core\Domain\BaseObject;
use BeezupSDK\Domain\Catalogs\Collection\ImportationStepCollection;
use BeezupSDK\Domain\Common\Collection\ErrorCollection;
use DateTime;

/**
 * @method  string  getExecutionId()
 * @method  string  getStepName()
 * @method  string  getUserId()
 * @method  boolean  isSuccess()
 * @method  int  getTotalProductCount()
 * @method  int  getTotalProductErrorCount()
 * @method  int  getTotalProductSuccessCount()
 * @method  ErrorCollection  getErrors()
 * @method  DateTime  getLastUpdateUtcDate()
 * @method  boolean  isAutoImported()
 * @method  DateTime  getBeginUtcDate()
 * @method  DateTime  getEndUtcDate()
 * @method  string  getInputConfigurationUrl()
 * @method  ImportationStepCollection  getSteps()
 */
class Importation extends BaseObject
{
    protected static array $dataTypes = [
        'totalProductCount' => 'intval',
        'totalProductErrorCount' => 'intval',
        'totalProductSuccessCount' => 'intval',
        'errors' => [ErrorCollection::class, 'create'],
        'lastUpdateUtcDate' => DateTime::class,
        'beginUtcDate' => DateTime::class,
        'endUtcDate' => DateTime::class,
        'steps' => [ImportationStepCollection::class, 'create']
    ];
}
