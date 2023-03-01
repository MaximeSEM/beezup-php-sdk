<?php

namespace BeezupSDK\Core\Client;

use BeezupSDK\Core\Domain\ArrayableInterface;
use BeezupSDK\Core\Exception\ClientDisabledException;
use BeezupSDK\Core\Request\RequestInterface;
use BeezupSDK\Core\Utility\Functions;
use DateTime;
use Exception;
use GuzzleHttp;
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\MessageFormatter;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Message;
use GuzzleHttp\Psr7\Query;
use InvalidArgumentException;
use JetBrains\PhpStorm\Pure;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

abstract class AbstractApiClient implements ApiClientInterface
{
    /**
     * Handle query parameters that will be merged
     * with request parameters when executed
     *
     * @var array
     */
    public array $queryParams = [];
    /**
     * @var string
     */
    protected string $baseUrl;
    /**
     * @var ?LoggerInterface
     */
    protected ?LoggerInterface $logger;
    /**
     * @var ?MessageFormatter
     */
    protected ?MessageFormatter $messageFormatter;
    /**
     * @var string
     */
    protected string $userAgent;
    /**
     * @var string
     */
    protected string $acceptLanguage;
    /**
     * Won't send any request if client is disabled
     *
     * @var bool
     */
    protected bool $disabled = false;
    /**
     * Will return a promise response if enabled
     *
     * @var bool
     */
    protected bool $async = false;
    /**
     * Will return raw response if enabled
     *
     * @var bool
     */
    protected bool $raw = false;
    /**
     * Guzzle client object
     *
     * @var ?ClientInterface
     */
    protected ?ClientInterface $client;
    /**
     * Requests history storage
     *
     * @var array
     */
    protected array $history = [];
    /**
     * Request options
     *
     * @var array
     */
    protected array $options = [
        'connect_timeout' => 30,
        'http_errors' => false,
    ];

    /**
     * @param string $name
     * @param array $args
     * @return  mixed
     * @throws  Exception
     */
    public function __call(string $name, array $args)
    {
        /** @var RequestInterface $request */
        $request = $args[0];
        if (!$request instanceof RequestInterface) {
            throw new InvalidArgumentException('First parameter must be an instance of ' . RequestInterface::class);
        }

        return $this->execute($request);
    }

    /**
     * Executes specified request taking raw and async parameters into account
     *
     * @param RequestInterface $request
     * @return  mixed
     * @throws ClientDisabledException
     */
    private function execute(RequestInterface $request): mixed
    {
        if ($this->async) {
            return $this->runAsync($request);
        }

        return $this->raw ? $this->run($request) : $request->run($this);
    }

    /**
     * Prepares given request without executing it
     *
     * @param RequestInterface $request
     * @return  PromiseInterface
     * @throws  ClientDisabledException
     */
    public function runAsync(RequestInterface $request): PromiseInterface
    {
        if ($this->disabled) {
            throw new ClientDisabledException('API client is disabled');
        }

        return $this->prepareRequest($request);
    }

    /**
     * Prepares and builds request promise before being executed
     *
     * @param RequestInterface $request
     * @return  PromiseInterface
     */
    private function prepareRequest(RequestInterface $request): PromiseInterface
    {
        return $this->getClient()->requestAsync(
            $request->getMethod(), $request->getUri(), $this->buildRequestOptions($request)
        );
    }

    /**
     * @return Client|ClientInterface
     */
    public function getClient(): Client|ClientInterface
    {
        if (!isset($this->client)) {
            $this->client = $this->getDefaultClient();
        }

        return $this->client;
    }

    /**
     * @param ClientInterface $client
     * @return  $this
     */
    public function setClient(ClientInterface $client): static
    {
        $this->client = $client;

        return $this;
    }

    /**
     * @return  Client
     */
    protected function getDefaultClient(): Client
    {
        $stack = GuzzleHttp\HandlerStack::create();
        $stack->push(GuzzleHttp\Middleware::history($this->history));

        $logger = $this->getLogger();
        if (!empty($logger)) {
            $stack->push(GuzzleHttp\Middleware::log($logger, $this->getMessageFormatter()));
        }

        return new Client([
            'handler' => $stack,
            'base_uri' => rtrim($this->getBaseUrl(), '/') . '/',
            'headers' => [
                'User-Agent' => $this->getUserAgent(),
                'Accept' => 'application/json',
                'Accept-Language' => $this->getAcceptLanguage(),
            ],
        ]);
    }

    /**
     * @param string $language
     * @return $this
     * @throws Exception
     */
    public function setAcceptLanguage(string $language): static
    {
        if (array_key_exists($language, Functions::$acceptLang)) {
            $this->acceptLanguage = Functions::$acceptLang[$language];
        } elseif (in_array($language, Functions::$acceptLang)) {
            $this->acceptLanguage = $language;
        } else {
            throw new Exception("Language not accepter");
        }
        return $this;
    }

    /**
     * @return string
     */
    public function getAcceptLanguage(): string
    {
        if (!isset($this->acceptLanguage)) {
            $this->acceptLanguage = Functions::getUserLanguage();
        }
        return $this->acceptLanguage;
    }

    /**
     * @return  ?LoggerInterface
     */
    public function getLogger(): ?LoggerInterface
    {
        if (isset($this->logger)) {
            return $this->logger;
        }
        return null;
    }

    /**
     * @param LoggerInterface $logger
     * @param MessageFormatter|null $messageFormatter
     * @return  $this
     */
    public function setLogger(LoggerInterface $logger, MessageFormatter $messageFormatter = null): static
    {
        $this->logger = $logger;
        $this->messageFormatter = $messageFormatter;

        return $this;
    }

    /**
     * @return  MessageFormatter
     */
    public function getMessageFormatter(): MessageFormatter
    {
        if (empty($this->messageFormatter)) {
            $this->messageFormatter = new MessageFormatter();
        }

        return $this->messageFormatter;
    }

    /**
     * @param MessageFormatter $messageFormatter
     * @return  $this
     */
    public function setMessageFormatter(MessageFormatter $messageFormatter): static
    {
        $this->messageFormatter = $messageFormatter;

        return $this;
    }

    /**
     * @return  string
     */
    public function getBaseUrl(): string
    {
        return $this->baseUrl;
    }

    /**
     * @param string $baseUrl
     * @return  $this
     */
    public function setBaseUrl(string $baseUrl): static
    {
        $this->baseUrl = $baseUrl;

        return $this;
    }

    /**
     * @return  string
     */
    public function getUserAgent(): string
    {
        if (!isset($this->userAgent)) {
            $this->userAgent = self::getDefaultUserAgent();
        }
        return $this->userAgent;
    }

    /**
     * @param string $userAgent
     * @return  $this
     */
    public function setUserAgent(string $userAgent): static
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    /**
     * @return  string
     */
    #[Pure]
    public static function getDefaultUserAgent(): string
    {
        return 'API-PHP-SDK/1.0';
    }

    /**
     * @param RequestInterface $request
     * @return  array
     */
    public function buildRequestOptions(RequestInterface $request): array
    {
        // Build Guzzle request options
        $options = array_merge_recursive($this->options, $request->getOptions());

        $queryParams = $this->queryParams + $request->getQueryParams();

        if ($request->haveQueryParamsDuplicated()) {
            // If query params are duplicated, specify them as string to Guzzle
            $simpleParams = array_diff_key($queryParams, array_flip($request->getDuplicatedQueryParams()));
            $duplicatedParams = array_intersect_key($queryParams, array_flip($request->getDuplicatedQueryParams()));

            $options['query'] = Query::build(array_merge($this->formatQueryParams($simpleParams), $duplicatedParams));
        } else {
            $options['query'] = $this->formatQueryParams($queryParams);
        }

        $bodyParams = $request->getBodyParams();

        if (!empty($bodyParams)) {
            $data = $this->formatBodyParamsJson($bodyParams);
            if ($rootJson = $request->getDataRoot()) {
                $data = $data[$rootJson] ?? [];
            }
            if ($request->isJSON()) {
                $options['json'] = $data;
            }elseif (!is_array($data)){
                $options['body'] = $data;
            }
        }

        if (!isset($options['headers'])) {
            $options['headers'] = [];
        }

        $options['headers']['X-BeezupSdk-Uuid'] = uniqid('beezup_sdk_', true);
        return $options;
    }

    /**
     * Returns all request options
     *
     * @return  array
     */
    public function getOptions(): array
    {
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
     * Formats params as query string params
     *
     * @param array $params
     * @return  array
     */
    private function formatQueryParams(array $params): array
    {
        foreach ($params as $key => $value) {
            if ($value instanceof DateTime) {
                $value = Functions::dateFormat($value);
            } elseif (is_array($value)) {
                if (Functions::arrayIsAssoc($value)) {
                    array_walk($value, function (&$val, $key) {
                        $val = $key . '|' . $val;
                    });
                }
                $value = implode(',', $value);
            }
            $params[$key] = $value;
        }

        return $params;
    }

    /**
     * Formats body parameters for JSON requests
     *
     * @param array $bodyParams
     * @return  array
     */
    private function formatBodyParamsJson(array $bodyParams): array
    {
        $params = [];
        foreach ($bodyParams as $key => $value) {
            if ($value instanceof ArrayableInterface) {
                $value = $value->toArray();
            }
            $params[$key] = $value;
        }
        return $params;
    }

    /**
     * Prepares and executes given request
     *
     * @param RequestInterface $request
     * @return  ResponseInterface
     * @throws ClientDisabledException
     */
    public function run(RequestInterface $request): ResponseInterface
    {
        return $this->runAsync($request)->wait();
    }

    /**
     * Proxy to run() method
     *
     * @param RequestInterface $request
     * @return PromiseInterface|ResponseInterface
     * @throws ClientDisabledException
     */
    public function __invoke(RequestInterface $request): PromiseInterface|ResponseInterface
    {
        return $this->execute($request);
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
     * @param bool $flag
     * @return  $this
     */
    public function async(bool $flag = true): static
    {
        $this->async = $flag;

        return $this;
    }

    /**
     * @param bool $flag
     * @return  $this
     */
    public function disable(bool $flag = true): static
    {
        $this->disabled = $flag;

        return $this;
    }

    /**
     * Returns last request as a string for debugging purpose
     *
     * @return  string
     */
    public function getLastRequestString(): string
    {
        return !empty($this->history) ? Message::toString(current($this->history)['request']) : '';
    }

    /**
     * @param bool $flag
     * @return  $this
     */
    public function raw(bool $flag = true): static
    {
        $this->raw = $flag;

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
}
