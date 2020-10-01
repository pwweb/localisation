<?php

namespace PWWEB\Localisation\Repositories\Tax;

use PWWEB\Core\Repositories\BaseRepository;
use PWWEB\Localisation\Models\Tax\Location;

/**
 * PWWEB\Localisation\Repositories\Tax\LocationRepository LocationRepository.
 *
 * The repository for Location.
 * Class LocationRepository
 *
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */
class LocationRepository extends BaseRepository
{
    /**
     * Fields that can be searched by.
     *
     * @var array
     */
    protected $fieldSearchable = [
        'country_id',
        'tax_rate_id',
        'state',
        'city',
        'zip',
        'order',
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
     * @return \PWWEB\Localisation\Models\Tax\Location
     **/
    public function model()
    {
        return config('pwweb.localisation.models.tax.location');
    }
}
