<?php

namespace BeezupSDK\Request\Orders;

use BeezupSDK\Core\Request\AbstractOrderRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;

class PostOrderHarvestRequest extends AbstractOrderRequest
{
    protected string $method = 'POST';
    protected string $version = 'orders/v3';
    protected string $endpoint = '/{marketplaceTechnicalCode}/{accountId}/{beezUPOrderId}/harvest';

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
