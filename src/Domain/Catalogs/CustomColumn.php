<?php

namespace BeezupSDK\Domain\Catalogs;

use BeezupSDK\Core\Domain\BaseObject;
use BeezupSDK\Domain\Common\FieldConfiguration;

/**
 * @method  string  getId()
 * @method  string  getUserColumName()
 * @method  FieldConfiguration  getConfiguration()
 * @method  array  getCatalogColumnDependencies()
 */
class CustomColumn extends BaseObject
{
    protected static array $dataTypes = [
        'configuration' => [FieldConfiguration::class, 'create']
    ];
}
