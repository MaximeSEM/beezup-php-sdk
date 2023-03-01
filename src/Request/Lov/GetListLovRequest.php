<?php

namespace BeezupSDK\Request\Lov;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Request\EtagTrait;
use BeezupSDK\Core\Response\Decorator\BaseCollection;
use BeezupSDK\Domain\Common\Collection\LovCollection;
use BeezupSDK\Domain\Common\Collection\LovLinkCollection;
use InvalidArgumentException;

/**
 * @method string getType();
 */
class GetListLovRequest extends AbstractRequest
{
    use EtagTrait;

    protected string $endpoint = '{type}/lov';
    protected array $uriVars = ['type'];

    /**
     * @param string $type
     * @throws InvalidArgumentException
     */
    public function __construct(string $type = 'user')
    {
        parent::__construct();
        $this->setType($type);
    }

    /**
     * @throws InvalidArgumentException
     */
    public function setType(string $type): static
    {
        if ($type !== 'user' && $type !== 'public')
            throw new InvalidArgumentException("Only user and public are allowed");
        $this->setData('type', $type);
        return $this;
    }

    public function getResponseDecorator(): BaseCollection|LovCollection
    {
        return LovLinkCollection::decorator('links.list');
    }
}
