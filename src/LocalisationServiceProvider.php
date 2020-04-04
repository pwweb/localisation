<?php

/**
 * PWWEB\Localisation.
 *
 * Localisation Service Provider.
 *
 * @author    Frank Pillukeit <clients@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace PWWEB\Localisation;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;
use PWWeb\Localisation\Contracts\Country as CountryContract;
use PWWeb\Localisation\Contracts\Currency as CurrencyContract;
use PWWeb\Localisation\Contracts\Language as LanguageContract;

class LocalisationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/localisation.php',
            'localisation'
        );

        // Register controllers.
        $this->app->make('PWWeb\Localisation\Controllers\IndexController');

        // Register views.
        $this->loadViewsFrom(__DIR__.'/resources/views', 'localisation');
    }

    /**
     * Boostrap the services of the package.
     *
     * @param LocalisationRegistrar $localisationLoader the localisation registrar
     * @param Filesystem            $filesystem         laravel filesystem object for file handling
     *
     * @return void
     */
    public function boot(LocalisationRegistrar $localisationLoader, Filesystem $filesystem)
    {
        include __DIR__.'/../routes/web.php';

        if (true === function_exists('config_path')) {
            // function not available and 'publish' not relevant in Lumen
            $this->publishes(
                [
                __DIR__.'/../config/localisation.php' => config_path('localisation.php'),
                ],
                'pwweb.localisation.config'
            );

            $this->publishes(
                [
                __DIR__.'/../database/migrations/create_localisation_tables.php.stub' => $this->getMigrationFileName($filesystem),
                ],
                'pwweb.localisation.migrations'
            );

            $this->publishes([
                __DIR__.'/resources/lang' => resource_path('lang/vendor/pwweb'),
            ]);

            $this->publishes(
                [
                    __DIR__.'/resources/views' => base_path('resources/views/vendor/localisation'),
                ],
                'views'
            );
        }

        $this->commands(
            [
            Commands\CacheReset::class,
            ]
        );

        $this->loadTranslationsFrom(realpath(__DIR__.'/resources/lang'), 'pwweb');

        $this->registerModelBindings();

        $localisationLoader->clearClassLanguages();
        $localisationLoader->registerLanguages();

        $this->app->bind('localisation', \PWWeb\Localisation\Localisation::class);
        $loader = AliasLoader::getInstance();
        $loader->alias('Localisation', \PWWeb\Localisation\Facades\Localisation::class);

        $this->app->singleton(
            LocalisationRegistrar::class,
            function ($app) use ($localisationLoader) {
                return $localisationLoader;
            }
        );
    }

    /**
     * Registers model bindings.
     *
     * @return void
     */
    protected function registerModelBindings()
    {
        $config = $this->app->config['localisation.models'];

        $this->app->bind(CountryContract::class, $config['country']);
        $this->app->bind(LanguageContract::class, $config['language']);
        $this->app->bind(CurrencyContract::class, $config['currency']);
    }

    /**
     * Returns existing migration file if found, else uses the current timestamp.
     *
     * @param Filesystem $filesystem filesystem object for file handling
     *
     * @return string migration filename
     */
    protected function getMigrationFileName(Filesystem $filesystem): string
    {
        $timestamp = date('Y_m_d_His', mktime(0, 0, 0, 1, 1, 2020));

        return Collection::make($this->app->databasePath().DIRECTORY_SEPARATOR.'migrations'.DIRECTORY_SEPARATOR)
            ->flatMap(
                function ($path) use ($filesystem) {
                    return $filesystem->glob($path.'*_create_localisation_tables.php');
                }
            )->push($this->app->databasePath()."/migrations/{$timestamp}_create_localisation_tables.php")
            ->first();
    }
}
