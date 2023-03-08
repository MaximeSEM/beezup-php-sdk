<?php

namespace BeezupSDK\Request\Subscriptions;

use BeezupSDK\Core\Domain\IdTrait;
use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;

/**
 * @method  string getTargetUrl()
 * @method  $this setTargetUrl(string $targetUrl)
 * @method  string getName()
 * @method  $this setName(string $name)
 * @method  string getMerchantApplicationName()
 * @method  $this setMerchantApplicationName(string $merchantApplicationName)
 * @method  string getMerchantApplicationVersion()
 * @method  $this setMerchantApplicationVersion(string $merchantApplicationName)
 * @method  string getMerchantEmailAlert()
 * @method  $this setMerchantEmailAlert(string $merchantEmailAlert)
 */
class PostSubscriptionsRequest extends AbstractRequest
{
    use IdTrait;

    public array $bodyParams = [
        'targetUrl',
        'name',
        'merchantApplicationName',
        'merchantApplicationVersion',
        'merchantEmailAlert'
    ];
    protected string $method = 'POST';
    protected string $endpoint = '/user/marketplaces/orders/subscriptions/{id}';
    protected array $uriVars = [
        'id'
    ];

    /**
     * @param string $id can be empty a random id will be generated
     * @param string $targetUrl
     * @param string $name
     * @param string $merchantApplicationName
     * @param string $merchantApplicationVersion
     * @param string|null $merchantEmailAlert
     */
    public function __construct(string $id, string $targetUrl, string $name, string $merchantApplicationName, string $merchantApplicationVersion, ?string $merchantEmailAlert = null)
    {
        parent::__construct();
        $this->setId($id);
        $this->setTargetUrl($targetUrl);
        $this->setName($name);
        $this->setMerchantApplicationName($merchantApplicationName);
        $this->setMerchantApplicationVersion($merchantApplicationVersion);
        $this->setMerchantEmailAlert($merchantEmailAlert);
    }

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
