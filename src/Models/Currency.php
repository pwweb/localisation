<?php

/**
 * PWWeb\Localisation\Models\Currency Model
 *
 * Standard Currency Model.
 *
 * @package   PWWeb\Localisation
 * @author    Frank Pillukeit <clients@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace PWWeb\Localisation\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use PWWeb\Localisation\Contracts\Currency as CountryContract;

class Currency extends Model implements CountryContract
{
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->setTable(config('localisation.table_names.currencies'));
    }
}
