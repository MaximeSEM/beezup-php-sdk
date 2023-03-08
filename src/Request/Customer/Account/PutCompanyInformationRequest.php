<?php

namespace BeezupSDK\Request\Customer\Account;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;
use BeezupSDK\Domain\Customer\Account\CompanyInfo;

/**
 * @method  string  getAddress()
 * @method  $this   setAddress(string $address)
 * @method  string  getPostalCode()
 * @method  $this   setPostalCode(string $postalCode)
 * @method  string  getCity()
 * @method  $this   setCity(string $city)
 * @method  string  getCountryIsoCodeAlpha3()
 * @method  $this   setCountryIsoCodeAlpha3(string $countryIsoCodeAlpha3)
 * @method  string  getCompany()
 * @method  $this   setCompany(string $company)
 * @method  string  getVatNumber()
 * @method  $this   setVatNumber(string $vatNumber)
 * @method  array  getAccountingEmails()
 * @method  $this   setAccountingEmails(array $accountingEmails)
 */
class PutCompanyInformationRequest extends AbstractRequest
{
    public array $bodyParams = [
        'address',
        'postalCode',
        'city',
        'countryIsoCodeAlpha3',
        'company',
        'vatNumber',
        'accountingEmails',
    ];
    protected string $method = 'PUT';
    protected string $endpoint = '/user/customer/account/companyInfo';

    public function __construct(CompanyInfo $companyInfo)
    {
        $data = $companyInfo->toArray();
        parent::__construct($data);
    }

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
