<?php

namespace BeezupSDK\Request\Marketplaces;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseCollection;
use BeezupSDK\Domain\Marketplaces\Collection\PublicationCollection;

/**
 * @method string getMarketplaceTechnicalCode()
 * @method $this setMarketplaceTechnicalCode(string $marketplaceTechnicalCode)
 * @method string getAccountId()
 * @method $this setAccountId(string $accountId)
 * @method string getChannelCatalogId()
 * @method $this setChannelCatalogId(string $channelCatalogId)
 * @method int getCount()
 * @method $this setCount(int $count)
 * @method string getPublicationTypes()
 * @method $this setPublicationTypes(string $publicationTypes)
 */
class GetMarketplacePublicationsRequest extends AbstractRequest
{
    protected static array $allowedValues = [
        'count' => [10, 20, 30, 40, 50, 60, 70, 80, 90, 100],
        'publicationTypes' => ['PublishProducts', 'PublishOffers', 'PublishRelationshipsEnum', 'PublishProductImagesEnum', 'PublishInventoryEnum', 'PublishPricingEnum']
    ];
    public array $queryParams = ['channelCatalogId', 'count', 'publicationTypes'];
    public array $boolOrAllParams = ['publicationTypes'];
    protected string $endpoint = '/user/marketplaces/channelcatalogs/publications/{marketplaceTechnicalCode}/{accountId}/history';
    protected array $uriVars = ['marketplaceTechnicalCode', 'accountId'];

    public function __construct(string $marketplaceTechnicalCode, string $accountId, ?string $channelCatalogId = null, ?int $count = 10, ?string $publicationTypes = null)
    {
        parent::__construct();
        $this->setMarketplaceTechnicalCode($marketplaceTechnicalCode);
        $this->setAccountId($accountId);
        if (isset($channelCatalogId)) {
            $this->setChannelCatalogId($channelCatalogId);
        }
        if (isset($count)) {
            $this->setCount($count);
        }
        if (isset($publicationTypes)) {
            $this->setPublicationTypes($publicationTypes);
        }
    }

    public function getResponseDecorator(): BaseCollection|PublicationCollection
    {
        return PublicationCollection::decorator('publications');
    }
}
