<?php

namespace BeezupSDK\Domain\Catalogs;

use BeezupSDK\Core\Domain\BaseObject;
use BeezupSDK\Domain\Common\Collection\ErrorCollection;
use DateTime;

/**
 * @method  DateTime  getBeginUtcDate()
 * @method  DateTime  getEndUtcDate()
 * @method  string  getUserId()
 * @method  array  getInputConfiguration()
 */
class ImportationReportInfo extends BaseObject
{
    protected static array $dataTypes = [
        'beginUtcDate' => DateTime::class,
        'endUtcDate' => DateTime::class,
    ];
}
