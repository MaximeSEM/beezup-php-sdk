<?php

namespace BeezupSDK\Request\Catalogs;

use BeezupSDK\Core\Request\AbstractStoreRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;

/**
 * @method string getInterval()
 * @method $this setInterval(string $interval)
 */
class PostCatalogAutoImportConfigureIntervalRequest extends AbstractStoreRequest
{
    public array $bodyParams = [
        'interval'
    ];
    protected string $method = 'POST';
    protected string $endpoint = '/user/catalogs/{storeId}/autoImport/scheduling/interval';

    public function __construct(string $storeId, string $interval)
    {
        parent::__construct($storeId);
        $this->setInterval($interval);
    }

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}

