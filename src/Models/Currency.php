<?php

/**
 * PWWEB\Localisation\Models\Currency Model.
 *
 * Standard Currency Model.
 *
 * @author    Frank Pillukeit <clients@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace PWWEB\Localisation\Models;

use Illuminate\Database\Eloquent\Model;
use PWWEB\Localisation\Contracts\Currency as CountryContract;

class Currency extends Model implements CountryContract
{
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
