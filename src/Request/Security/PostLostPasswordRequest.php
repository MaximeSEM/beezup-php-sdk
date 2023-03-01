<?php

namespace BeezupSDK\Request\Security;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;

/**
 * @method string getEmail()
 * @method $this setEmail(string $email)
 */
class PostLostPasswordRequest extends AbstractRequest
{
    public array $bodyParams = [
        'email'
    ];
    protected string $method = 'POST';
    protected string $endpoint = '/public/security/lostpassword';

    public function __construct(string $email)
    {
        parent::__construct();
        $this->setEmail($email);
    }

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
