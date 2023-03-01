<?php

namespace BeezupSDK\Request\Customer\Account;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Request\EtagTrait;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Customer\Account\Account;

class GetAccountInformationRequest extends AbstractRequest
{
    use EtagTrait;

    protected string $endpoint = '/user/customer/account';

    public function getResponseDecorator(): BaseObject|Account
    {
        return Account::decorator();
    }
}
