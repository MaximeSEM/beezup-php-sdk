<?php

namespace BeezupSDK\Core\Request;

/**
 * @method  string getMarketplaceTechnicalCode()
 * @method  $this setMarketplaceTechnicalCode(string $marketplaceTechnicalCode)
 * @method  string getAccountId()
 * @method  $this setAccountId(string $accountId)
 * @method  string getBeezUPOrderId()
 * @method  $this setBeezUPOrderId(string $beezUPOrderId)
 */
abstract class AbstractOrderRequest extends AbstractRequest
{

    public function __construct(string $marketplaceTechnicalCode, string $accountId, string $beezUPOrderId, $data = [])
    {
        if (!isset($this->uriVars['storeId'])) {
            $this->uriVars['marketplaceTechnicalCode'] = 'marketplaceTechnicalCode';
        }
        if (!isset($this->uriVars['accountId'])) {
            $this->uriVars['accountId'] = 'accountId';
        }
        if (!isset($this->uriVars['beezUPOrderId'])) {
            $this->uriVars['beezUPOrderId'] = 'beezUPOrderId';
        }
        parent::__construct($data);
        $this->setMarketplaceTechnicalCode($marketplaceTechnicalCode);
        $this->setAccountId($accountId);
        $this->setBeezUPOrderId($beezUPOrderId);
    }
}
