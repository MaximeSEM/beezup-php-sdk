<?php

namespace BeezupSDK\Request\Security;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;

/**
 * @method string getLogin()
 * @method $this setLogin(string $login)
 * @method string getPassword()
 * @method $this setPassword(string $password)
 */
class PostLoginRequest extends AbstractRequest
{
    public array $bodyParams = [
        'login',
        'password',
    ];
    protected string $method = 'POST';
    protected string $endpoint = '/public/security/login';

    public function __construct(string $login, string $password)
    {
        parent::__construct();
        $this->setLogin($login);
        $this->setPassword($password);
    }

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
