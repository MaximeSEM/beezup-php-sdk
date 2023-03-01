<?php

namespace BeezupSDK\Core\Domain;

use BeezupSDK\Core\Utility\Functions;

/**
 * @method string getId()
 */
trait IdTrait
{
    /**
     * @param string|null $id
     * @return $this
     */
    public function setId(?string $id): static
    {
        // if the id is not set, generate an automatic id
        if (empty($id))
            $id = Functions::getRandomId();
        return $this->setData('id',$id);
    }
}