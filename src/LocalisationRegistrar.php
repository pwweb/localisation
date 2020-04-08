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
use PWWEB\Localisation\Contracts\Address as AddressContract;
use PWWEB\Localisation\Contracts\Address\Type as AddressTypeContract;
use PWWEB\Localisation\Contracts\Country as CountryContract;
use PWWEB\Localisation\Contracts\Currency as CurrencyContract;
use PWWEB\Localisation\Contracts\Language as LanguageContract;

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
     * The address type class used for the package.
     * Can be either original value or overwritten for custom use.
     *
     * @var string
     */
    protected $addressTypeClass;

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
     *
     * @return bool
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
     *
     * @return \Illuminate\Support\Collection
     */
    public function getAddresses(array $params = []): Collection
    {
        if (null === $this->addresses) {
            $this->addresses = $this->cache->remember(
                self::$cacheKey.'.addresses',
                self::$cacheExpirationTime,
                function () {
                    return $this->getAddressModel()
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
     *
     * @return \Illuminate\Support\Collection
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
     * @return AddressContract|null
     */
    public function getAddressModel(): AddressContract
    {
        $addressModel = app($this->addressClass);

        if ($addressModel instanceof AddressContract) {
            return $addressModel;
        }

        return null;
    }

    /**
     * Get an instance of the address type class.
     *
     * @return \PWWEB\Localisation\Contract\Address\Type|null
     */
    public function getAddressTypeClass(): AddressTypeContract
    {
        $addressTypeModel = app($this->addressTypeClass);

        if ($addressTypeModel instanceof AddressTypeContract) {
            return $addressTypeModel;
        }

        return null;
    }

    /**
     * Get an instance of the country class.
     *
     * @return \PWWEB\Localisation\Contract\Country|null
     */
    public function getCountryClass(): CountryContract
    {
        $countryModel = app($this->countryClass);

        if ($countryModel instanceof CountryContract) {
            return $countryModel;
        }

        return null;
    }

    /**
     * Get an instance of the currency class.
     *
     * @return \PWWEB\Localisation\Contract\Currency|null
     */
    public function getCurrencyClass(): CurrencyContract
    {
        $currencyModel = app($this->currencyClass);

        if ($currencyModel instanceof CurrencyContract) {
            return $currencyModel;
        }

        return null;
    }

    /**
     * Get an instance of the language class.
     *
     * @return \PWWEB\Localisation\Contract\Language|null
     */
    public function getLanguageClass(): LanguageContract
    {
        $languageModel = app($this->languageClass);

        if ($languageModel instanceof LanguageContract) {
            return $languageModel;
        }

        return null;
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
     *
     * @return \Illuminate\Contracts\Cache\Store
     */
    public function getCacheStore(): \Illuminate\Contracts\Cache\Store
    {
        return $this->cache->getStore();
    }
}
