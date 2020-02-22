<?php

namespace PWWeb\Localisation;

use Illuminate\Cache\CacheManager;
use Illuminate\Support\Collection;

use PWWeb\Localisation\Contracts\Country;
use PWWeb\Localisation\Contracts\Currency;
use PWWeb\Localisation\Contracts\Language;

class LocalisationRegistrar
{
    /** @var \Illuminate\Contracts\Cache\Repository */
    protected $cache;

    /** @var \Illuminate\Cache\CacheManager */
    protected $cacheManager;

    /** @var string */
    protected $countryClass;

    /** @var string */
    protected $currencyClass;

    /** @var string */
    protected $languageClass;

    /** @var \Illuminate\Support\Collection */
    protected $languages;

    /** @var DateInterval|int */
    public static $cacheExpirationTime;

    /** @var string */
    public static $cacheKey;

    /** @var string */
    public static $cacheModelKey;

    /**
     * PermissionRegistrar constructor.
     *
     * @param \Illuminate\Cache\CacheManager $cacheManager
     */
    public function __construct(CacheManager $cacheManager)
    {
        $this->countryClass  = config('localisation.models.country');
        $this->currencyClass = config('localisation.models.currency');
        $this->languageClass = config('localisation.models.language');

        $this->cacheManager = $cacheManager;
        $this->initializeCache();
    }

    protected function initializeCache()
    {
        self::$cacheExpirationTime = config('localisation.cache.expiration_time', config('localisation.cache_expiration_time'));

        self::$cacheKey = config('localisation.cache.key');
        self::$cacheModelKey = config('localisation.cache.model_key');

        $this->cache = $this->getCacheStoreFromConfig();
    }

    protected function getCacheStoreFromConfig(): \Illuminate\Contracts\Cache\Repository
    {
        // the 'default' fallback here is from the localisation.php config file, where 'default' means to use config(cache.default)
        $cacheDriver = config('localisation.cache.store', 'default');

        // when 'default' is specified, no action is required since we already have the default instance
        if ($cacheDriver === 'default') {
            return $this->cacheManager->store();
        }

        // if an undefined cache store is specified, fallback to 'array' which is Laravel's closest equiv to 'none'
        if (! \array_key_exists($cacheDriver, config('cache.stores'))) {
            $cacheDriver = 'array';
        }

        return $this->cacheManager->store($cacheDriver);
    }

    /**
     * Register the languages check method
     *
     * @return bool
     */
    public function registerLanguages(): bool
    {
/*        app(Gate::class)->before(function (Authorizable $user, string $ability) {
            if (method_exists($user, 'checkPermissionTo')) {
                return $user->checkPermissionTo($ability) ?: null;
            }
        });
*/
        return true;
    }

    /**
     * Flush the cache.
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
     */
    public function clearClassLanguages()
    {
        $this->languages = null;
    }

    /**
     * Get the languages based on the passed params.
     *
     * @param array $params
     *
     * @return \Illuminate\Support\Collection
     */
    public function getLanguages(array $params = []): Collection
    {
        if ($this->languages === null) {
            $this->languages = $this->cache->remember(self::$cacheKey, self::$cacheExpirationTime, function () {
                return $this->getLanguageClass()
                    //->with('countries')
                    ->get();
            });
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

    public function setLanguageClass($languageClass)
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