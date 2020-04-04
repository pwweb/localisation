<?php

/**
 * PWWEB\Localisation\Traits HasAddresses.
 *
 * HasAddresses trait for use with other models.
 *
 * @author    Frank Pillukeit <clients@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace PWWEB\Localisation\Traits;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use PWWEB\Localisation\LocalisationRegistrar;
use PWWEB\Localisation\Models\Address;

trait HasAddresses
{
    /**
     * Address class.
     *
     * @var string
     */
    private $addressClass;

    /**
     * Retrieve and return the address class to be used.
     *
     * @return string
     */
    public function getAddressClass(): string
    {
        if (false === isset($this->addressClass)) {
            $this->addressClass = app(LocalisationRegistrar::class)->getAddressClass();
        }

        return $this->addressClass;
    }

    /**
     * A model may have multiple addresses.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function addresses(): MorphToMany
    {
        return $this->morphToMany(
            config('pwweb.localisation.models.address'),
            'model',
            config('pwweb.localisation.table_names.model_has_address'),
            config('pwweb.localisation.column_names.model_morph_key'),
            'address_id'
        );
    }

    /**
     * Assign the given address(es) to the model.
     *
     * @param array|string|\PWWeb\Localisation\Contracts\Address ...$addresses One or multiple addresses to be added to the user.
     *
     * @return mixed
     */
    public function assignAddress(...$addresses)
    {
        $addresses = collect($addresses)
            ->flatten()
            ->map(
                function ($address) {
                    if (true === empty($address)) {
                        return false;
                    }

                    return $this->getStoredAddress($address);
                }
            )
            ->filter(
                function ($address) {
                    return $address instanceof Address;
                }
            )
            ->map->id
            ->all();

        $model = $this->getModel();

        if (true === $model->exists) {
            $this->addresses()->sync($addresses, false);
            $model->load('addresses');
        } else {
            $class = \get_class($model);

            $class::saved(
                function ($object) use ($addresses, $model) {
                    static $modelLastFiredOn;
                    if (null !== $modelLastFiredOn && $modelLastFiredOn === $model) {
                        return;
                    }
                    $object->addresses()->sync($addresses, false);
                    $object->load('addresses');
                    $modelLastFiredOn = $object;
                }
            );
        }

        // TEMP: $this->forgetCachedAddresses();

        return $this;
    }

    /**
     * Get a stored address from the cache.
     *
     * @param int|string $address Address to be retrieved from cache
     *
     * @return \PWWeb\Localisation\Contracts\Address
     */
    protected function getStoredAddress($address): Address
    {
        $addressClass = $this->getAddressClass();

        if (true === is_numeric($address)) {
            return $addressClass->findById($address);
        }

        if (true === is_string($address)) {
            return $addressClass->findByName($address);
        }

        return $address;
    }
}
