<?php

namespace BeezupSDK\Request\Orders\Batches;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Orders\Batches\Collection\OrderBatchCollection;
use BeezupSDK\Domain\Orders\Batches\OrderBatchAnswer;

/**
 * @method boolean getTestMode()
 * @method $this setTestMode(boolean $testMode)
 */
class DeleteBatchOrderMerchantInformationRequest extends AbstractRequest
{
    public array $queryParams = [
        'testMode'
    ];
    public array $bodyParams = ['orders'];

    protected string $method = 'POST';
    protected string $version = 'orders/v3';
    protected string $endpoint = '/batches/clearMerchantOrderInfos';

    public function __construct(array|OrderBatchCollection $orders)
    {
        parent::__construct();

        $this->setOrders($orders);
    }

    /**
     * @param array|OrderBatchCollection $orders
     * @return $this
     */
    public function setOrders(array|OrderBatchCollection $orders): static
    {
        if ($orders instanceof OrderBatchCollection) {
            $orders = $orders->toArray();
        }
        return $this->setData('orders', $orders);
    }

    /**
     * @return OrderBatchCollection
     */
    public function getOrders()
    {
        $items = $this->getData('orders');
        return new OrderBatchCollection($items);
    }

    public function getResponseDecorator(): BaseObject|OrderBatchAnswer
    {
        return OrderBatchAnswer::decorator();
    }
}
