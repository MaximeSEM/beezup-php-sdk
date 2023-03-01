<?php

namespace BeezupSDK\Domain\ApiIndex;

use BeezupSDK\Core\Domain\BaseObject;
use BeezupSDK\Domain\ApiIndex\Collection\ValueCollection;
use BeezupSDK\Domain\ApiIndex\Common\Collection\LabelTranslationCollection;

/**
 * @method  string  getCode()
 * @method  string  getLabel()
 * @method  LabelTranslationCollection getLabelTranslations()
 * @method  ValueCollection  getValues()
 */
class ValuesList extends BaseObject
{
    protected static array $mapping = [
        'label_translations' => 'labelTranslations',
    ];
    protected static array $dataTypes = [
        'values' => [ValueCollection::class, 'create']
    ];
}
