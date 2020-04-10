<?php

namespace PWWEB\Localisation\Repositories;

use App\Repositories\BaseRepository;
use PWWEB\Localisation\Models\Address;

/**
 * PWWEB\Localisation\Repositories\AddressRepository AddressRepository.
 *
 * The repository for Address.
 * Class AddressRepository
 *
 * @package   pwweb/localisation
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */
class AddressRepository extends BaseRepository
{
    /**
     * Fields that can be searched by.
     *
     * @var array
     */
    protected $fieldSearchable = [
        'country_id',
        'type_id',
        'street',
        'street2',
        'city',
        'state',
        'postcode',
        'lat',
        'lng',
        'primary'
    ];

    /**
     * Return searchable fields.
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model.
     *
     * @return string
     **/
    public function model()
    {
        return Address::class;
    }
}
