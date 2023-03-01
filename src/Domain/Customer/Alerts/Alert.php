<?php

namespace BeezupSDK\Domain\Customer\Alerts;

use BeezupSDK\Core\Domain\BaseObject;
use BeezupSDK\Domain\Customer\Alerts\Collection\PropertyCollection;

/**
 * @method  string  getAlertId()
 * @method  $this setAlertId(string $alertId)
 * @method  string  getAlertName()
 * @method  $this  setAlertName(string $alertName)
 * @method  boolean  isActive()
 * @method  $this  setActive(boolean $active)
 * @method  PropertyCollection getProperties()
 * @method  $this setProperties(PropertyCollection $properties)
 *
 */
class Alert extends BaseObject
{
    protected static array $mapping = [
        'isActive' => 'active'
    ];
    protected static array $dataTypes = [
        'properties' => [PropertyCollection::class,'create']
    ];
}
