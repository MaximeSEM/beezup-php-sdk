<?php

namespace BeezupSDK\Domain\Customer\Shares\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Customer\Shares\Share;

/**
 * @method  Share   current()
 * @method  Share   first()
 * @method  Share   get($offset)
 * @method  Share   offsetGet($offset)
 * @method  Share   last()
 * @method  Share[] getIterator()
 */
class ShareCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = Share::class;
}
