<?php

namespace BeezupSDK\Request\Customer\Friends;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseCollection;
use BeezupSDK\Domain\Customer\Friends\Collection\FriendCollection;
use BeezupSDK\Domain\Customer\Rights\Collection\RightCollection;

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

    public function getResponseDecorator(): BaseCollection|RightCollection
    {
        return FriendCollection::decorator(null, 'userId');
    }
}
