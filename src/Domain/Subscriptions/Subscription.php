<?php

namespace BeezupSDK\Domain\Subscriptions;

use BeezupSDK\Core\Domain\BaseObject;

/**
 * @method  string  getId()
 * @method  string  getStatus()
 * @method  string  getTargetUrl()
 * @method  string  getName()
 * @method  string  getMerchantApplicationName()
 * @method  string  getMerchantApplicationVersion()
 * @method  string  getConsumerHealthStatus()
 * @method  string  getMerchantEmailAlert()
 */
class Subscription extends BaseObject
{
    protected static array $mapping = ['lastErrorMessage/errors' => 'errors'];

}
