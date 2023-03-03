<?php

namespace BeezupSDK\Domain\Channels;

use BeezupSDK\Core\Domain\BaseObject;
use BeezupSDK\Domain\Common\FieldConfiguration;

/**
 * @method  string  getChannelColumnId()
 * @method  string  getChannelColumnName()
 * @method  string  getChannelColumnDescription()
 * @method  string  getShowInMapping()
 * @method  int  getPosition()
 * @method  FieldConfiguration  getConfiguration()
 * @method  array  getRestrictedValues()
 */
class Column extends BaseObject
{
    protected static array $dataTypes = [
        'position' => 'intval',
        'configuration' => [FieldConfiguration::class, 'create'],
    ];
}
