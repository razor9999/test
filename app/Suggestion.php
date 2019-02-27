<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Suggestion
 *
 * @package App
 * @property integer $status
 * @property string $influencer
 * @property string $campaign
 * @property double $weight
*/
class Suggestion extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['status', 'weight', 'influencer_id', 'campaign_id'];
    

    public static function storeValidation($request)
    {
        return [
            'status' => 'integer|max:2147483647|required',
            'influencer_id' => 'integer|exists:influencers,id|max:4294967295|required',
            'campaign_id' => 'integer|exists:campaigns,id|max:4294967295|required',
            'weight' => 'numeric|required'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'status' => 'integer|max:2147483647|required',
            'influencer_id' => 'integer|exists:influencers,id|max:4294967295|required',
            'campaign_id' => 'integer|exists:campaigns,id|max:4294967295|required',
            'weight' => 'numeric|required'
        ];
    }

    

    
    
    public function influencer()
    {
        return $this->belongsTo(Influencer::class, 'influencer_id')->withTrashed();
    }
    
    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaign_id')->withTrashed();
    }
    
    
}
