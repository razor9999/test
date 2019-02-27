<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class CompanySize
 *
 * @package App
 * @property string $text
 * @property integer $min
 * @property string $max
*/
class CompanySize extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['text', 'min', 'max'];
    

    public static function storeValidation($request)
    {
        return [
            'text' => 'max:191|required',
            'min' => 'integer|max:4294967295|required',
            'max' => 'max:191|required'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'text' => 'max:191|required',
            'min' => 'integer|max:4294967295|required',
            'max' => 'max:191|required'
        ];
    }

    

    
    
    
}
