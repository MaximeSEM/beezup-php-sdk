<?php

namespace BeezupSDK\Request\ApiIndex;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\ApiIndex\ValuesList;

/**
 * @method string getMarketplace()
 * @method $this setMarketplace(string $marketPlaceCode)
 * @method string getAttribute()
 * @method $this setAttribute(string $marketPlaceCode)
 * @method string getAction()
 * @method $this setAction(string $action)
 */
class GetValuesListRequest extends AbstractRequest
{
    public array $queryParams = [
        'action'
    ];
    public array $bodyParams = [
        'marketplace',
        'attribute',
    ];
    protected string $method = 'POST';
    protected string $endpoint = '/APIIndex.php';
    protected string $version = '';

    public function __construct(string $marketplace, string $attribute)
    {
        parent::__construct();
        $this->setAction('getValuesListAsJson');
        $this->setMarketplace($marketplace);
        $this->setAttribute($attribute);
    }

    public function getResponseDecorator(): BaseObject|ValuesList
    {
        return ValuesList::decorator();
    }
}

