<?php

namespace BeezupSDK\Test;

use BeezupSDK\Client;
use PHPUnit\Framework\TestCase;

abstract class BaseTest extends TestCase
{
    const TOKEN = "BEEZUP_TOKEN";
    protected static ?Client $client;

    protected function getClient(bool $reset = false): Client
    {
        if (!isset(self::$client) || $reset) {
            self::$client = new Client(getenv(self::TOKEN));
        }
        return self::$client;
    }

    protected function success($message)
    {
        $this->message("\033[32m" . $message . "\033[0m");
    }

    protected function info($message)
    {
        $this->message("\033[36m" . $message . "\033[0m");
    }

    protected function error($message)
    {
        $this->message("\033[91m" . $message . "\0330m");
    }

    protected function warning($message)
    {
        $this->message("\033[93m" . $message . "\033[0m");
    }

    protected function message($message)
    {
        fwrite(STDOUT, print_r($message, true) . "\n");
    }

    protected function testClass(string $expectedClass, mixed $resultClass)
    {
        $this->assertEquals($expectedClass, is_object($resultClass) ? $resultClass::class : null);
    }
}