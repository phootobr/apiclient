# API Client Phooto

This library provides access to Phooto Brasil's REST API

## Requirements

- PHP >= 7.2
- cURL Extension

## Installation

`composer require phootobr/apiclient`

## Usage

```php
$apiClient = new \PhootoBR\APIClient\Client("{YOUR_CLIENT_ID}", "{YOUR_SECRET_ID}", "{SERVICE}", "{SANDBOX_MODE|true/false}");

$data = [
    "hello" => "world",
];

$response = $apiClient->post("{ENDPOINT}", $data);
```

### Services
    - emails
    - mce360
    
## License

This library is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
