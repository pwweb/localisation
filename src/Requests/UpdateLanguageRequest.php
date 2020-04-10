<?php

namespace PWWEB\Localisation\Requests;

use Illuminate\Foundation\Http\FormRequest;
use PWWEB\Localisation\Models\Language;

/**
 * PWWEB\Localisation\Requests\UpdateLanguageRequest UpdateLanguageRequest.
 *
 * The update request class for the Language
 * Class UpdateLanguageRequest
 *
 * @package   pwweb/localisation
 * @author    Frank Pillukeit <frank.pillukeit@pw-websolutions.com>
 * @author    Richard Browne <richard.browne@pw-websolutions.com
 * @copyright 2020 pw-websolutions.com
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 */
class UpdateLanguageRequest extends FormRequest
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
        return Language::$rules;
    }
}
