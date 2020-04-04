# Laravel Localisation Package

[![Version](https://poser.pugx.org/pwweb/localisation/v/stable.svg)](https://github.com/pwweb/localisation/releases)
[![Downloads](https://poser.pugx.org/pwweb/localisation/d/total.svg)](https://github.com/pwweb/localisation)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/pwweb/localisation/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/pwweb/localisation/?branch=master)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
<!-- [![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis] -->

**Artomator**: Custom commands making life easier. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer run the following:

``` bash
# Install the package.
$ composer require pwweb/localisation

# Publish config and migration.
$ php artisan vendor:publish --provider="PWWeb\Localisation\LocalisationServiceProvider"

# Run migrations
$ php artisan migrate
```

## Usage

In progress.

## FAQs

During install via composer you get the following messages:
```php
 ErrorException  : Trying to access array offset on value of type null

  at /var/www/vendor/pwweb/localisation/src/LocalisationServiceProvider.php:107
    103|     protected function registerModelBindings()
    104|     {
    105|         $config = $this->app->config['localisation.models'];
    106|
  > 107|         $this->app->bind(CountryContract::class, $config['country']);
    108|         $this->app->bind(LanguageContract::class, $config['language']);
    109|         $this->app->bind(CurrencyContract::class, $config['currency']);
    110|     }
    111|

  Exception trace:

  1   Illuminate\Foundation\Bootstrap\HandleExceptions::handleError("Trying to access array offset on value of type null", "/var/www/vendor/pwweb/localisation/src/LocalisationServiceProvider.php", [])
      /var/www/vendor/pwweb/localisation/src/LocalisationServiceProvider.php:107

  2   PWWeb\Localisation\LocalisationServiceProvider::registerModelBindings()
      /var/www/vendor/pwweb/localisation/src/LocalisationServiceProvider.php:81

  Please use the argument -v to see more details.
```
This is due to the command `php artisan config:cache` has been run. We suggest you delete the cache file `bootstrap/cache/config.php` and then run `composer dump-autoload` to be sure.

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please use the [issue tracker][link-issues].

## Credits

- [PW*Websolutions][link-author]
- [All Contributors][link-contributors]

## License

Copyright &copy; pw-websolutions.com. Please see the [license file][link-licencse] for more information.

<!-- [ico-version]: https://img.shields.io/packagist/v/pwweb/artomator.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/pwweb/artomator.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/pwweb/artomator/master.svg?style=flat-square -->

<!-- [link-packagist]: https://packagist.org/packages/pwweb/artomator
[link-downloads]: https://packagist.org/packages/pwweb/artomator
[link-travis]: https://travis-ci.org/pwweb/artomator
[link-styleci]: https://styleci.io/repos/12345678 -->
[link-author]: https://github.com/pwweb
[link-contributors]: ../../contributors
[link-issues]: https://github.com/pwweb/localisation/issues
[link-licencse]: https://opensource.org/licenses/MIT
