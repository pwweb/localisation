<?php

namespace PWWEB\Localisation\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PWWEB\Core\Traits\Migratable;

/**
 * App\Models\Pwweb\Localisation\Models\Country Model.
 *
 * Standard Country Model.
 *
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @property  \Illuminate\Database\Eloquent\Collection addresses
 * @property  \Illuminate\Database\Eloquent\Collection languages
 * @property  string name
 * @property  string iso
 * @property  string ioc
 * @property  bool active
 */
class Country extends Model
{
    use Migratable;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * The attributes that can be filled.
     *
     * @var string[]
     */
    public $fillable = [
        'name',
        'iso',
        'ioc',
        'active',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'iso' => 'string',
        'ioc' => 'string',
        'active' => 'boolean',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'iso' => 'required',
        'active' => 'required',
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

        $this->setTable(config('pwweb.localisation.table_names.countries'));
    }

    /**
     * Accessor for linked Address model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function addresses(): HasMany
    {
        return $this->hasMany(config('pwweb.localisation.models.address'), 'country_id');
    }

    /**
     * Accessor for linked Language model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function languages(): BelongsToMany
    {
        return $this->belongsToMany(config('pwweb.localisation.models.language'), 'system_localisation_country_languages');
    }

    /**
     * Obtain a localised country name.
     *
     * @param string $value Original value.
     *
     * @return string|array Localised country name.
     */
    public function getNameAttribute($value)
    {
        if (null === $value || '' === $value) {
            return '';
        }

        return __('pwweb::localisation.'.$value);
    }
}
