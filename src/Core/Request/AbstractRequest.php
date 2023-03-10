<?php

namespace BeezupSDK\Core\Request;

use BeezupSDK\Core\Client\ApiClientInterface;
use BeezupSDK\Core\Domain\BaseObject;
use BeezupSDK\Core\Exception\RequestValidationException;
use BeezupSDK\Core\Response\Decorator\AssocArray;
use BeezupSDK\Core\Response\Decorator\Closure;
use BeezupSDK\Core\Utility\Functions;
use Psr\Http\Message\ResponseInterface;

abstract class AbstractRequest extends BaseObject implements RequestInterface
{
    /**
     * Array of query string parameters
     *
     * @var array
     */
    public array $queryParams = [];
    /**
     * Array of request body parameters
     *
     * @var array
     */
    public array $bodyParams = [];
    /**
     * Special parameters that can be 'true', 'false' or 'all'
     *
     * @var array
     */
    public array $boolOrAllParams = [];
    /**
     * HTTP method (GET, POST, PUT, ...)
     *
     * @var string
     */
    protected string $method = 'GET';
    /**
     * @var string
     */
    protected string $endpoint = '/';
    /**
     * @var string
     */
    protected string $version = 'v2';
    /**
     * If true, request body will be encoded into JSON format
     *
     * @var bool
     */
    protected bool $json = true;
    /**
     * Use to define a root of data to export
     */
    protected ?string $dataRoot = null;
    /**
     * Request URI variables as an array
     * Concrete example:
     * [ 'offer' ]
     *
     * @var array
     */
    protected array $uriVars = [];
    /**
     * @var array
     */
    protected array $duplicatedQueryParams = [];
    /**
     * Request options
     *
     * @var array
     */
    protected array $options = ['headers' => ['Accept' => 'application/json']];


    /**
     * @return  bool
     */
    public function haveQueryParamsDuplicated(): bool
    {
        return !empty($this->duplicatedQueryParams);
    }

    /**
     * @return array
     */
    public function getBodyParams(): array
    {
        return $this->buildParams($this->bodyParams);
    }

    /**
     * @param array $params
     * @return  array
     */
    protected function buildParams(array $params): array
    {
        if (empty($params)) {
            return [];
        }

        $mapping = [];
        foreach ($params as $key => $value) {
            $mapping[is_int($key) ? $value : $key] = $value;
        }
        $params = array_intersect_key($this->toArray(), $mapping);
        return Functions::arrayMapKeys($params, $mapping);
    }

    /**
     * Get request query parameters that should be duplicated
     *
     * @return  array
     */
    public function getDuplicatedQueryParams(): array
    {
        return $this->duplicatedQueryParams;
    }

    /**
     * Returns the HTTP method used for current request
     *
     * @return  string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return array
     */
    public function getQueryParams(): array
    {
        $params = $this->buildParams($this->queryParams);
        // Handle special boolean or ALL parameters
        foreach ($this->boolOrAllParams as $param) {
            $value = $this->getData($param);
            $params[$param] = (null !== $value) ? ($value ? 'true' : 'false') : '';
        }
        /**
         * Format boolean values as strings
         */
        array_walk($params, function (&$val) {
            if (is_bool($val)) {
                $val = $val ? 'true' : 'false';
            }
        });
        return $params;
    }

    /**
     * @param $key
     * @return array|array[]
     */
    public function getOptions($key = null): array
    {
        if ($key) {
            if (isset($this->options[$key]) && is_array($this->options[$key]))
                return $this->options[$key];
            return [];
        }
        return $this->options;
    }

    /**
     * Overrides all request options by specified ones
     *
     * @param array $options
     * @return  $this
     */
    public function setOptions(array $options): static
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Removes a specific option by key
     *
     * @param string $key
     * @return  $this
     */
    public function removeOption(string $key): static
    {
        if (isset($this->options[$key])) {
            unset($this->options[$key]);
        }

        return $this;
    }

    /**
     * Add a request option
     *
     * @param string $key
     * @param mixed $value
     * @return  $this
     */
    public function addOption(string $key, mixed $value): static
    {
        $this->options[$key] = $value;

        return $this;
    }

    /**
     * @return string
     * @throws RequestValidationException
     */
    public function getUri(): string
    {
        $this->validateRequiredUriVars();
        $vars = [];
        array_walk(
            $this->uriVars,
            function ($val) use (&$vars) {
                $vars['{' . $val . '}'] = $this->getData($val);
            }
        );

        $uri = strtr($this->getEndpoint(), $vars);
        return trim($this->version . $uri, '/');
    }

    /**
     * Verify that all required URI vars are present
     *
     * @return  void
     * @throws  RequestValidationException
     */
    protected function validateRequiredUriVars(): void
    {
        $diff = array_diff($this->uriVars, array_keys($this->data));
        if (!empty($diff)) {
            throw new RequestValidationException(
                sprintf('%s requires the following information: %s', __CLASS__, implode(', ', $this->uriVars))
            );
        }
    }

    /**
     * Returns the request endpoint to access an API
     *
     * @return  string
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    /**
     * @return bool
     */
    public function isJSON(): bool
    {
        return $this->json;
    }

    /**
     * @return ?string
     */
    public function getDataRoot(): ?string
    {
        return $this->dataRoot;
    }

    /**
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $version
     * @return $this
     */
    public function setVersion(string $version): static
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @param ApiClientInterface $api
     * @return mixed
     */
    public function run(ApiClientInterface $api): mixed
    {
        return $this->getResponseDecorator()->decorate($api->run($this));
    }

    /**
     * @return Closure
     * @noinspection PhpMissingReturnTypeInspection
     */
    public function getResponseDecorator()
    {
        return new Closure(function (ResponseInterface $response) {

            $contentType = $response->getHeaderLine('Content-Type');
            if (str_starts_with($contentType, 'application/json') || str_starts_with($contentType, 'application/xml') || str_starts_with($contentType, 'text/xml')) {
                return new AssocArray(); // default is to transform JSON or XML responses to associative array
            }
            return $response;
        });
    }
}
