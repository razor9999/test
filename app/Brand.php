<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Brand
 *
 * @package App
 * @property string $name
 * @property string $address
 * @property string $email
 * @property string $phone
 * @property string $company_size
*/
class Brand extends Model
{
    use SoftDeletes;

    
    protected $fillable = ['name', 'address', 'email', 'phone', 'company_size_id'];
    

    public static function storeValidation($request)
    {
        return [
            'name' => 'max:191|nullable',
            'address' => 'max:191|nullable',
            'email' => 'max:191|nullable',
            'phone' => 'max:191|nullable',
            'company_size_id' => 'integer|exists:company_sizes,id|max:4294967295|nullable'
        ];
    }

    public static function updateValidation($request)
    {
        return [
            'name' => 'max:191|nullable',
            'address' => 'max:191|nullable',
            'email' => 'max:191|nullable',
            'phone' => 'max:191|nullable',
            'company_size_id' => 'integer|exists:company_sizes,id|max:4294967295|nullable'
        ];
    }

    

    
    
    public function company_size()
    {
        return $this->belongsTo(CompanySize::class, 'company_size_id')->withTrashed();
    }
    
    
}
