<?php

namespace BeezupSDK\Request\Customer\Account;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;

/**
 * @method string getActivationCode()
 * @method $this setActivationCode(string $activationCode)
 */
class PostActivateAccountRequest extends AbstractRequest
{
    public array $bodyParams = ['activationCode'];
    protected string $method = 'POST';
    protected string $endpoint = '/user/customer/account/activate';

    public function __construct(string $activationCode)
    {
        parent::__construct();
        $this->setActivationCode($activationCode);
    }

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
