<?php

namespace BeezupSDK\Request\Orders;

use BeezupSDK\Core\Request\AbstractOrderRequest;
use BeezupSDK\Core\Request\EtagTrait;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Orders\Order;


class GetOrderRequest extends AbstractOrderRequest
{
    use EtagTrait;

    protected string $version = 'orders/v3';
    protected string $endpoint = '/{marketplaceTechnicalCode}/{accountId}/{beezUPOrderId}';

    public function getResponseDecorator(): BaseObject|Order
    {
        return Order::decorator();
    }
}
