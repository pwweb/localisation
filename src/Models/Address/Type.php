<?php

namespace PWWEB\Localisation\Models\Address;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use PWWEB\Core\Traits\Migratable;
use PWWEB\Localisation\Contracts\Address\Type as AddressTypeContract;

/**
 * PWWEB\Localisation\Models\Address\Type Model.
 *
 * Standard Address Type Model.
 *
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @property  \Illuminate\Database\Eloquent\Collection addresses
 * @property  string name
 * @property  bool global
 */
class Type extends Model implements AddressTypeContract
{
    use Migratable;
    use SoftDeletes;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * The attributes that should be casted to Carbon dates.
     *
     * @var string[]
     */
    protected $dates = [
        'deleted_at',
    ];

    /**
     * The attributes that can be filled.
     *
     * @var string[]
     */
    public $fillable = [
        'name',
        'global',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'global' => 'boolean',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'name' => 'string|required',
        'global' => 'boolean|required',
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
     * Accessor for linked Address model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function addresses(): HasMany
    {
        return $this->hasMany(config('pwweb.localisation.models.address'), 'type_id');
    }

    /**
     * Obtain the localised name of a country.
     *
     * @param string $value Original value of the country
     *
     * @return string|array|null
     */
    public function getNameAttribute($value)
    {
        if (null === $value || '' === $value) {
            return '';
        }

        return __('pwweb::localisation.'.$value);
    }
}
