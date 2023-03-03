<?php

namespace BeezupSDK\Request\Customer\Friends;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Customer\Friends\Friend;

/**
 * @method string getUserId()
 * @method $this setUserId(string $userId)
 */
class GetFriendsRequest extends AbstractRequest
{
    protected array $uriVars = ['userId'];
    protected string $endpoint = '/user/customer/friends/{userId}';

    public function __construct(string $userId)
    {
        parent::__construct();
        $this->setUserId($userId);
    }

    public function getResponseDecorator(): BaseObject|Friend
    {
        return Friend::decorator();
    }
}
