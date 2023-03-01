<?php

namespace BeezupSDK\Domain\Orders;

use BeezupSDK\Core\Domain\BaseObject;
use DateTime;

/**
 * @method  string getExecutionUUID()
 * @method  string getChangeOrderType()
 * @method  string getSourceType()
 * @method  string getSourceUserId()
 * @method  string getSourceUserName()
 * @method  Datetime getCreationUtcDate()
 * @method  string getProcessingStatus()
 * @method  Datetime getLastUpdateUtcDate()
 * @method  string getErrorMessage()
 * @method  string getIpAddress()
 * @method  boolean isTestMode()
 * @method  array getDetails()
 */
class OrderHistoryChange extends BaseObject
{
    protected static array $dataTypes = [
        'creationUtcDate' => DateTime::class,
        'lastUpdateUtcDate' => DateTime::class,
    ];
}
