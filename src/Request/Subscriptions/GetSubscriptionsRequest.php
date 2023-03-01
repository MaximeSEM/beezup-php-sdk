<?php

namespace BeezupSDK\Request\Subscriptions;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseCollection;
use BeezupSDK\Domain\Subscriptions\Collection\SubscriptionCollection;
use BeezupSDK\Domain\Subscriptions\Collection\SubscriptionPushCollection;

class GetSubscriptionsRequest extends AbstractRequest
{
    protected string $endpoint = '/user/marketplaces/orders/subscriptions';

    public function __construct()
    {
        parent::__construct();
    }

    public function getResponseDecorator(): BaseCollection|SubscriptionPushCollection
    {
        return SubscriptionCollection::decorator();
    }
}
