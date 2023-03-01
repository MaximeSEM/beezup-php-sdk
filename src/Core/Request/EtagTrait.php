<?php

namespace BeezupSDK\Core\Request;

trait EtagTrait
{
    /**
     * @var string|null
     */
    protected ?string $etag;

    /**
     * @return string|null
     */
    public function getEtag(): ?string
    {
        return $this->etag;
    }

    /**
     * @param string $etag
     * @return $this
     */
    public function setEtag(string $etag): static
    {
        $this->etag = $etag;
        $headers = $this->getOptions('headers');
        $headers['If-None-Match'] = '"' . str_replace(['"', "W/"], "", $this->etag) . '"';
        $this->addOption('headers', $headers);
        return $this;
    }

    /**
     * @return $this
     */
    public function removeEtag(): static
    {
        $this->etag = null;
        $headers = $this->getOptions('headers');
        if (isset($headers['If-None-Match'])) {
            unset($headers['If-None-Match']);
        }
        $this->addOption('headers', $headers);
        return $this;
    }
}
