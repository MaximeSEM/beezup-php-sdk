<?php

namespace BeezupSDK\Domain\Customer\Contracts\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Customer\Contracts\BillingPeriod;

/**
 * @method  BillingPeriod   current()
 * @method  BillingPeriod   first()
 * @method  BillingPeriod   get($offset)
 * @method  BillingPeriod   offsetGet($offset)
 * @method  BillingPeriod   last()
 * @method  BillingPeriod[] getIterator()
 */
class BillingPeriodCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = BillingPeriod::class;
}
