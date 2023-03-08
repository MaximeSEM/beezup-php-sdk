<?php

namespace BeezupSDK\Core\Request;

/**
 *
 * @method  string  getChannelId()
 * @method $this setChannelId(string $channelId)
 */
abstract class AbstractChannelRequest extends AbstractRequest
{
    public function __construct(string $channelId)
    {
        if (!isset($this->uriVars['channelId'])) {
            $this->uriVars['channelId'] = 'channelId';
        }
        parent::__construct();
        $this->setChannelId($channelId);
    }
}
