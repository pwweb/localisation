<?php

namespace PWWEB\Localisation\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * PWWEB\Localisation\Models\Address Model.
 *
 * Standard Address Model.
 *
 * @package   pwweb/localisation
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @property  \PWWEB\Localisation\Models\SystemLocalisationCountry country
 * @property  \PWWEB\Localisation\Models\SystemAddressType type
 * @property  \PWWEB\Localisation\Models\SystemModelHasAddress systemModelHasAddress
 * @property  integer country_id
 * @property  integer type_id
 * @property  string street
 * @property  string street2
 * @property  string city
 * @property  string state
 * @property  string postcode
 * @property  number lat
 * @property  number lng
 * @property  boolean primary
 */

class Address extends Model
{
    use SoftDeletes;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * The attributes that should be casted to Carbon dates.
     *
     * @var string[]
     */
    protected $dates = [
        'deleted_at'
    ];

    /**
     * The attributes that can be filled.
     *
     * @var string[]
     */
    public $fillable = [
        'country_id',
        'type_id',
        'street',
        'street2',
        'city',
        'state',
        'postcode',
        'lat',
        'lng',
        'primary'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'country_id' => 'integer',
        'type_id' => 'integer',
        'street' => 'string',
        'street2' => 'string',
        'city' => 'string',
        'state' => 'string',
        'postcode' => 'string',
        'lat' => 'float',
        'lng' => 'float',
        'primary' => 'boolean'
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'country_id' => 'required',
        'type_id' => 'required',
        'primary' => 'required'
    ];

    /**
     * Constructor.
     *
     * @param array $attributes additional attributes for model initialisation
     *
     * @return void
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('pwweb.localisation.table_names.addresses'));
    }

    /**
     * Accessor for linked Country model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function country()
    {
        return $this->belongsTo(\PWWEB\Localisation\Models\Country::class, 'country_id');
    }

    /**
     * Accessor for linked Address type model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function type()
    {
        return $this->belongsTo(\PWWEB\Localisation\Models\Address\Type::class, 'type_id');
    }

    /**
     * Find an address by its id.
     *
     * @param int $id ID to be used to retrieve the address
     *
     * @todo Refactor. This needs to go into the repository.
     *
     * @throws \PWWEB\Localisation\Exceptions\AddressDoesNotExist
     *
     * @return \PWWEB\Localisation\Contracts\Address
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
     * Find an address by its type.
     *
     * @param string $type Address type to be used to retrieve the address
     *
     * @todo Refactor. This needs to go into the repository.
     *
     * @throws \PWWEB\Localisation\Exceptions\AddressDoesNotExist
     *
     * @return \PWWEB\Localisation\Contracts\Address
     */
    public static function findByType(string $type): AddressContract
    {
        $address = static::getAddresses(['type' => $type])->first();

        if (null === $address) {
            throw AddressDoesNotExist::withType($type);
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
