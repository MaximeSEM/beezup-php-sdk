<?php

namespace BeezupSDK\Domain\Common\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Common\Error;

/**
 * @method  Error   current()
 * @method  Error   first()
 * @method  Error   get($offset)
 * @method  Error   offsetGet($offset)
 * @method  Error   last()
 * @method  Error[] getIterator()
 */
class ErrorCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = Error::class;
}
