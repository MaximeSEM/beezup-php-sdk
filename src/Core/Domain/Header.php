<?php

namespace BeezupSDK\Core\Domain;

/**
 * @method string getApplicationName()
 * @method string getApiVersion()
 * @method string getBeezUPUserId()
 * @method string getBeezUPUserEmail()
 * @method string getRequestId()
 * @method int getRemainingCalls()
 */
class Header extends BaseObject
{
    public static array $mapping = [
        'x-beezup-application-name' => 'applicationName',
        'x-beezup-api-version' => 'apiVersion',
        'x-beezup-request-id' => 'requestId',
        'x-remaining-calls' => 'remainingCalls',
        'ETag' => 'etag',
    ];
    protected static array $dataTypes = [
        'remainingCalls' => 'intval'
    ];

    /**
     * @return array
     */
    public function getDuration(): array
    {
        $duration = [];
        if ($this->data) {
            $durationKey = $this->delimit('X-BeezUP-Duration-');
            foreach ($this->data as $k => $v) {
                if (str_starts_with($k, $durationKey) !== false) {
                    $duration[str_replace($durationKey, '', $k)] = $v;
                }
            }
            $gatewayKey = $this->delimit('x-beezup-apigateway-total-duration');
            if (isset($this->data[$gatewayKey])) {
                $duration['Total-Gateway'] = $this->data[$gatewayKey];
            }
        }
        return $duration;
    }

    /**
     * @return string|null
     */
    public function getEtag(): ?string
    {
        if ($etag = $this->getData('etag')) {
            return str_replace(["W/", '"'], "", $etag);
        }
        return null;
    }

    /**
     * Associates value to key after doing a map on key and validation on value
     *
     * @param string $key
     * @param mixed $value
     * @return  $this
     */
    protected function setDataValue(string $key, mixed $value): static
    {
        if (null !== $value) {
            if (is_array($value) && count($value) == 1)
                $value = current($value);
            $this->data[$this->delimit($key)] = static::value($key, $value);
        }
        return $this;
    }
}
