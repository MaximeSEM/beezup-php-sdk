<?php

namespace BeezupSDK\Domain\Customer\Alerts\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Customer\Alerts\Alert;

/**
 * @method  Alert   current()
 * @method  Alert   first()
 * @method  Alert   get($offset)
 * @method  Alert   offsetGet($offset)
 * @method  Alert   last()
 * @method  Alert[] getIterator()
 */
class AlertCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = Alert::class;
}
