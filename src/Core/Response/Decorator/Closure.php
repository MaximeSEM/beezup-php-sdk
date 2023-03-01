<?php

namespace BeezupSDK\Core\Response\Decorator;

use BeezupSDK\Core\Response\ResponseDecoratorInterface;
use Psr\Http\Message\ResponseInterface;

class Closure implements ResponseDecoratorInterface
{
    /**
     * @var \Closure
     */
    protected \Closure $closure;

    /**
     * @param \Closure $closure
     */
    public function __construct(\Closure $closure)
    {
        $this->closure = $closure;
    }

    /**
     * @param ResponseInterface $response
     * @return mixed
     */
    public function decorate(ResponseInterface $response): mixed
    {
        return call_user_func_array($this->closure, [$response]);
    }
}
