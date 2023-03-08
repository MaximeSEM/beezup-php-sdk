<?php

namespace BeezupSDK\Request\Customer\Alerts;

use BeezupSDK\Core\Request\AbstractStoreRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;
use BeezupSDK\Domain\Customer\Alerts\Collection\AlertCollection;

/**
 * @method  AlertCollection getAlerts()
 * @method  $this  setAlerts(AlertCollection $alerts)
 * */
class PostAlertsRequest extends AbstractStoreRequest
{
    protected string $method = 'POST';
    protected string $endpoint = '/user/customer/stores/{storeId}/alerts';

    protected ?string $dataRoot = 'alerts';

    public function __construct(string $storeId, AlertCollection $alerts)
    {
        parent::__construct($storeId);
        $this->setAlerts($alerts);
    }

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
