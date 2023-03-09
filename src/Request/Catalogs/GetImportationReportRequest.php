<?php

namespace BeezupSDK\Request\Catalogs;

use BeezupSDK\Core\Request\AbstractStoreRequest;

use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Catalogs\ImportationReport;

/**
 * @method string getExecutionId()
 * @method $this setExecutionId(string $executionId)
 */
class GetImportationReportRequest extends AbstractStoreRequest
{
    protected array $uriVars = [
        'executionId'
    ];
    protected string $endpoint = '/user/catalogs/{storeId}/importations/{executionId}/report';

    public function __construct(string $storeId, string $executionId)
    {
        parent::__construct($storeId);
        $this->setExecutionId($executionId);
    }

    public function getResponseDecorator(): BaseObject|ImportationReport
    {
        return ImportationReport::decorator();
    }
}

