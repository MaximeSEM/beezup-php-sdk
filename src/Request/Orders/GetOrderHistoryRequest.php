<?php

namespace BeezupSDK\Request\Orders;

use BeezupSDK\Core\Request\AbstractOrderRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Orders\OrderHistory;

class GetOrderHistoryRequest extends AbstractOrderRequest
{
    protected string $version = 'orders/v3';
    protected string $endpoint = '/{marketplaceTechnicalCode}/{accountId}/{beezUPOrderId}/history';

    public function getResponseDecorator(): BaseObject|OrderHistory
    {
        return OrderHistory::decorator();
    }
}
