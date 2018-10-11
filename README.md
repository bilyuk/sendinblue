# SendinBlue
SendinBlue API v3 wrapper for Laravel

## Installation
You can install the package through Composer.
```
composer require bilyuk/sendinblue
```

## Usage
### Laravel:
Just put in your `services` config file 
```php
'sendinblue' => [
  'v3' => [
    'key' => env('SENDINBLUE_KEY_V3'),
  ],
],
```

For Laravel <5.5 add in your `app` config
```php
'providers' => [
    bilyuk\Sendinblue\ServiceProvider::class,
    //...
];
'aliases' => [
    'SendinBlue' => \bilyuk\Sendinblue\Facades\SendinBlue::class,
    //...
];
```
