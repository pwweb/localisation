<?php

namespace PWWEB\Localisation\Requests\Tax;

use Illuminate\Foundation\Http\FormRequest;
use PWWEB\Localisation\Models\Tax\Rate;

/**
 * PWWEB\Localisation\Requests\Tax\UpdateRateRequest UpdateRateRequest.
 *
 * The update request class for the Tax Rate
 * Class UpdateRateRequest
 *
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com>
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */
class UpdateRateRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = Rate::$rules;

        return $rules;
    }
}
