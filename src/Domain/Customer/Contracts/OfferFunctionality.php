<?php

namespace BeezupSDK\Domain\Customer\Contracts;

use BeezupSDK\Core\Domain\BaseObject;

/**
 * @method  string  getFunctionalityCode()
 * @method  int  getMaxValueInteger()
 * @method  boolean  isUnlimited()
 * @method  string  getText()
 */
class OfferFunctionality extends BaseObject
{
    protected static array $dataTypes = [
        'maxValueInteger' => 'intval',
    ];
}