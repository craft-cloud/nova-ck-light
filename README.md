#  NovaCKLight

A bare bones nova wysiwyg field using ckeditor & ckfinder

## Prerequisites

This package was developed using PHP 8, Vue 3, Laravel 10, Nova 4, ckfinder for laravel and ckeditor 5 vue. It **currently** assumes you have a ckfinder connector endpoint at `/ckfinder/connector` see [ckfinder for laravel](https://github.com/ckfinder/ckfinder-laravel-package) for details.

- **[Laravel](https://laravel.com/)**
- **[Vue3](https://vuejs.org/)**
- **[Nova](https://nova.laravel.com/docs/4.0/installation.html)**
- **[Ckeditor 5 Vue](https://github.com/ckeditor/ckeditor5-vue)**
- **[Ckeditor 5 Vue](https://github.com/ckeditor/ckeditor5-vue)**

## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require craft-cloud/nova-ck-light
```

## Usage

Default editor

```php
use CraftCloud\NovaCkLight\NovaCkLight;

NovaCkLight::make('MyFieldName'),
```

Editor options
```php
use CraftCloud\NovaCkLight\NovaCkLight;

NovaCkLight::make('MyFieldName')->toolbar(['heading', '|', 'bold', 'italic', 'link']),
```

If you require images without an editor

```php
use CraftCloud\NovaCkLight\NovaCkLight;

NovaCkLight::make('MyFieldName')->imageOnly(),
```
## Testing

``` bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/craft-cloud/nova-ck-light/blob/main/CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email admin@craftcloud.co.uk instead of using the issue tracker.

## Credits

- [patrickAsare](https://github.com/patrickAsare)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
