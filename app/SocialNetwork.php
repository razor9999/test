<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SocialNetwork
 *
 * @package App
 * @property string $name
 * @property string $description
 * @property string $logo
 * @property string $url
*/
class SocialNetwork extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['name', 'description', 'logo', 'url'];
    

    public static function storeValidation($request)
    {
        return [
            'name' => 'max:191|nullable',
            'description' => 'max:191|nullable',
            'logo' => 'max:191|nullable',
            'url' => 'max:191|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'name' => 'max:191|nullable',
            'description' => 'max:191|nullable',
            'logo' => 'max:191|nullable',
            'url' => 'max:191|nullable'
        ];
    }

    

    
    
    
}
