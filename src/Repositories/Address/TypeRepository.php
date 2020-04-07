<?php

namespace PWWEB\Localisation\Repositories\Address;

use App\Repositories\BaseRepository;
use PWWEB\Localisation\Models\Address\Type;

/**
 * PWWEB\Localisation\Repositories\Address\TypeRepository TypeRepository.
 *
 * The repository for Address Type.
 * Class TypeRepository
 *
 * @package   pwweb/localisation
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */
class TypeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'global'
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
        return Type::class;
    }
}
