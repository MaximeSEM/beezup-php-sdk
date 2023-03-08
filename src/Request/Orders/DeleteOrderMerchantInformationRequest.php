<?php

namespace BeezupSDK\Request\Orders;

use BeezupSDK\Core\Request\AbstractOrderRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;

/**
 * @method boolean getTestMode()
 * @method $this setTestMode(boolean $testMode)
 */
class DeleteOrderMerchantInformationRequest extends AbstractOrderRequest
{
    public array $queryParams = [
        'testMode'
    ];
    protected string $method = 'POST';
    protected string $version = 'orders/v3';
    protected string $endpoint = '/{marketplaceTechnicalCode}/{accountId}/{beezUPOrderId}/clearMerchantOrderInfo';

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
