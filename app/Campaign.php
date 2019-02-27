<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Campaign
 *
 * @package App
 * @property string $name
 * @property string $brief
 * @property integer $status
 * @property string $start
 * @property string $end
 * @property decimal $budget
 * @property string $requirement
 * @property string $brand
*/
class Campaign extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['name', 'brief', 'status', 'start', 'end', 'budget', 'requirement', 'brand_id'];
    

    public static function storeValidation($request)
    {
        return [
            'name' => 'max:191|nullable',
            'brief' => 'max:191|nullable',
            'status' => 'integer|max:4294967295|nullable',
            'start' => 'date_format:' . config('app.date_format') . ' H:i:s|max:191|required',
            'end' => 'date_format:' . config('app.date_format') . ' H:i:s|max:191|required',
            'budget' => 'numeric|required',
            'requirement' => 'max:191|required',
            'brand_id' => 'integer|exists:brands,id|max:4294967295|required'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'name' => 'max:191|nullable',
            'brief' => 'max:191|nullable',
            'status' => 'integer|max:4294967295|nullable',
            'start' => 'date_format:' . config('app.date_format') . ' H:i:s|max:191|required',
            'end' => 'date_format:' . config('app.date_format') . ' H:i:s|max:191|required',
            'budget' => 'numeric|required',
            'requirement' => 'max:191|required',
            'brand_id' => 'integer|exists:brands,id|max:4294967295|required'
        ];
    }

    

    /**
     * Set attribute to datetime format
     * @param $input
     */
    public function setStartAttribute($input)
    {
        if ($input) {
            $this->attributes['start'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        }
    }

    /**
     * Get attribute from datetime format
     * @param $output
     *
     * @return string
     */
    public function getStartAttribute($output)
    {
        if ($output) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $output)->format(config('app.date_format') . ' H:i:s');
        }
    }

    /**
     * Set attribute to datetime format
     * @param $input
     */
    public function setEndAttribute($input)
    {
        if ($input) {
            $this->attributes['end'] = Carbon::createFromFormat(config('app.date_format') . ' H:i:s', $input)->format('Y-m-d H:i:s');
        }
    }

    /**
     * Get attribute from datetime format
     * @param $output
     *
     * @return string
     */
    public function getEndAttribute($output)
    {
        if ($output) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $output)->format(config('app.date_format') . ' H:i:s');
        }
    }
    
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id')->withTrashed();
    }
    
    
}
