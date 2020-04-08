# Laravel Localisation Package

[![Version](https://poser.pugx.org/pwweb/localisation/v/stable.svg)](https://github.com/pwweb/localisation/releases)
[![Downloads](https://poser.pugx.org/pwweb/localisation/d/total.svg)](https://github.com/pwweb/localisation)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/pwweb/localisation/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/pwweb/localisation/?branch=master)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)
<!-- [![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis] -->

**Localisation**: C3P0 for Laravel. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer run the following:

``` bash
# Install the package.
$ composer require pwweb/localisation

# Publish config, migration, languages and controllers.
# Note: Individual publishing tags are available, see chapter Customizing.
$ php artisan vendor:publish --provider="PWWEB\Localisation\LocalisationServiceProvider"

# Run migrations
$ php artisan migrate
```
## Pre-requisites
The package assumes a standard Laravel installation if the bundled default contollers for the entities are to be used. The bundled controllers extend from  `App\Http\Controllers\Controller`. If other, custom base controllers are used as part of the installation, refer to [Customizing](Customizing).

## Configuration

### Customizing
The package provides the following tags for publishing individual components for customizing:

|Tag|Description|
|---|---|
|```pwweb.localisation.config```|Publish the configuration files to e.g. adjust database table names.|
|```pwweb.localisation.migrations```|Publish the migration file(s) to make alterations to the database tables.|
|```pwweb.localisation.language```|Publish the language files to make adjustments to the translation strings.|
|```pwweb.localisation.views```|Publish the view files to make adjustments to the overall structure of the views.|

### Default and Fallback Language
It is recommended to change your `app.php` to use both the [ISO-639-1 ISO Language Code][link-iso-639] as well as the [ISO-3166 ISO Country Code][link-iso-3166]. This can be achieved by changing the following two variables:

```php
<?php

return [
    ...
    'locale' => 'en-GB',
    'fallback_locale' => 'en-GB',
    ...
];
```

## Usage

### Addresses
The package provides a ```trait HasAddresses``` which can be used to allow models to be associated with addresses.

```php
<?php

namespace Path\To;

use Illuminate\Database\Eloquent\Model;
use PWWEB\Localisation\Traits\HasAddresses;

class MyModel extends Model
{
    use HasAddresses;
}

```
### Language Switcher
The localisation package provides a language switcher that can easily be added to blade templates as follows (note: the ```<div>``` is exemplary):
```html
...
<div class="anyContainer">
    {{ Localisation::languageSelector() }}
</div>
...
```

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
[link-iso-639]: https://en.wikipedia.org/wiki/List_of_ISO_639-1_codes
[link-iso-3166]: https://en.wikipedia.org/wiki/ISO_3166-1_alpha-2
