<?php

namespace BeezupSDK\Domain\Subscriptions\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Subscriptions\Subscription;

/**
 * @method  Subscription   current()
 * @method  Subscription   first()
 * @method  Subscription   get($offset)
 * @method  Subscription   offsetGet($offset)
 * @method  Subscription   last()
 * @method  Subscription[] getIterator()
 */
class SubscriptionCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = Subscription::class;
}
