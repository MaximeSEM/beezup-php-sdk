<?php

namespace BeezupSDK\Request\Customer\Contracts;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Request\EtagTrait;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Customer\Contracts\ContractList;

class GetContractListRequest extends AbstractRequest
{
    use EtagTrait;

    protected string $endpoint = '/user/customer/contracts';

    public function getResponseDecorator(): BaseObject|ContractList
    {
        return ContractList::decorator();
    }
}
