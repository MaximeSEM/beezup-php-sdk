<?php

namespace BeezupSDK\Domain\Subscriptions\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Subscriptions\subscriptionPush;


/**
 * @method  SubscriptionPush   current()
 * @method  SubscriptionPush   first()
 * @method  SubscriptionPush   get($offset)
 * @method  SubscriptionPush   offsetGet($offset)
 * @method  SubscriptionPush   last()
 * @method  SubscriptionPush[] getIterator()
 */
class SubscriptionPushCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = SubscriptionPush::class;
}
