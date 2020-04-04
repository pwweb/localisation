<?php

/**
 * PWWeb\Localisation\Models\Country Model.
 *
 * Standard Country Model.
 *
 * @author    Frank Pillukeit <clients@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace PWWeb\Localisation\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PWWeb\Localisation\Contracts\Country as CountryContract;

class Country extends Model implements CountryContract
{
    /**
     * Constructor.
     *
     * @param array $attributes additional attributes for model initialisation
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('localisation.table_names.countries'));
    }

    /**
     * A country can have multiple languages.
     *
     * @return HasMany collection of languages used in the country
     */
    public function languages(): HasMany
    {
        return $this->hasMany(
            config('localisation.models.languages'),
            config('localisation.table_names.country_has_language'),
            'country_id',
            'language_id'
        );
    }

    public function getNameAttribute($value)
    {
        if (null === $value || '' === $value) {
            return '';
        }

        return __('pwweb::localization.'.$value);
    }
}
