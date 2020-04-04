<?php

/**
 * PWWEB\Localisation.
 *
 * Localisation Registrar.
 *
 * @author    Frank Pillukeit <clients@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace PWWEB\Localisation;

use Illuminate\Cache\CacheManager;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Support\Collection;
use PWWeb\Localisation\Contracts\Address;
use PWWeb\Localisation\Contracts\Address\Type as AddressType;
use PWWeb\Localisation\Contracts\Country;
use PWWeb\Localisation\Contracts\Currency;
use PWWeb\Localisation\Contracts\Language;

class LocalisationRegistrar
{
    /**
     * The cache repository.
     *
     * @var Repository
     */
    protected $cache;

    /**
     * The cache manager object.
     *
     * @var \Illuminate\Cache\CacheManager
     */
    protected $cacheManager;

    /**
     * The address class used for the package.
     * Can be either original value or overwritten for custom use.
     *
     * @var string
     */
    protected $addressClass;

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
     * The set of addresses available in the cache.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $addresses;

    /**
     * The set of languages available in the cache.
     *
     * @var \Illuminate\Support\Collection
     */
    protected $languages;

    /**
     * The cache expiration time.
     *
     * @var DateInterval|int
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
        $this->addressClass = config('pwweb.localisation.models.address');
        $this->addressTypeClass = config('pwweb.localisation.models.address_type');
        $this->countryClass = config('pwweb.localisation.models.country');
        $this->currencyClass = config('pwweb.localisation.models.currency');
        $this->languageClass = config('pwweb.localisation.models.language');

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
        self::$cacheExpirationTime = config('pwweb.localisation.cache.expiration_time', config('pwweb.localisation.cache_expiration_time'));

        self::$cacheKey = config('pwweb.localisation.cache.key');
        self::$cacheModelKey = config('pwweb.localisation.cache.model_key');

        $this->cache = $this->getCacheStoreFromConfig();
    }

    /**
     * Retrieve the cache store from the configuration of the package.
     *
     * @return Repository Cache store
     */
    protected function getCacheStoreFromConfig(): Repository
    {
        // the 'default' fallback here is from the localisation.php config file, where 'default' means to use config(cache.default)
        $cacheDriver = config('pwweb.localisation.cache.store', 'default');

        // when 'default' is specified, no action is required since we already have the default instance
        if ('default' === $cacheDriver) {
            return $this->cacheManager->store();
        }

        // if an undefined cache store is specified, fallback to 'array' which is Laravel's closest equiv to 'none'
        if (false === \array_key_exists($cacheDriver, config('cache.stores'))) {
            $cacheDriver = 'array';
        }

        return $this->cacheManager->store($cacheDriver);
    }

    /**
     * Register the languages check method.
     */
    public function registerLanguages(): bool
    {
        return true;
    }

    /**
     * Flush the cache.
     *
     * @return bool
     */
    public function forgetCachedAddresses()
    {
        $this->addresses = null;

        return $this->cache->forget(self::$cacheKey);
    }

    /**
     * Flush the cache.
     *
     * @return bool
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
     * Get the addresses based on the passed params.
     *
     * @param array $params additional parameters for query
     */
    public function getAddresses(array $params = []): Collection
    {
        if (null === $this->addresses) {
            $this->addresses = $this->cache->remember(
                self::$cacheKey.'.addresses',
                self::$cacheExpirationTime,
                function () {
                    return $this->getAddressClass()
                        //->with('system_address_types')
                        ->get();
                }
            );
        }

        $addresses = clone $this->addresses;

        foreach ($params as $attr => $value) {
            $attr = 'type' === $attr ? 'type.name' : $attr;
            $addresses = $addresses->where($attr, $value);
        }

        return $addresses;
    }

    /**
     * Get the languages based on the passed params.
     *
     * @param array $params additional parameters for query
     */
    public function getLanguages(array $params = []): Collection
    {
        if (null === $this->languages) {
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
     * Get an instance of the address class.
     *
     * @return PWWeb\Localisation\Contract\Address
     */
    public function getAddressClass(): Address
    {
        return app($this->addressClass);
    }

    /**
     * Get an instance of the address class.
     *
     * @return PWWeb\Localisation\Contract\Address\Type
     */
    public function getAddressTypeClass(): AddressType
    {
        return app($this->addressTypeClass);
    }

    /**
     * Get an instance of the country class.
     *
     * @return PWWeb\Localisation\Contract\Country
     */
    public function getCountryClass(): Country
    {
        return app($this->countryClass);
    }

    /**
     * Get an instance of the currency class.
     *
     * @return PWWeb\Localisation\Contract\Currency
     */
    public function getCurrencyClass(): Currency
    {
        return app($this->currencyClass);
    }

    /**
     * Get an instance of the language class.
     *
     * @return PWWeb\Localisation\Contract\Language
     */
    public function getLanguageClass(): Language
    {
        return app($this->languageClass);
    }

    /**
     * Set the instance of the address class.
     *
     * @param string $addressClass the address class to be used
     *
     * @return object
     */
    public function setAddressClass(string $addressClass)
    {
        $this->addressClass = $addressClass;

        return $this;
    }

    /**
     * Set the instance of the language class.
     *
     * @param string $languageClass the language class to be used
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
     */
    public function getCacheStore(): \Illuminate\Contracts\Cache\Store
    {
        return $this->cache->getStore();
    }
}
