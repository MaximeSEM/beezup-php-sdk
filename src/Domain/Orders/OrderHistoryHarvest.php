<?php

namespace BeezupSDK\Domain\Orders;

use BeezupSDK\Core\Domain\BaseObject;
use DateTime;

/**
 * @method  string getExecutionUUID()
 * @method  Datetime getCreationUtcDate()
 * @method  string getProcessingStatus()
 * @method  Datetime getLastUpdateUtcDate()
 * @method  string getErrorMessage()
 * @method  string getWarningMessage()
 * @method  string getBeezUPStatus()
 * @method  string getMarketplaceStatus()
 * @method  string getBeezUPForcedStatus()
 */
class OrderHistoryHarvest extends BaseObject
{
    protected static array $dataTypes = [
        'creationUtcDate' => DateTime::class,
        'lastUpdateUtcDate' => DateTime::class,
    ];
}