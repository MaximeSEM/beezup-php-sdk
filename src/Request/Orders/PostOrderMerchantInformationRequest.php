<?php

namespace BeezupSDK\Request\Orders;

use BeezupSDK\Core\Request\AbstractOrderRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;

/**
 * @method boolean getTestMode()
 * @method $this setTestMode(boolean $testMode)
 * @method string getOrder_MerchantOrderId()
 * @method $this setOrder_MerchantOrderId(string $merchantOrderId)
 * @method string getOrder_MerchantECommerceSoftwareName()
 * @method $this setOrder_MerchantECommerceSoftwareName(string $merchantOrderId)
 * @method string getOrder_MerchantECommerceSoftwareVersion()
 * @method $this setOrder_MerchantECommerceSoftwareVersion(string $merchantOrderId)
 */
class PostOrderMerchantInformationRequest extends AbstractOrderRequest
{
    public array $queryParams = [
        'testMode'
    ];
    public array $bodyParams = [
        'order_MerchantOrderId',
        'order_MerchantECommerceSoftwareName',
        'order_MerchantECommerceSoftwareVersion',
    ];
    protected string $method = 'POST';
    protected string $version = 'orders/v3';
    protected string $endpoint = '/{marketplaceTechnicalCode}/{accountId}/{beezUPOrderId}/setMerchantOrderInfo';

    public function __construct(string $marketplaceTechnicalCode, string $accountId, string $beezUPOrderId, string $merchantOrderId, string $merchantECommerceSoftwareName, string $merchantECommerceSoftwareVersion)
    {
        parent::__construct($marketplaceTechnicalCode, $accountId, $beezUPOrderId);
        $this->setOrder_MerchantOrderId($merchantOrderId);
        $this->setOrder_MerchantECommerceSoftwareName($merchantECommerceSoftwareName);
        $this->setOrder_MerchantECommerceSoftwareVersion($merchantECommerceSoftwareVersion);
    }

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
