<?php

/*
 * PWWeb\Localisation\Models\Address Model
 *
 * Standard Address Model.
 *
 * @package   PWWeb\Localisation
 * @author    Frank Pillukeit <clients@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace PWWeb\Localisation\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use PWWeb\Localisation\Contracts\Address as AddressContract;
use PWWeb\Localisation\LocalisationRegistrar;
use PWWeb\Localisation\Models\Address\Type;

class Address extends Model implements AddressContract
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'street', 'street2', 'city', 'state', 'postcode', 'country_id', 'type_id', 'lat', 'lng',
    ];

    /**
     * Constructor.
     *
     * @param array $attributes additional attributes for model initialisation
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('localisation.table_names.addresses'));
    }

    /**
     * An address can be of only one type (e.g. private, work, etc).
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(Address\Type::class);
    }

    /**
     * An address belongs to a country.
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Find an address by its id.
     *
     * @param int $id ID to be used to retrieve the address
     *
     * @throws \PWWeb\Localisation\Exceptions\AddressDoesNotExist
     */
    public static function findById(int $id): AddressContract
    {
        $address = static::getAddresses(['id' => $id])->first();

        if (null === $address) {
            throw AddressDoesNotExist::withId($id);
        }

        return $address;
    }

    /**
     * Get the current cached addresses.
     *
     * @param array $params additional parameters for the database query
     *
     * @return Collection collection of addresses
     */
    protected static function getAddresses(array $params = []): Collection
    {
        return app(LocalisationRegistrar::class)
            ->setAddressClass(static::class)
            ->getAddresses($params);
    }
}
