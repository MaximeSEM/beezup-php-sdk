<?php

namespace BeezupSDK\Request\Customer\Contracts;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;

class DeleteContractRequest extends AbstractRequest
{
    protected string $method = 'DELETE';
    protected string $endpoint = '/user/customer/contracts/next';

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
