<?php

namespace BeezupSDK\Domain\Common;

use BeezupSDK\Core\Domain\BaseObject;
use BeezupSDK\Request\Lov\GetLovRequest;

/**
 * @method  string  getHref()
 * @method  string  getMethod()
 */
class LovLink extends BaseObject
{
    public function getListRequest(): GetLovRequest
    {
        return new GetLovRequest(null, $this->getHref());
    }
}
