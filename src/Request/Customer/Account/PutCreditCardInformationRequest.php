<?php

namespace BeezupSDK\Request\Customer\Account;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;
use BeezupSDK\Domain\Customer\Account\CreditCardInfo;

/**
 * @method  string  getCardNumber()
 * @method  $this  setCardNumber(string $cardNumber)
 * @method  int  getExpirationMonth()
 * @method  $this  setExpirationMonth(int $expirationMonth)
 * @method  int  getExpirationYear()
 * @method  $this  setExpirationYear(int $expirationYear)
 * @method  string  getCardType()
 * @method  $this  setCardType()
 */
class PutCreditCardInformationRequest extends AbstractRequest
{
    protected string $method = 'PUT';
    protected string $endpoint = '/user/customer/account/creditCardInfo';

    public array $bodyParams = [
        'cardNumber',
        'expirationMonth',
        'expirationYear',
        'cardType'
    ];

    public function __construct(CreditCardInfo $creditCardInfo)
    {
        $data = $creditCardInfo->toArray();
        parent::__construct($data);
    }

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
