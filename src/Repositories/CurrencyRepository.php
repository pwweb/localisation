<?php

namespace PWWEB\Localisation\Repositories;

use App\Repositories\BaseRepository;
use PWWEB\Localisation\Models\Currency;

/**
 * PWWEB\Localisation\Repositories\CurrencyRepository CurrencyRepository.
 *
 * The repository for Currency.
 * Class CurrencyRepository
 *
 * @package   pwweb/localisation
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
*/
class CurrencyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'iso',
        'numeric_code',
        'entity_code',
        'active',
        'standard'
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
        return Currency::class;
    }
}
