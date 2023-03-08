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
 * @method  array  getSectors()
 * @method  $this  setSectors(array $sectors)
 */
class PatchStoreRequest extends AbstractRequest
{
    use IdTrait;

    public array $bodyParams = [
        'name',
        'url',
        'sectors'
    ];
    protected string $method = 'PATCH';
    protected string $endpoint = '/user/customer/stores/{id}';

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
