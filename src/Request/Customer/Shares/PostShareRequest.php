<?php

namespace BeezupSDK\Request\Customer\Shares;

use BeezupSDK\Core\Request\AbstractStoreRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;

/**
 * @method  string  getEmail()
 * @method  $this  setEmail(string $email)
 * */
class PostShareRequest extends AbstractStoreRequest
{
    protected string $method = 'POST';
    protected string $endpoint = '/user/customer/stores/{storeId}/shares';
    public array $bodyParams = [
        'email',
    ];
    protected ?string $dataRoot = 'email';
    protected bool $json = false;

    public function __construct(string $storeId, string $email)
    {
        parent::__construct($storeId);
        $this->setEmail($email);
    }

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
