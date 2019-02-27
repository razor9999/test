<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Interesting
 *
 * @package App
 * @property string $name
 * @property string $description
 * @property string $hashtag
*/
class Interesting extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['name', 'description', 'hashtag'];
    

    public static function storeValidation($request)
    {
        return [
            'name' => 'max:191|nullable',
            'description' => 'max:191|nullable',
            'hashtag' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'name' => 'max:191|nullable',
            'description' => 'max:191|nullable',
            'hashtag' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
