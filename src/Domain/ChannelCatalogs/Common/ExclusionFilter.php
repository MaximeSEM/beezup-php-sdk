<?php

namespace BeezupSDK\Domain\ChannelCatalogs\Common;

use BeezupSDK\Core\Domain\BaseObject;

/**
 * @method  string  getName()
 * @method  int  getPosition()
 * @method  string  getGroupId()
 * @method  string  getPositionInGroup()
 * @method  string  getChannelColumnId()
 * @method  string  getOperatorName()
 * @method  string  getValue()
 * @method  boolean  isEnabled()
 */
class ExclusionFilter extends BaseObject
{
    protected static array $dataTypes = [
        'position' => 'intval',
        'positionInGroup' => 'intval',
    ];
}
