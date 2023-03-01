<?php

namespace BeezupSDK\Request\Customer\Stores;

use BeezupSDK\Core\Domain\IdTrait;
use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;
use BeezupSDK\Domain\Customer\Stores\Store;

/**
 * @method  string  getName()
 * @method  $this  setName(string $name)
 * @method  string  getUrl()
 * @method  $this setUrl(string $url)
 * @method  string  getCountryIsoCodeAlpha3()
 * @method  $this  setCountryIsoCodeAlpha3(string $countryIsoCodeAlpha3)
 * @method  string  getCurrencyCode()
 * @method  $this  setCurrencyCode(string $currencyCode)
 * @method  array  getSectors()
 * @method  $this  setSectors(array $sectors)
 */
class PostStoreRequest extends AbstractRequest
{
    use IdTrait;

    protected string $method = 'POST';
    protected string $endpoint = '/user/customer/stores';
    public array $bodyParams = [
        'id',
        'name',
        'url',
        'countryIsoCodeAlpha3',
        'sectors'
    ];
    protected static array $mapping = [
        'storeId' => 'id'
    ];

    public function __construct(Store $store)
    {
        $data = $store->toArray();
        parent::__construct($data);
    }

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
