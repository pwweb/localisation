<?php

namespace PWWEB\Localisation\Models\Tax;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use PWWEB\Core\Traits\Migratable;

/**
 * PWWEB\Localisation\Models\Tax\Location Model.
 *
 * Standard Location Model.
 *
 * @author   Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @property  \PWWEB\Localisation\Models\SystemLocalisationCountry country
 * @property PWWEB\Localisation\Models\Tax\Rate $taxRate
 * @property foreignId $country_id
 * @property foreignId $tax_rate_id
 * @property string $state
 * @property string $city
 * @property string $zip
 * @property unsignedTinyInteger $order
 */
class Location extends Model
{
    use Migratable;
    use SoftDeletes;

    /**
     * The attributes that should be casted to Carbon dates.
     *
     * @var string[]
     */
    protected $dates = ['deleted_at'];


    /**
     * The attributes that can be filled.
     *
     * @var string[]
     */
    public $fillable = [
        'country_id',
        'tax_rate_id',
        'state',
        'city',
        'zip',
        'order'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'state' => 'string',
        'city' => 'string',
        'zip' => 'string'
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'country_id' => 'required',
        'tax_rate_id' => 'required',
        'order' => 'required'
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

        $this->setTable(config('pwweb.localisation.table_names.tax.locations'));
    }

    /**
     * Accessor for linked Country model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function country(): BelongsTo
    {
        return $this->belongsTo(\PWWEB\Localisation\Models\Country::class, 'country_id');
    }

    /**
     * Accessor for linked Tax Rate model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function rate(): BelongsTo
    {
        return $this->belongsTo(\PWWEB\Localisation\Models\Tax\Rate::class, 'tax_rate_id');
    }
}
