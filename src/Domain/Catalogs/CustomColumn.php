<?php

namespace BeezupSDK\Domain\Catalogs;

use BeezupSDK\Core\Domain\BaseObject;
use BeezupSDK\Domain\Common\Configuration;

/**
 * @method  string  getId()
 * @method  string  getUserColumName()
 * @method  Configuration  getConfiguration()
 * @method  array  getCatalogColumnDependencies()
 */
class CustomColumn extends BaseObject
{
    protected static array $dataTypes = [
        'configuration' => [Configuration::class, 'create']
    ];
}
