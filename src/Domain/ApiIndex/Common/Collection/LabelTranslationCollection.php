<?php

namespace BeezupSDK\Domain\ApiIndex\Common\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\ApiIndex\Common\LabelTranslation;

/**
 * @method  LabelTranslation   current()
 * @method  LabelTranslation   first()
 * @method  LabelTranslation   get($offset)
 * @method  LabelTranslation   offsetGet($offset)
 * @method  LabelTranslation   last()
 * @method  LabelTranslation[] getIterator()
 */
class LabelTranslationCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = LabelTranslation::class;
}
