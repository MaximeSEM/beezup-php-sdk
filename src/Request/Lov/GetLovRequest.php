<?php

namespace BeezupSDK\Request\Lov;

use BeezupSDK\Core\Request\AbstractRequest;
use BeezupSDK\Core\Request\EtagTrait;
use BeezupSDK\Core\Response\Decorator\BaseCollection;
use BeezupSDK\Domain\Common\Collection\LovCollection;
use Exception;

/**
 * @method string getListName();
 * @method $this setListName(string $listName);
 * @method string getType();
 */
class GetLovRequest extends AbstractRequest
{
    use EtagTrait;

    protected string $endpoint = '{type}/lov/{listName}';
    protected array $uriVars = ['listName', 'type'];

    /**
     * @param string|null $listName
     * @param string|null $lovPath
     * @param string $type
     * @throws Exception
     */
    public function __construct(?string $listName = null, ?string $lovPath = null, string $type = 'user')
    {
        if (isset($lovPath)) {
            $this->endpoint = $lovPath;
            $this->setVersion('');
            $this->uriVars = [];
        } else {
            $this->setType($type);
            $this->setListname($listName);
        }
        parent::__construct();
    }

    /**
     * @throws Exception
     */
    public function setType(string $type): static
    {
        if ($type !== 'user' && $type !== 'public')
            throw new Exception("Only user and public are allowed");
        $this->setData('type', $type);
        return $this;
    }

    public function getResponseDecorator(): BaseCollection|LovCollection
    {
        return LovCollection::decorator('items');
    }
}
