<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 *
 * @package App
 * @property string $name
 * @property string $description
*/
class Category extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['name', 'description'];
    

    public static function storeValidation($request)
    {
        return [
            'name' => 'max:191|required',
            'description' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'name' => 'max:191|required',
            'description' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
