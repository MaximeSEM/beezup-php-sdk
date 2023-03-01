<?php

namespace BeezupSDK\Domain\Customer\Account;

use BeezupSDK\Core\Domain\BaseObject;

/**
 * @method  string  getLastName()
 * @method  $this  setLastName(string $lastName)
 * @method  string  getFirstName()
 * @method  $this  setFirstName(string $firstName)
 * @method  string  getPhoneNumber()
 * @method  $this  setPhoneNumber(string $phoneNumber)
 * @method  string  getWhatIDo()
 * @method  $this  setWhatIDo(string $whatIDo)
 * @method  int  getBeezUPTimeZoneId()
 * @method  int  setBeezUPTimeZoneId(int $beezUPTimeZoneId)
 */
class PersonalInfo extends BaseObject
{
    protected static array $dataTypes = [
        'beezUPTimeZoneId' => 'intval'
    ];
}
