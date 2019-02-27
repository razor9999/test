<?php
namespace App\Http\Requests\Admin;

use App\SocialNetwork;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSocialNetworksRequest extends FormRequest
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
        return SocialNetwork::updateValidation($this);
    }
}
