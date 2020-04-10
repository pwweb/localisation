<?php

namespace PWWEB\Localisation\Models;

use Eloquent as Model;
use PWWEB\Localisation\Contracts\Currency as CurrencyContract;

/**
 * App\Models\Pwweb\Localisation\Models\Currency Model.
 *
 * Standard Currency Model.
 *
 * @package   pwweb/localisation
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @property  string name
 * @property  string iso
 * @property  integer numeric_code
 * @property  string entity_code
 * @property  boolean active
 * @property  boolean standard
 */

class Currency extends Model implements CurrencyContract
{
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
        'numeric_code',
        'entity_code',
        'active',
        'standard'
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
        'numeric_code' => 'integer',
        'entity_code' => 'string',
        'active' => 'boolean',
        'standard' => 'boolean'
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'iso' => 'required',
        'numeric_code' => 'required',
        'entity_code' => 'required',
        'active' => 'required',
        'standard' => 'required'
    ];

    /**
     * Constructor.
     *
     * @param array $attributes additional attributes for model initialisation
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('pwweb.localisation.table_names.currencies'));
    }
}
