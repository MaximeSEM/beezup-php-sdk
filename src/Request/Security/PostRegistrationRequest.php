<?php

namespace BeezupSDK\Request\Security;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Core\Utility\Functions;
use BeezupSDK\Domain\Common\EmptyAnswer;

/**
 * @method string getEmail()
 * @method $this setEmail(string $email)
 * @method string getPassword()
 * @method $this setPassword(string $password)
 * @method string getCultureName()
 * @method $this setCultureName(string $cultureName)
 * @method string getCommercialOwnerUserId()
 * @method $this setCommercialOwnerUserId(string $commercialOwnerUserId)
 */
class PostRegistrationRequest extends AbstractRequest
{
    public array $bodyParams = [
        'email',
        'password',
        'cultureName',
        'commercialOwnerUserId',
    ];
    protected string $method = 'POST';
    protected string $endpoint = '/public/security/register';

    public function __construct(string $email, string $password, ?string $cultureName, ?string $commercialOwnerUserId)
    {
        parent::__construct();
        $this->setEmail($email);
        $this->setPassword($password);
        if (is_null($cultureName)) {
            $cultureName = Functions::getUserLanguage();
        }
        $this->setCultureName($cultureName);
        $this->setCommercialOwnerUserId($commercialOwnerUserId);
    }

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
