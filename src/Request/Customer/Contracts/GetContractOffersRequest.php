<?php

namespace BeezupSDK\Request\Customer\Contracts;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Request\EtagTrait;
use BeezupSDK\Core\Response\Decorator\BaseCollection;
use BeezupSDK\Domain\Customer\Contracts\Collection\OfferCollection;

class GetContractOffersRequest extends AbstractRequest
{
    use EtagTrait;

    protected string $endpoint = '/user/customer/offers';

    public function getResponseDecorator(): BaseCollection|OfferCollection
    {
        return OfferCollection::decorator('offers');
    }
}
