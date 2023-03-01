<?php

namespace BeezupSDK\Request\Customer\Alerts;

use BeezupSDK\Core\Request\AbstractStoreRequest;
use BeezupSDK\Core\Request\EtagTrait;
use BeezupSDK\Core\Response\Decorator\BaseCollection;
use BeezupSDK\Domain\Customer\Alerts\Collection\AlertCollection;

class GetAlertsRequest extends AbstractStoreRequest
{
    use EtagTrait;

    protected string $endpoint = '/user/customer/stores/{storeId}/alerts';

    public function getResponseDecorator(): BaseCollection|AlertCollection
    {
        return AlertCollection::decorator('alerts','alertId');
    }
}
