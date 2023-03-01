<?php

namespace BeezupSDK\Request\PublicChannels;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Request\EtagTrait;
use BeezupSDK\Core\Response\Decorator\BaseCollection;
use BeezupSDK\Domain\PublicChannels\Collection\PublicChannelCollection;

/**
 * @method string getCountryIsoCode()
 * @method $this setCountryIsoCode(string $countryIsoCode)
 */
class GetPublicChannelsByCountry extends AbstractRequest
{
    use EtagTrait;

    protected string $endpoint = '/channels/{countryIsoCode}';
    protected array $uriVars = ['countryIsoCode'];

    public function __construct($countryIsoCode)
    {
        parent::__construct();
        $this->setCountryIsoCode($countryIsoCode);
    }

    public function getResponseDecorator(): BaseCollection|PublicChannelCollection
    {
        return PublicChannelCollection::decorator('channels');
    }
}
