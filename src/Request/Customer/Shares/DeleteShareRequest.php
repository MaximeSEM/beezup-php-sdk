<?php

namespace BeezupSDK\Request\Customer\Shares;

use BeezupSDK\Core\Request\AbstractStoreRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;

/**
 * @method  string  getUserId()
 * @method  $this  setUserId(string $userId)
 * */
class DeleteShareRequest extends AbstractStoreRequest
{
    protected string $method = 'POST';
    protected string $endpoint = '/user/customer/stores/{storeId}/shares/{userId}';
    public array $uriVars = [
        'userId'
    ];

    public function __construct(string $storeId,string $userId)
    {
        parent::__construct($storeId);
        $this->setUserId($userId);
    }

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
