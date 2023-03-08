<?php

namespace BeezupSDK\Request\Customer\Account;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;

/**
 * @method  string  getProfilePictureSelected()
 * @method  $this   setProfilePictureSelected(string $profilePictureSelected)
 * @method  string  getProfilePictureUrl()
 * @method  $this   setProfilePictureUrl(string $profilePictureUrl)
 */
class PutProfilePictureRequest extends AbstractRequest
{
    protected static array $allowedValues = [
        'profilePictureUrl' => ["gravatar", "initials", "uploaded"]
    ];
    public array $bodyParams = [
        'profilePictureSelected',
        'profilePictureUrl',
    ];
    protected string $method = 'PUT';
    protected string $endpoint = '/user/customer/account/profilePictureInfo';

    public function __construct(string $profilePictureSelected, ?string $profilePictureUrl)
    {
        parent::__construct();
        $this->setProfilePictureSelected($profilePictureSelected);
        $this->setProfilePictureUrl($profilePictureUrl);
    }

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
