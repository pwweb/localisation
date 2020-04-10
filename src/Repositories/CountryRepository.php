<?php

namespace PWWEB\Localisation\Repositories;

use App\Repositories\BaseRepository;
use PWWEB\Localisation\Models\Country;

/**
 * PWWEB\Localisation\Repositories\CountryRepository CountryRepository.
 *
 * The repository for Country.
 * Class CountryRepository
 *
 * @package   pwweb/localisation
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
*/
class CountryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'iso',
        'ioc',
        'active'
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
     **/
    public function model()
    {
        return Country::class;
    }
}
