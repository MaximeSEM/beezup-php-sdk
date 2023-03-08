<?php

namespace BeezupSDK\Request\Customer\Account;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;
use BeezupSDK\Domain\Customer\Account\PersonalInfo;

/**
 * @method  string  getLastName()
 * @method  $this  setLastName(string $lastName)
 * @method  string  getFirstname()
 * @method  $this  setFirstname(string $firstName)
 * @method  string  getPhoneNumber()
 * @method  $this  setPhoneNumber(string $phoneNumber)
 * @method  string  getWhatIDo()
 * @method  $this  setWhatIDo(string $whatIDo)
 * @method  int  getBeezUPTimeZoneId()
 * @method  $this  gstBeezUPTimeZoneId(int $beezUPTimeZoneId)
 */
class PutPersonalInformationRequest extends AbstractRequest
{
    public array $bodyParams = [
        'lastName',
        'firstName',
        'phoneNumber',
        'whatIDo',
        'beezUPTimeZoneId'
    ];
    protected string $method = 'PUT';
    protected string $endpoint = '/user/customer/account/personalInfo';

    public function __construct(PersonalInfo $personalInfo)
    {
        $data = $personalInfo->toArray();
        parent::__construct($data);
    }

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
