<?php

namespace BeezupSDK\Core\Domain;

trait HeaderTrait
{
    /**
     * @var ?Header
     */
    protected ?Header $headers;

    public function getHeaders(): ?Header
    {
        return $this->headers;
    }

    /**
     * @param array $data
     * @return $this
     */
    public function setHeaders(array $data): static
    {
        $this->headers = new Header($data);
        return $this;
    }
}
