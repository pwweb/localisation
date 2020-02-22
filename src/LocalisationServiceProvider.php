<?php

/**
 * PWWeb\Localisation
 *
 * Localisation Service Provider.
 *
 * @package   PWWeb\Localisation
 * @author    Frank Pillukeit <clients@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace PWWeb\Localisation;

use Illuminate\Filesystem\Filesystem;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

use PWWeb\Localisation\Contracts\Country as CountryContract;
use PWWeb\Localisation\Contracts\Language as LanguageContract;
use PWWeb\Localisation\Contracts\Currency as CurrencyContract;

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
            __DIR__ . '/../config/localisation.php',
            'localisation'
        );

        // Register controllers.
        $this->app->make('PWWeb\Localisation\Controllers\IndexController');

        // Register views.
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'localisation');
    }

    /**
     * Boostrap the services of the package.
     *
     * @param LocalisationRegistrar $localisationLoader The localisation registrar.
     * @param Filesystem            $filesystem         Laravel filesystem object for file handling.
     *
     * @return void
     */
    public function boot(LocalisationRegistrar $localisationLoader, Filesystem $filesystem)
    {
        include __DIR__ . '/../routes/web.php';

        if (function_exists('config_path') === true) {
            // function not available and 'publish' not relevant in Lumen
            $this->publishes(
                [
                __DIR__ . '/../config/localisation.php' => config_path('localisation.php'),
                ],
                'config'
            );

            $this->publishes(
                [
                __DIR__ . '/../database/migrations/create_localisation_tables.php.stub' => $this->getMigrationFileName($filesystem),
                ],
                'migrations'
            );
        }

        $this->commands(
            [
            Commands\CacheReset::class,
            ]
        );

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
     * @param Filesystem $filesystem Filesystem object for file handling.
     *
     * @return string Migration filename.
     */
    protected function getMigrationFileName(Filesystem $filesystem): string
    {
        $timestamp = date('Y_m_d_His', mktime(0, 0, 0, 1, 1, 2020));

        return Collection::make($this->app->databasePath() . DIRECTORY_SEPARATOR . 'migrations' . DIRECTORY_SEPARATOR)
            ->flatMap(
                function ($path) use ($filesystem) {
                    return $filesystem->glob($path . '*_create_localisation_tables.php');
                }
            )->push($this->app->databasePath() . "/migrations/{$timestamp}_create_localisation_tables.php")
            ->first();
    }
}
