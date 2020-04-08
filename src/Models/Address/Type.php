<?php

namespace PWWEB\Localisation\Models\Address;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PWWEB\Localisation\Contracts\Address\Type as AddressTypeContract;

/**
 * PWWEB\Localisation\Models\Address\Type Model.
 *
 * Standard Address Type Model.
 *
 * @package   pwweb/localisation
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @property  \Illuminate\Database\Eloquent\Collection systemAddresses
 * @property  string name
 * @property  boolean global
 */

class Type extends Model implements AddressTypeContract
{
    use SoftDeletes;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * The attributes that should be casted to Carbon dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at'
    ];

    /**
     * The attributes that can be filled.
     *
     * @var array
     */
    public $fillable = [
        'name',
        'global'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'global' => 'boolean'
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'name' => 'string|required',
        'global' => 'boolean|required'
    ];

    /**
     * Constructor.
     *
     * @param array $attributes additional attributes for model initialisation
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('pwweb.localisation.table_names.address_types'));
    }

    /**
     * Accessor for linked model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function addresses()
    {
        return $this->hasMany(\PWWEB\Localisation\Models\Address::class, 'type_id');
    }

    /**
     * Obtain the localised name of a country.
     *
     * @param string $value Original value of the country
     *
     * @return string|array
     */
    public function getNameAttribute($value)
    {
        if (null === $value || '' === $value) {
            return '';
        }

        return __('pwweb::localisation.'.$value);
    }
}
