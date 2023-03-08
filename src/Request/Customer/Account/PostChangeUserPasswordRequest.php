<?php

namespace BeezupSDK\Request\Customer\Account;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;

/**
 * @method  string  getOldPassword()
 * @method  $this   setOldPassword(string $oldPassword)
 * @method  string  getNewPassword()
 * @method  $this   setNewPassword(string $newPassword)
 */
class PostChangeUserPasswordRequest extends AbstractRequest
{
    public array $bodyParams = [
        'oldPassword',
        'newPassword'
    ];
    protected string $method = 'POST';
    protected string $endpoint = '/user/customer/account/changePassword';

    public function __construct(string $oldPassword, string $newPassword)
    {
        parent::__construct();
        $this->setOldPassword($oldPassword);
        $this->setNewPassword($newPassword);
    }

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
