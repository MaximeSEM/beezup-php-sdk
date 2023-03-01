<?php

namespace BeezupSDK\Request\Customer\Stores;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Request\EtagTrait;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;

/**
 * @method  string  getStoreId()
 * @method  $this  setStoreId(string $storeId)
 */
class DeleteStoreRequest extends AbstractRequest
{
    use EtagTrait;

    protected string $method = 'DELETE';
    protected string $endpoint = '/user/customer/stores';

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
