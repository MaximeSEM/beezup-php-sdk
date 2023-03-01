<?php

namespace BeezupSDK\Request\Customer\Account;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Request\EtagTrait;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Customer\Account\CreditCardinfo;

class GetCreditCardInformationRequest extends AbstractRequest
{
    use EtagTrait;

    protected string $endpoint = '/user/customer/account/creditCardInfo';

    public function getResponseDecorator(): BaseObject|CreditCardinfo
    {
        return CreditCardinfo::decorator('creditCardInfo');
    }
}
