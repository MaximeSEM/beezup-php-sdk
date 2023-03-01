<?php

namespace BeezupSDK\Request\Customer\Security;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;

class PostLogoutRequest extends AbstractRequest
{
    protected string $method = 'POST';
    protected string $endpoint = '/user/customer/security/logout';

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
