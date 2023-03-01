<?php

namespace BeezupSDK\Domain\ApiIndex;

use BeezupSDK\Core\Domain\BaseObject;
use BeezupSDK\Domain\ApiIndex\Common\Collection\LabelTranslationCollection;

/**
 * @method  int  getId()
 * @method  string  getCode()
 * @method  string  getLabel()
 * @method  LabelTranslationCollection getLabelTranslations()
 */
class Value extends BaseObject
{
    protected static array $mapping = [
        'label_translations' => 'labelTranslations'
    ];
}
