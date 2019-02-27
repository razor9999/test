<?php
namespace App\Http\Requests\Admin;

use App\Influencer;
use Illuminate\Foundation\Http\FormRequest;

class StoreInfluencersRequest extends FormRequest
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
        return Influencer::storeValidation($this);
    }
}
