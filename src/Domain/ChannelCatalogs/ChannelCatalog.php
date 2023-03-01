<?php

namespace BeezupSDK\Domain\ChannelCatalogs;

use BeezupSDK\Core\Domain\BaseObject;
use BeezupSDK\Domain\ChannelCatalogs\Common\CategoryMappingSettings;
use BeezupSDK\Domain\ChannelCatalogs\Common\ChannelCategorySettings;
use BeezupSDK\Domain\ChannelCatalogs\Common\ChannelCostSettings;
use BeezupSDK\Domain\ChannelCatalogs\Common\Collection\ColumnMappingCollection;
use BeezupSDK\Domain\ChannelCatalogs\Common\Collection\ExclusionFilterCollection;
use BeezupSDK\Domain\ChannelCatalogs\Common\CostSettings;
use BeezupSDK\Domain\ChannelCatalogs\Common\GeneralSettings;
use BeezupSDK\Domain\ChannelCatalogs\Common\State;

/**
 * @method  string  getChannelId()
 * @method  string  getChannelName()
 * @method  string  getChannelImageUrl()
 * @method  boolean  isEnabled()
 * @method  boolean  isMarketplace()
 * @method  string  getChannelCatalogId()
 * @method  string  getStoreId()
 * @method  string  getExportUrl()
 * @method  array  getTypes()
 * @method  GeneralSettings  getGeneralSettings()
 * @method  ChannelCostSettings  getChannelCostSettings()
 * @method  ChannelCategorySettings  getChannelCategorySettings()
 * @method  CostSettings  getCostSettings()
 * @method  CategoryMappingSettings  getCategoryMappingSettings()
 * @method  ColumnMappingCollection  getColumnMappings()
 * @method  ExclusionFilterCollection  getExclusionFilters()
 * @method  State  getState()
 */
class ChannelCatalog extends BaseObject
{
    protected static array $dataTypes = [
        'generalSettings' => [GeneralSettings::class, 'create'],
        'channelCostSettings' => [ChannelCostSettings::class, 'create'],
        'channelCategorySettings' => [ChannelCategorySettings::class, 'create'],
        'costSettings' => [CostSettings::class, 'create'],
        'categoryMappingSettings' => [CategoryMappingSettings::class, 'create'],
        'columnMappings' => [ColumnMappingCollection::class, 'create'],
        'exclusionFilters' => [ExclusionFilterCollection::class, 'create'],
        'state' => [State::class, 'create'],
    ];

}
