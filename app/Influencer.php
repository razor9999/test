<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Influencer
 *
 * @package App
 * @property string $name
 * @property string $email
 * @property string $nick_name
 * @property string $phone
 * @property integer $interactive
*/
class Influencer extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['name', 'email', 'nick_name', 'phone', 'interactive'];
    

    public static function storeValidation($request)
    {
        return [
            'name' => 'max:191|nullable',
            'email' => 'max:191|required|unique:influencers,email',
            'nick_name' => 'max:191|nullable',
            'phone' => 'max:191|nullable',
            'interactive' => 'integer|max:2147483647|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'name' => 'max:191|nullable',
            'email' => 'max:191|required|unique:influencers,email,'.$request->route('influencer'),
            'nick_name' => 'max:191|nullable',
            'phone' => 'max:191|nullable',
            'interactive' => 'integer|max:2147483647|nullable'
        ];
    }

    

    
    
    
}
