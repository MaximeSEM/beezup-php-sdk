<?php

namespace BeezupSDK\Request\Orders\Batches;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Orders\Batches\Collection\OrderMerchantInformationBatchCollection;
use BeezupSDK\Domain\Orders\Batches\OrderBatchAnswer;

/**
 * @method string getOrder_MerchantECommerceSoftwareName()
 * @method $this setOrder_MerchantECommerceSoftwareName(string $order_MerchantECommerceSoftwareName)
 * @method string getOrder_MerchantECommerceSoftwareVersion()
 * @method $this setOrder_MerchantECommerceSoftwareVersion(string $order_MerchantECommerceSoftwareVersion)
 * @method boolean getTestMode()
 * @method $this setTestMode(boolean $testMode)
 */
class PostBatchOrderMerchantInformationRequest extends AbstractRequest
{
    public array $queryParams = [
        'testMode'
    ];
    public array $bodyParams = ['order_MerchantECommerceSoftwareName', 'order_MerchantECommerceSoftwareVersion', 'orders'];

    protected string $method = 'POST';
    protected string $version = 'orders/v3';
    protected string $endpoint = '/batches/setMerchantOrderInfos';

    public function __construct(string $order_MerchantECommerceSoftwareName, string $order_MerchantECommerceSoftwareVersion, array|OrderMerchantInformationBatchCollection $orders)
    {
        parent::__construct();
        $this->setOrder_MerchantECommerceSoftwareName($order_MerchantECommerceSoftwareName);
        $this->setOrder_MerchantECommerceSoftwareVersion($order_MerchantECommerceSoftwareVersion);
        $this->setOrders($orders);
    }

    /**
     * @param array|OrderMerchantInformationBatchCollection $orders
     * @return $this
     */
    public function setOrders(array|OrderMerchantInformationBatchCollection $orders): static
    {
        if ($orders instanceof OrderMerchantInformationBatchCollection) {
            $orders = $orders->toArray();
        }
        return $this->setData('orders', $orders);
    }

    /**
     * @return OrderMerchantInformationBatchCollection
     */
    public function getOrders()
    {
        $items = $this->getData('orders');
        return new OrderMerchantInformationBatchCollection($items);
    }

    public function getResponseDecorator(): BaseObject|OrderBatchAnswer
    {
        return OrderBatchAnswer::decorator();
    }
}
