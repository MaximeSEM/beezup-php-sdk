<?php

namespace BeezupSDK\Request\Subscriptions;

use BeezupSDK\Core\Domain\IdTrait;
use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseCollection;
use BeezupSDK\Domain\Subscriptions\Collection\SubscriptionPushCollection;

class GetSubscriptionsPushRequest extends AbstractRequest
{
    use IdTrait;
    protected string $endpoint = '/user/marketplaces/orders/subscriptions/{id}/reporting';
    protected array $uriVars = [
        'id'
    ];

    public function __construct(string $id)
    {
        parent::__construct();
        $this->setId($id);
    }

    public function getResponseDecorator(): BaseCollection|SubscriptionPushCollection
    {
        return SubscriptionPushCollection::decorator();
    }
}
