<?php

namespace BeezupSDK\Request\Orders;

use BeezupSDK\Core\Request\AbstractOrderRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;

/**
 * @method boolean getTestMode()
 * @method $this setTestMode(boolean $testMode)
 * @method string getChangeOrderType()
 * @method $this setChangeOrderType(string $changeOrderType)
 * @method string getUserName()
 * @method $this setUserName(string $userName)
 */
class PostOrderChangeRequest extends AbstractOrderRequest
{
    protected static array $allowedValues = [
        'changeOrderType' => [
            'CancelOrder',
            'ShipOrder',
            'ShipOrderUnknowCarrierCode',
            'RefundOrder',
        ]
    ];
    public array $queryParams = [
        'userName',
        'testMode'
    ];
    protected array $uriVars = ['changeOrderType'];

    protected string $method = 'POST';
    protected string $version = 'orders/v3';
    protected string $endpoint = '/{marketplaceTechnicalCode}/{accountId}/{beezUPOrderId}/{changeOrderType}';

    public function __construct(string $marketplaceTechnicalCode, string $accountId, string $beezUPOrderId, string $changeOrderType, string $userName, array $body = [])
    {
        parent::__construct($marketplaceTechnicalCode, $accountId, $beezUPOrderId);
        $this->setChangeOrderType($changeOrderType);
        $this->setUserName($userName);
        if ($body) {
            $this->bodyParams = array_keys($body);
            foreach ($body as $key => $data) {
                $this->setData($key, $data);
            }
        }
    }

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
