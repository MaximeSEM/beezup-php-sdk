<?php

namespace BeezupSDK\Domain\Channels;

use BeezupSDK\Core\Domain\BaseObject;
use BeezupSDK\Domain\Common\Configuration;

/**
 * @method  string  getChannelColumnId()
 * @method  string  getChannelColumnName()
 * @method  string  getChannelColumnDescription()
 * @method  string  getShowInMapping()
 * @method  int  getPosition()
 * @method  Configuration  getConfiguration()
 * @method  array  getRestrictedValues()
 */
class Column extends BaseObject
{
    protected static array $dataTypes = [
        'position' => 'intval',
        'configuration' => [Configuration::class, 'create'],
    ];
}
