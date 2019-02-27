<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AudienceInteresting
 *
 * @package App
 * @property string $audience
 * @property string $interesting
 * @property double $weight
*/
class AudienceInteresting extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['weight', 'audience_id', 'interesting_id'];
    

    public static function storeValidation($request)
    {
        return [
            'audience_id' => 'integer|exists:audiences,id|max:4294967295|required',
            'interesting_id' => 'integer|exists:interestings,id|max:4294967295|required',
            'weight' => 'numeric|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'audience_id' => 'integer|exists:audiences,id|max:4294967295|required',
            'interesting_id' => 'integer|exists:interestings,id|max:4294967295|required',
            'weight' => 'numeric|nullable'
        ];
    }

    

    
    
    public function audience()
    {
        return $this->belongsTo(Audience::class, 'audience_id')->withTrashed();
    }
    
    public function interesting()
    {
        return $this->belongsTo(Interesting::class, 'interesting_id')->withTrashed();
    }
    
    
}
