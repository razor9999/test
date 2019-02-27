<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class InfluencerSocialNetwork
 *
 * @package App
 * @property string $influencer
 * @property string $social_network
 * @property integer $status
*/
class InfluencerSocialNetwork extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['status', 'influencer_id', 'social_network_id'];
    

    public static function storeValidation($request)
    {
        return [
            'influencer_id' => 'integer|exists:influencers,id|max:4294967295|required',
            'social_network_id' => 'integer|exists:social_networks,id|max:4294967295|required',
            'status' => 'integer|max:2147483647|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'influencer_id' => 'integer|exists:influencers,id|max:4294967295|required',
            'social_network_id' => 'integer|exists:social_networks,id|max:4294967295|required',
            'status' => 'integer|max:2147483647|nullable'
        ];
    }

    

    
    
    public function influencer()
    {
        return $this->belongsTo(Influencer::class, 'influencer_id')->withTrashed();
    }
    
    public function social_network()
    {
        return $this->belongsTo(SocialNetwork::class, 'social_network_id')->withTrashed();
    }
    
    
}
