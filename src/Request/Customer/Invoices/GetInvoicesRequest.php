<?php

namespace BeezupSDK\Request\Customer\Invoices;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseCollection;
use BeezupSDK\Domain\Customer\Invoices\Collection\InvoiceCollection;

class GetInvoicesRequest extends AbstractRequest
{
    protected string $endpoint = '/user/customer/invoices';

    public function getResponseDecorator(): BaseCollection|InvoiceCollection
    {
        return InvoiceCollection::decorator('invoices');
    }
}
