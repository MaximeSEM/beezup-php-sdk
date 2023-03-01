<?php

namespace BeezupSDK\Domain\ChannelCatalogs\Common;

use BeezupSDK\Core\Domain\BaseObject;

/**
 * @method  string  getExportedProductCount()
 * @method  string  getColumnMappingStatus()
 * @method  string  getApiSettingsStatus()
 * @method  CategoryMappingState  getCategoryMappingState()
 */
class State extends BaseObject
{
    protected static array $dataTypes = [
        'categoryMappingState' => [CategoryMappingState::class, 'create'],
    ];
}
