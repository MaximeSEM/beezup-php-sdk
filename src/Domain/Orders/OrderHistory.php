<?php

namespace BeezupSDK\Domain\Orders;

use BeezupSDK\Core\Domain\BaseObject;
use BeezupSDK\Domain\Orders\Collection\OrderHistoryChangeCollection;
use BeezupSDK\Domain\Orders\Collection\OrderHistoryHarvestCollection;
use DateTime;

/**
 * @method  OrderHistoryChangeCollection getChangeOrderReportings()
 * @method  OrderHistoryHarvestCollection getHarvestOrderReportings()
 * @method  DateTime getLastModificationUtcDate()
 */
class OrderHistory extends BaseObject
{
    protected static array $dataTypes = [
        'lastModificationUtcDate' => DateTime::class,
        'changeOrderReportings' => [OrderHistoryChangeCollection::class, 'create'],
        'harvestOrderReportings' => [OrderHistoryHarvestCollection::class, 'create'],
    ];
}
