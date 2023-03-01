<?php

namespace BeezupSDK\Domain\Subscriptions;

use BeezupSDK\Domain\Common\Collection\ErrorCollection;
use DateTime;

/**
 * @method  DateTime  getRecoverBeginPeriodOrderLastModificationUtcDate()
 * @method  DateTime  getRecoverEndPeriodOrderLastModificationUtcDate()
 * @method  DateTime  getLastOrderPushedModificationUtcDate()
 * @method  DateTime  getLastSuccessfulOrderPushedUtcDate()
 * @method  DateTime  getConsumerUnvailableSinceUtcDate()
 * @method  DateTime  getLastRetryUtcDate()
 * @method  int  getRetryCount()
 * @method  int  getMaxRetryCount()
 * @method  ErrorCollection getErrors()
 * @method  string  getConsumerLastRequestSentUri()
 */
class SubscriptionDetail extends Subscription
{
    protected static array $mapping = ['lastErrorMessage/errors' => 'errors'];

    protected static array $dataTypes = [
        'recoverBeginPeriodOrderLastModificationUtcDate' => DateTime::class,
        'recoverEndPeriodOrderLastModificationUtcDate' => DateTime::class,
        'lastOrderPushedModificationUtcDate' => DateTime::class,
        'lastSuccessfulOrderPushedUtcDate' => DateTime::class,
        'consumerUnvailableSinceUtcDate' => DateTime::class,
        'lastRetryUtcDate' => DateTime::class,
        'retryCount' => 'intval',
        'maxRetryCount' => 'intval',
        'nextScheduledRetryUtcDate' => DateTime::class,
        'errors' => [ErrorCollection::class, 'create']
    ];
}
