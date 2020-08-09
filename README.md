# Laravel api client for zvonok.com service

## Installation

You can install the package via composer:

```bash
composer require yaroslawww/laravel-zvonok-api
```

You can publish and run the migrations with:


You can publish the config file with:
```bash
php artisan vendor:publish --provider="GCSC\LaravelZvonokApi\LaravelZvonokApiServiceProvider" --tag="config"
```


## Usage

``` php
ZvonokApi::request('post', 'phones/append/calls/', [
        'multipart' => [
            [
                'name' => 'campaign_id',
                'contents' => '123456789',
            ],
            [
                'name' => 'phones',
                'contents' => fopen('/path/to/file.csv', 'r'), // just csv data as string
            ],
        ],
    ]
);
```
## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Credits

- [Yaroslav Georgitsa](https://github.com/yaroslawww)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
