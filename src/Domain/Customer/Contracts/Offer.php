<?php

namespace BeezupSDK\Domain\Customer\Contracts;

use BeezupSDK\Core\Domain\BaseObject;
use BeezupSDK\Domain\Customer\Contracts\Collection\OfferFunctionalityCollection;

/**
 * @method  float  getAdditionalClickPrice()
 * @method  int  getIncludedClick()
 * @method  boolean  isMostPopular()
 * @method  string  getName()
 * @method  string  getOfferId()
 * @method  string  getFixedPrice()
 * @method  string  getCurrencyCode()
 * @method  int  getPosition()
 * @method  OfferFunctionalityCollection  getFunctionalities()
 */
class Offer extends BaseObject
{
    protected static array $dataTypes = [
        'additionalClickPrice' => 'floatval',
        'includedClick' => 'intval',
        'fixedPrice' => 'intval',
        'position' => 'intval',
        'functionalities' => [OfferFunctionalityCollection::class, 'create'],
    ];
    protected static array $mapping = [
        'isMostPopular' => 'mostPopular'
    ];
}