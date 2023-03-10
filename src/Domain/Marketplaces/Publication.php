<?php

namespace BeezupSDK\Domain\Marketplaces;

use BeezupSDK\Core\Domain\BaseObject;
use BeezupSDK\Domain\Marketplaces\Collection\FeedCollection;

/**
 * @method  string  getPublicationType()
 * @method  FeedCollection  getFeeds()
 */
class Publication extends BaseObject
{
    protected static array $dataTypes = [
        'feeds' => [FeedCollection::class, 'create'],
    ];
}
