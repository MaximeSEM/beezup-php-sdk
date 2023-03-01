<?php

namespace BeezupSDK\Domain\Customer\Stores;

use BeezupSDK\Core\Domain\BaseObject;
use DateTime;

/**
 * @method  string  getStoreId()
 * @method  $this setStoreId(string $storeId)
 * @method  string  getName()
 * @method  $this  setName(string $name)
 * @method  string  getUrl()
 * @method  $this setUrl(string $url)
 * @method  string  getCountryIsoCodeAlpha3()
 * @method  $this  setCountryIsoCodeAlpha3(string $countryIsoCodeAlpha3)
 * @method  string  getCurrencyCode()
 * @method  $this  setCurrencyCode(string $currencyCode)
 * @method  array   getSectors()
 * @method  $this  setSectors(array $sectors)
 * @method  string  getUserRole()
 * @method  string  getStatus()
 * @method  string  getOwnerUserId()
 * @method  int  getOfferId()
 * @method  string  getOfferName()
 * @method  int  getShareCount()
 * @method  DateTime  getCreationUtcDate()
 * @method  string  getGoVersion()
 * @method  boolean  isTest()
 */
class Store extends BaseObject
{
    protected static array $dataTypes = [
        'offerId' => 'intval',
        'shareCount' => 'intval',
        'creationUtcDate' => DateTime::class,
    ];

    protected static array $mapping = [
        'isTest' => 'test',
    ];
}
