# terminal42/cashctrl-api

An API client for the REST API of cashctrl.com.
This client is currently used for our own projects and is subject to heavy changes.


## Installation

```bash
$ composer.phar require terminal42/cashctrl-api ^2.0@dev
```

If you are using Symfony, we recommend to use our [CashCtrl Bundle](https://github.com/terminal42/cashctrl-bundle).


## Usage

```php
$subdomain  = 'companyname';
$apiKey     = 'foobar';

$client = new Client($subdomain, $apiKey);

// Example call to get person list:
(new PersonEndpoint($client))->list();
```
