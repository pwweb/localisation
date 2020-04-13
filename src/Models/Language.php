<?php

namespace PWWEB\Localisation\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use PWWEB\Core\Traits\Migratable;
use PWWEB\Localisation\Contracts\Language as LanguageContract;

/**
 * App\Models\Pwweb\Localisation\Models\Language Model.
 *
 * Standard Language Model.
 *
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @property  \Illuminate\Database\Eloquent\Collection countries
 * @property  string name
 * @property  string locale
 * @property  string abbreviation
 * @property  bool installed
 * @property  bool active
 * @property  bool standard
 */
class Language extends Model implements LanguageContract
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
        'locale',
        'abbreviation',
        'installed',
        'active',
        'standard',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'locale' => 'string',
        'abbreviation' => 'string',
        'installed' => 'boolean',
        'active' => 'boolean',
        'standard' => 'boolean',
    ];

    /**
     * Validation rules.
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'locale' => 'required',
        'abbreviation' => 'required',
        'installed' => 'required',
        'active' => 'required',
        'standard' => 'required',
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

        $this->setTable(config('pwweb.localisation.table_names.languages'));
    }

    /**
     * Accessor for linked Country model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function countries(): BelongsToMany
    {
        return $this->belongsToMany(\PWWEB\Localisation\Models\Country::class, 'system_localisation_country_languages');
    }
}
