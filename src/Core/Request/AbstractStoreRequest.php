<?php

namespace BeezupSDK\Core\Request;

/**
 *
 * @method  string  getStoreId()
 * @method $this setStoreId(string $storeId)
 */
abstract class AbstractStoreRequest extends AbstractRequest
{
    public function __construct(string $storeId)
    {
        if (!isset($this->uriVars['storeId'])) {
            $this->uriVars['storeId'] = 'storeId';
        }
        parent::__construct();
        $this->setStoreId($storeId);
    }
}
