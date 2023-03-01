<?php

namespace BeezupSDK\Core\Response\Decorator;

use BeezupSDK\Core\Exception\ApiException;
use BeezupSDK\Core\Exception\EtagException;
use Psr\Http\Message\ResponseInterface;

trait ErrorTrait
{
    protected ?int $statusCode = null;

    /**
     * @throws ApiException|EtagException
     */
    protected function beforeDecorate(ResponseInterface $response): void
    {
        $this->statusCode = $response->getStatusCode();
        if ($response->getStatusCode() == 304) {
            throw new EtagException($response->getReasonPhrase(), $response->getStatusCode());
        } else if (($response->getStatusCode() >= 300 || $response->getStatusCode() < 200) && !$response->getBody()->getContents()) {
            throw new ApiException($response->getReasonPhrase(), $response->getStatusCode());
        }
    }

    protected function afterDecorate(array $data): array
    {
        $code = null;
        $message = null;
        if (isset($data['errors']) && is_array($data['errors'])) {
            foreach ($data['errors'] as $error) {
                if (isset($error['message']))
                    $message .= $error['message'];
                if (!isset($code) && isset($error['code']))
                    $code = $error['code'];
            }
        } else if (isset($data['error'])) {
            $message = $data['error'];
        }
        if (isset($message)) {
            $exceptionClassName = "\\BeezupSDK\\Core\\Exception\\ApiException";
            if (isset($code) && class_exists("\\BeezupSDK\\Core\\Exception\\" . $code . "Exception")) {
                $exceptionClassName = "\\BeezupSDK\\Core\\Exception\\" . $code . "Exception";
            }
            throw new $exceptionClassName($message, $this->statusCode);
        }
        return $data;
    }
}
