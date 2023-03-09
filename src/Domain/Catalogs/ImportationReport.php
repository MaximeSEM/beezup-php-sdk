<?php

namespace BeezupSDK\Domain\Catalogs;

use BeezupSDK\Core\Domain\BaseObject;
use BeezupSDK\Domain\Common\Collection\ErrorCollection;

/**
 * @method  string  getExecutionId()
 * @method  ImportationReportInfo  getImportationInfo()
 * @method  ImportationReportCount  getColums()
 * @method  ImportationReportCount  getCategories()
 * @method  ImportationReportCount  getProducts()
 * @method  ImportationReportMetrics  getProductMetrics()
 * @method  ErrorCollection  getErrors()
 */
class ImportationReport extends BaseObject
{
    protected static array $dataTypes = [
        'importationInfo' => [ImportationReportInfo::class, 'create'],
        'columns' => [ImportationReportCount::class, 'create'],
        'categories' => [ImportationReportCount::class, 'create'],
        'products' => [ImportationReportCount::class, 'create'],
        'productMetrics' => [ImportationReportMetrics::class, 'create'],
        'errors' => [ErrorCollection::class, 'create']
    ];
}
