<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Audience
 *
 * @package App
 * @property string $name
 * @property string $gender
 * @property string $location
 * @property integer $from_age
 * @property integer $to_age
 * @property string $competence
 * @property string $social_network
*/
class Audience extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['name', 'gender', 'location', 'from_age', 'to_age', 'competence', 'social_network_id'];
    

    public static function storeValidation($request)
    {
        return [
            'name' => 'max:191|required',
            'gender' => 'max:191|nullable',
            'location' => 'max:191|nullable',
            'from_age' => 'integer|max:2147483647|nullable',
            'to_age' => 'integer|max:2147483647|nullable',
            'competence' => 'max:191|nullable',
            'social_network_id' => 'integer|exists:social_networks,id|max:4294967295|required'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'name' => 'max:191|required',
            'gender' => 'max:191|nullable',
            'location' => 'max:191|nullable',
            'from_age' => 'integer|max:2147483647|nullable',
            'to_age' => 'integer|max:2147483647|nullable',
            'competence' => 'max:191|nullable',
            'social_network_id' => 'integer|exists:social_networks,id|max:4294967295|required'
        ];
    }

    

    
    
    public function social_network()
    {
        return $this->belongsTo(SocialNetwork::class, 'social_network_id')->withTrashed();
    }
    
    
}
