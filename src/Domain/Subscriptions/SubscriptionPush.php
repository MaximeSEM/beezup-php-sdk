<?php

namespace BeezupSDK\Domain\Subscriptions;

use BeezupSDK\Core\Domain\BaseObject;
use BeezupSDK\Domain\Common\Collection\ErrorCollection;
use DateTime;

/**
 * @method  string getSubscriptionId()
 * @method  string getEventId()
 * @method  boolean isSucceed()
 * @method  DateTime getDastOrderModificationUtcDate()
 * @method  int getRetryCount()
 * @method  int getMaxRetryCount()
 * @method  DateTime getNextScheduledRetryUtcDate()
 * @method  ErrorCollection getErrors()
 * @method  string getRequestUri()
 * @method  string getResponseUri()
 * @method  int getOrderCount()
 * @method  string getDuration()
 * @method  int getHttpStatus()
 */
class SubscriptionPush extends BaseObject
{
    protected static array $mapping = ['lastErrorMessage/errors' => 'errors'];

    protected static array $dataTypes = [
        'lastOrderModificationUtcDate' => DateTime::class,
        'retryCount' => 'intval',
        'maxRetryCount' => 'intval',
        'nextScheduledRetryUtcDate' => DateTime::class,
        'errors' => [ErrorCollection::class, 'create'],
        'orderCount' => 'intval',
        'httpStatus' => 'intval',
    ];

}
