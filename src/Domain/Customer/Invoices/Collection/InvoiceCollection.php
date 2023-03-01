<?php

namespace BeezupSDK\Domain\Customer\Invoices\Collection;

use BeezupSDK\Core\Domain\Collection\BaseCollection;
use BeezupSDK\Domain\Customer\Invoices\Invoice;

/**
 * @method  Invoice   current()
 * @method  Invoice   first()
 * @method  Invoice   get($offset)
 * @method  Invoice   offsetGet($offset)
 * @method  Invoice   last()
 * @method  Invoice[] getIterator()
 */
class InvoiceCollection extends BaseCollection
{
    /**
     * @var string|null
     */
    protected ?string $itemClass = Invoice::class;
}
