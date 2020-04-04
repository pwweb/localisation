<?php

/*
 * PWWEB\Localisation\Models\Address\Type Model
 *
 * Standard Address Type Model.
 *
 * @author    Frank Pillukeit <clients@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */

namespace PWWEB\Localisation\Models\Address;

use Illuminate\Database\Eloquent\Model;
use PWWEB\Localisation\Contracts\Address\Type as AddressTypeContract;

class Type extends Model implements AddressTypeContract
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
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

    public function getNameAttribute($value)
    {
        if (null === $value || '' === $value) {
            return '';
        }

        return __('pwweb::localization.'.$value);
    }
}
