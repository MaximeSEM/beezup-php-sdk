<?php

namespace BeezupSDK\Domain\Customer\Rights;

use BeezupSDK\Core\Domain\BaseObject;
use BeezupSDK\Domain\Customer\Alerts\Collection\PropertyCollection;

/**
 * @method  string  getFunctionalityCode()
 * @method  int  getVaxValueInteger()
 * @method  boolean  isUnlimited()
 */
class Right extends BaseObject
{
    protected static array $dataTypes = [
        'maxValueInteger' => 'intval'
    ];
}
