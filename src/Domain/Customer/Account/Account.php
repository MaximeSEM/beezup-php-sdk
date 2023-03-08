<?php

namespace BeezupSDK\Domain\Customer\Account;

use BeezupSDK\Core\Domain\BaseObject;

/**
 * @method  string  getUserId()
 * @method  string  getEmail()
 * @method  string  getCommercialOwnerEmail()
 * @method  PersonalInfo  getPersonalInfo()
 * @method  string  getStatus()
 * @method  CompanyInfo  getCompanyInfo()
 * @method  string  getProfilePictureUrl()
 * @method  array  getLinks()
 * @method  array  getInfo()
 */
class Account extends BaseObject
{
    protected static array $dataTypes = [
        'personalInfo' => [PersonalInfo::class, 'create'],
        'companyInfo' => [CompanyInfo::class, 'create'],
    ];
}
