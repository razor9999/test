<?php
namespace App\Http\Requests\Admin;

use App\Suggestion;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSuggestionsRequest extends FormRequest
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
        return Suggestion::updateValidation($this);
    }
}
