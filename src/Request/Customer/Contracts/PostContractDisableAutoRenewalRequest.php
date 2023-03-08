<?php

namespace BeezupSDK\Request\Customer\Contracts;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Response\Decorator\BaseObject;
use BeezupSDK\Domain\Common\EmptyAnswer;

/**
 * @method string getContractTerminationReasonType()
 * @method $this setContractTerminationReasonType(string $contractTerminationReasonType)
 * @method string getContractTerminationReason()
 * @method $this setContractTerminationReason(string $contractTerminationReason)
 */
class PostContractDisableAutoRenewalRequest extends AbstractRequest
{
    public array $bodyParams = [
        'contractTerminationReasonType',
        'storeCount',
    ];
    protected string $method = 'POST';
    protected string $endpoint = '/user/customer/contracts/current/disableAutoRenewal';

    /**
     * @param string $contractTerminationReasonType
     * @param string|null $contractTerminationReason
     */
    public function __construct(string $contractTerminationReasonType, ?string $contractTerminationReason = null)
    {
        parent::__construct();
        $this->setContractTerminationReasonType($contractTerminationReasonType);
        if (isset($contractTerminationReason))
            $this->setContractTerminationReason($contractTerminationReason);
    }

    public function getResponseDecorator(): BaseObject|EmptyAnswer
    {
        return EmptyAnswer::decorator();
    }
}
