<?php

namespace BeezupSDK\Request\Catalogs;

use BeezupSDK\Core\Request\AbstractStoreRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;

/**
 * @method string[] getSchedules()
 * @method $this setSchedules(string[] $schedules)
 * @method string getLocalTimeZoneName()
 * @method $this setLocalTimeZoneName(string $localTimeZoneName)
 */
class PostCatalogAutoImportConfigureSchedulesRequest extends AbstractStoreRequest
{
    protected string $method = 'POST';
    protected string $endpoint = '/user/catalogs/{storeId}/autoImport/scheduling/schedules';
    public array $bodyParams = [
        'schedules',
        'localTimeZoneName'
    ];

    public function __construct(string $storeId, array $schedules, ?string $localTimeZoneName = null)
    {
        parent::__construct($storeId);
        $this->setSchedules($schedules);
        if (isset($localTimeZoneName))
            $this->setLocalTimeZoneName($localTimeZoneName);
    }

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}

