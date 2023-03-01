<?php

namespace BeezupSDK\Domain\Common;

use BeezupSDK\Core\Domain\BaseObject;

/**
 * @method  string  getCodeIdentifier()
 * @method  string  getTranslationText()
 * @method  int  getIdentifier()
 * @method  int  getPosition()
 */
class Lov extends BaseObject
{
    protected static array $mapping = [
        'intIdentifier' => 'identifier'
    ];

    protected static array $dataTypes = [
        'identifier' => 'intval'
    ];
}