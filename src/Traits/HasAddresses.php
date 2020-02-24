<?php

namespace PWWeb\Localisation\Traits;

/*
 * PWWeb\Localisation\Traits HasAddresses
 *
 * HasAddresses trait for use with other models.
 *
 * @package   PWWeb\Localisation
 * @author    Frank Pillukeit <clients@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use PWWeb\Localisation\LocalisationRegistrar;
use PWWeb\Localisation\Models\Address;

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
     */
    public function addresses(): MorphToMany
    {
        return $this->morphToMany(
            config('localisation.models.address'),
            'model',
            config('localisation.table_names.model_has_address'),
            config('localisation.column_names.model_morph_key'),
            'address_id'
        );
    }

    /**
     * Assign the given address(es) to the model.
     *
     * @param array|string|\PWWeb\Localisation\Contracts\Address ...$addresses One or multiple addresses to be added to the user.
     *
     * @return $this
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

        //$this->forgetCachedAddresses();

        return $this;
    }

    /**
     * Get a stored address from the cache.
     *
     * @param int|string $address Address to be retrieved from cache
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
