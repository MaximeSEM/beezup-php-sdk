<?php

namespace BeezupSDK\Request\Customer\Security;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Customer\Account\Account;
use BeezupSDK\Domain\Customer\Security\ZendeskToken;

class GetZendeskTokenRequest extends AbstractRequest
{
    protected string $endpoint = '/user/customer/zendeskToken';

    public function getResponseDecorator(): BaseObject|Account
    {
        return ZendeskToken::decorator();
    }
}
