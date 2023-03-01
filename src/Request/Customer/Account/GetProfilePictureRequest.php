<?php

namespace BeezupSDK\Request\Customer\Account;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Request\EtagTrait;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Customer\Account\Account;
use BeezupSDK\Domain\Customer\Account\ProfilePicture;

class GetProfilePictureRequest extends AbstractRequest
{
    use EtagTrait;

    protected string $endpoint = '/user/customer/account/profilePictureInfo';

    public function getResponseDecorator(): BaseObject|Account
    {
        return ProfilePicture::decorator();
    }
}
