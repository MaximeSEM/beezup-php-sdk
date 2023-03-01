<?php

namespace BeezupSDK\Request\Subscriptions;

use BeezupSDK\Core\Domain\IdTrait;
use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;

class DeleteSubscriptionRequest extends AbstractRequest
{
    use IdTrait;
    protected string $method = 'DELETE';
    protected string $endpoint = '/user/marketplaces/orders/subscriptions/{id}';
    protected array $uriVars = [
        'id'
    ];

    public function __construct(string $id)
    {
        parent::__construct();
        $this->setId($id);
    }

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
