<?php

namespace BeezupSDK\Request\Customer\Account;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;

/**
 * @method  string  getNewEmail()
 * @method  $this   setNewEmail(string $newEmail)
 */
class PostChangeUserEmailRequest extends AbstractRequest
{
    protected string $method = 'POST';
    protected string $endpoint = '/user/customer/account/changeEmail';
    public array $bodyParams = [
        'newEmail'
    ];

    public function __construct(string $newEmail)
    {
        parent::__construct();
        $this->setNewEmail($newEmail);
    }

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
