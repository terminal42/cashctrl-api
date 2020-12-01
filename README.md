# terminal42/cashctrl-api

An API client for the REST API of cashctrl.com.
This client is currently used for our own projects and is not stable at all.
It thus might be subject to heavy changes.
If you're interested in moving to a stable release (version 1.0.0) so you can be
sure there are no BC breaks until version 2.0.0 (semver), please feel free to
get in touch with us.


## Installation

```bash
$ composer.phar require terminal42/cashctrl-api dev-main
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
