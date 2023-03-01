<?php

namespace BeezupSDK\Domain\Catalogs;

use BeezupSDK\Core\Domain\BaseObject;
use BeezupSDK\Domain\Catalogs\Common\DuplicateProductValueConfiguration;
use BeezupSDK\Domain\Common\Configuration;

/**
 * @method  boolean  isIgnored()
 * @method  DuplicateProductValueConfiguration  getDuplicateProductValueConfiguration()
 * @method  string  getId()
 * @method  string  getCatalogColumnName()
 * @method  string  getUserColumName()
 * @method  Configuration  getConfiguration()
 */
class CatalogColumn extends BaseObject
{
    protected static array $dataTypes = [
        'duplicateProductValueConfiguration' => [DuplicateProductValueConfiguration::class, 'create'],
        'configuration' => [Configuration::class, 'create'],
    ];
}
