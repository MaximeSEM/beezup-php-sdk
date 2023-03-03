<?php

namespace BeezupSDK\Request\Customer\Contracts;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;

class PostContractEnableAutoRenewalRequest extends AbstractRequest
{
    protected string $method = 'POST';
    protected string $endpoint = '/user/customer/contracts/current/reenableAutoRenewal';


    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
