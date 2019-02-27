<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BrandCategory
 *
 * @package App
 * @property string $category
 * @property string $brand
 * @property integer $status
*/
class BrandCategory extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['status', 'category_id', 'brand_id'];
    

    public static function storeValidation($request)
    {
        return [
            'category_id' => 'integer|exists:categories,id|max:4294967295|required',
            'brand_id' => 'integer|exists:brands,id|max:4294967295|required',
            'status' => 'integer|max:2147483647|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'category_id' => 'integer|exists:categories,id|max:4294967295|required',
            'brand_id' => 'integer|exists:brands,id|max:4294967295|required',
            'status' => 'integer|max:2147483647|nullable'
        ];
    }

    

    
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->withTrashed();
    }
    
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id')->withTrashed();
    }
    
    
}
