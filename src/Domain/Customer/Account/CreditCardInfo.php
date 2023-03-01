<?php

namespace BeezupSDK\Domain\Customer\Account;

use BeezupSDK\Core\Domain\BaseObject;

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
class CreditCardInfo extends BaseObject
{
    protected static array $mapping = [
        'expirationMonth' => 'intval',
        'expirationYear' => 'intval'
    ];
}
