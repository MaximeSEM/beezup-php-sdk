<?php

namespace BeezupSDK\Request\Subscriptions;

use BeezupSDK\Core\Domain\IdTrait;
use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Core\Utility\Functions;
use BeezupSDK\Domain\Common\EmptyAnswer;
use DateTime;

/**
 * @method  DateTime getRecoverBeginPeriod()
 * @method  $this setRecoverBeginPeriod(string $recoverBeginPeriod)
 * @method  DateTime getRecoverEndPeriod()
 * @method  $this setRecoverEndPeriod(string $recoverEndPeriod)
 */
class PostSubscriptionActivateRequest extends AbstractRequest
{
    use IdTrait;

    protected static array $dataTypes = [
        'recoverBeginPeriod' => DateTime::class,
        'recoverEndPeriod' => DateTime::class,
    ];
    public array $bodyParams = [
        'recoverBeginPeriod' => 'recoverBeginPeriodOrderLastModificationUtcDate',
        'recoverEndPeriod' => 'recoverEndPeriodOrderLastModificationUtcDate',
    ];
    protected string $method = 'POST';
    protected string $endpoint = '/user/marketplaces/orders/subscriptions/{id}/activate';
    protected array $uriVars = [
        'id'
    ];

    public function __construct(string $id, ?DateTime $recoverBeginPeriod = null, ?DateTime $recoverEndPeriod = null)
    {
        parent::__construct();
        $this->setId($id);
        if (isset($recoverBeginPeriod))
            $this->setRecoverBeginPeriod(Functions::dateFormat($recoverBeginPeriod));
        if (isset($recoverEndPeriod))
            $this->setRecoverEndPeriod(Functions::dateFormat($recoverEndPeriod));
    }

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
