<?php

namespace PWWEB\Localisation\Models\Tax;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use PWWEB\Core\Traits\Migratable;

/**
 * PWWEB\Localisation\Models\Tax\Rate Model.
 *
 * Standard Rate Model.
 *
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @property  number rate
 * @property  string name
 * @property  bool compound
 * @property  bool shipping
 * @property  int type
 */
class Rate extends Model
{
    use Migratable;
    use SoftDeletes;

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
        'rate',
        'name',
        'compound',
        'shipping',
        'type',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'rate' => 'float',
        'name' => 'string',
        'compound' => 'boolean',
        'shipping' => 'boolean',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'rate' => 'required',
        'name' => 'required',
        'type' => 'required',
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

        $this->setTable(config('pwweb.localisation.table_names.tax.rates'));
    }

    /**
     * Accessor for linked Location model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function country(): HasMany
    {
        return $this->hasMany(config('pwweb.localisation.table_names.tax.location'), 'rate_id');
    }
}
