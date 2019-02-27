<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class InfluencerInteresting
 *
 * @package App
 * @property string $influencer
 * @property string $interesting
 * @property double $weight
*/
class InfluencerInteresting extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['weight', 'influencer_id', 'interesting_id'];
    

    public static function storeValidation($request)
    {
        return [
            'influencer_id' => 'integer|exists:influencers,id|max:4294967295|nullable',
            'interesting_id' => 'integer|exists:interestings,id|max:4294967295|nullable',
            'weight' => 'numeric|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'influencer_id' => 'integer|exists:influencers,id|max:4294967295|nullable',
            'interesting_id' => 'integer|exists:interestings,id|max:4294967295|nullable',
            'weight' => 'numeric|nullable'
        ];
    }

    

    
    
    public function influencer()
    {
        return $this->belongsTo(Influencer::class, 'influencer_id')->withTrashed();
    }
    
    public function interesting()
    {
        return $this->belongsTo(Interesting::class, 'interesting_id')->withTrashed();
    }
    
    
}
