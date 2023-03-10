<?php

namespace BeezupSDK\Domain\Marketplaces;

use BeezupSDK\Core\Domain\BaseObject;
use DateTime;

/**
 * @method  string  getFeedType()
 * @method  DateTime  getStartUtcDate()
 * @method  DateTime  getEndUtcDate()
 * @method  string  getProcessingStatus()
 * @method  int  getExportedProducts()
 * @method  int  getTransmittedItems()
 * @method  int  getPublishedItems()
 * @method  int  getPublishedItemsWithWarning()
 * @method  int  getFailedItems()
 * @method  int  getIgnoredItems()
 * @method  string  getErrorMessage()
 * @method  string  getHtmlReportUrl()
 * @method  string  getHtmlReportGenerationErrorMessage()
 */
class Feed extends BaseObject
{
    protected static array $dataTypes = [
        'startUtcDate' => DateTime::class,
        'endUtcDate' => DateTime::class,
        'exportedProducts' => 'intval',
        'transmittedItems' => 'intval',
        'publishedItems' => 'intval',
        'publishedItemsWithWarning' => 'intval',
        'failedItems' => 'intval',
        'ignoredItems' => 'intval',
    ];
}
