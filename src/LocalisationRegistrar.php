<?php

/**
 * PWWeb\Localisation
 *
 * Localisation Registrar.
 *
 * @package   PWWeb\Localisation
 * @author    Frank Pillukeit <clients@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace PWWeb\Localisation;

use Illuminate\Cache\CacheManager;
use Illuminate\Support\Collection;

use PWWeb\Localisation\Contracts\Country;
use PWWeb\Localisation\Contracts\Currency;
use PWWeb\Localisation\Contracts\Language;

class LocalisationRegistrar
{
    /**
     * The cache repository.
     *
     * @var \Illuminate\Contracts\Cache\Repository
     */
    protected $cache;

    /**
     * The cache manager object.
     *
     * @var \Illuminate\Cache\CacheManager
     */
    protected $cacheManager;

    /**
     * The country class used for the package.
     * Can be either original value or overwritten for custom use.
     *
     * @var string
     */
    protected $countryClass;

    /**
     * The currency class used for the package.
     * Can be either original value or overwritten for custom use.
     *
     * @var string
     */
    protected $currencyClass;

    /**
     * The language class used for the package.
     * Can be either original value or overwritten for custom use.
     *
     * @var string
     */
    protected $languageClass;

    /**
     * The set of languages available in the cache.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $languages;

    /**
     * The cache expiration time.
     *
     * @var DateInterval|integer
     */
    public static $cacheExpirationTime;

    /**
     * The cache key.
     *
     * @var string
     */
    public static $cacheKey;

    /**
     * The cache model key.
     *
     * @var string
     */
    public static $cacheModelKey;

    /**
     * PermissionRegistrar constructor.
     *
     * @param \Illuminate\Cache\CacheManager $cacheManager The cache manager object
     */
    public function __construct(CacheManager $cacheManager)
    {
        $this->countryClass  = config('localisation.models.country');
        $this->currencyClass = config('localisation.models.currency');
        $this->languageClass = config('localisation.models.language');

        $this->cacheManager = $cacheManager;
        $this->initializeCache();
    }

    /**
     * Initialize the cache for the package.
     *
     * @return void
     */
    protected function initializeCache()
    {
        self::$cacheExpirationTime = config('localisation.cache.expiration_time', config('localisation.cache_expiration_time'));

        self::$cacheKey = config('localisation.cache.key');
        self::$cacheModelKey = config('localisation.cache.model_key');

        $this->cache = $this->getCacheStoreFromConfig();
    }

    /**
     * Retrieve the cache store from the configuration of the package.
     *
     * @return IlluminateContractsCacheRepository [description]
     */
    protected function getCacheStoreFromConfig(): \Illuminate\Contracts\Cache\Repository
    {
        // the 'default' fallback here is from the localisation.php config file, where 'default' means to use config(cache.default)
        $cacheDriver = config('localisation.cache.store', 'default');

        // when 'default' is specified, no action is required since we already have the default instance
        if ($cacheDriver === 'default') {
            return $this->cacheManager->store();
        }

        // if an undefined cache store is specified, fallback to 'array' which is Laravel's closest equiv to 'none'
        if (\array_key_exists($cacheDriver, config('cache.stores')) === false) {
            $cacheDriver = 'array';
        }

        return $this->cacheManager->store($cacheDriver);
    }

    /**
     * Register the languages check method
     *
     * @return boolean
     */
    public function registerLanguages(): bool
    {
        return true;
    }

    /**
     * Flush the cache.
     *
     * @return boolean
     */
    public function forgetCachedLanguages()
    {
        $this->languages = null;

        return $this->cache->forget(self::$cacheKey);
    }

    /**
     * Clear class languages.
     * This is only intended to be called by the LocalisationServiceProvider on boot,
     * so that long-running instances like Swoole don't keep old data in memory.
     *
     * @return void
     */
    public function clearClassLanguages()
    {
        $this->languages = null;
    }

    /**
     * Get the languages based on the passed params.
     *
     * @param array $params Additional parameters for query.
     *
     * @return \Illuminate\Support\Collection
     */
    public function getLanguages(array $params = []): Collection
    {
        if ($this->languages === null) {
            $this->languages = $this->cache->remember(
                self::$cacheKey,
                self::$cacheExpirationTime,
                function () {
                    return $this->getLanguageClass()
                    //->with('countries')
                        ->get();
                }
            );
        }

        $languages = clone $this->languages;

        foreach ($params as $attr => $value) {
            $languages = $languages->where($attr, $value);
        }

        return $languages;
    }

    /**
     * Get an instance of the country class.
     *
     * @return \PWWeb\Localisation\Contracts\Country
     */
    public function getCountryClass(): Country
    {
        return app($this->countryClass);
    }

    /**
     * Get an instance of the currency class.
     *
     * @return \PWWeb\Localisation\Contracts\Currency
     */
    public function getCurrencyClass(): Currency
    {
        return app($this->currencyClass);
    }

    /**
     * Get an instance of the language class.
     *
     * @return \PWWeb\Localisation\Contracts\Language
     */
    public function getLanguageClass(): Language
    {
        return app($this->languageClass);
    }

    /**
     * Set the instance of the language class.
     *
     * @param string $languageClass The language class to be used.
     *
     * @return object
     */
    public function setLanguageClass(string $languageClass)
    {
        $this->languageClass = $languageClass;

        return $this;
    }

    /**
     * Get the instance of the Cache Store.
     *
     * @return \Illuminate\Contracts\Cache\Store
     */
    public function getCacheStore(): \Illuminate\Contracts\Cache\Store
    {
        return $this->cache->getStore();
    }
}
