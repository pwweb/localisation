<?php

namespace PWWEB\Localisation\Repositories\Tax;

use PWWEB\Core\Repositories\BaseRepository;
use PWWEB\Localisation\Models\Tax\Rate;

/**
 * PWWEB\Localisation\Repositories\Tax\RateRepository RateRepository.
 *
 * The repository for Rate.
 * Class RateRepository
 *
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */
class RateRepository extends BaseRepository
{
    /**
     * Fields that can be searched by.
     *
     * @var array
     */
    protected $fieldSearchable = [
        'rate',
        'name',
        'compound',
        'shipping',
        'type',
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
     * @return \PWWEB\Localisation\Models\Tax\Rate
     **/
    public function model()
    {
        return Rate::class;
    }
}
