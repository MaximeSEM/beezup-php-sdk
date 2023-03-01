## BeezUP - non-official -  PHP SDK

This is the non-official BeezUP PHP API client.

### How to use

```php
<?php
use BeezupSDK\Client;
use BeezupSDK\Request\Customer\Stores\GetStoresRequest;
use BeezupSDK\Domain\Customer\Stores\Collection\StoreCollection;

// Environment parameters
$token = 'your_api_beezup_token';

try {
    // Instantiating the API Client
    $client = new Client($token);
    // Building request
    $request = new GetStoresRequest();
    // Calling the API
    $client = $api->getStores($request);
    var_dump($result); // StoreCollection

    // You can also retrieve raw response by using run() method of API client:
    $result = $api->run($request); // or $client->raw()->getStores($request)
    var_dump($result); // returns \Psr\Http\Message\ResponseInterface
} catch (\Exception $e) {
    // An exception is thrown if object requested is not found or if an error occurs
    var_dump($e);
}
```