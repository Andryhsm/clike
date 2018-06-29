<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AttributeOptionTranslation;

class ProductStockAttributeOption extends Model
{
    protected $table = 'product_stock_attribute_option';
    protected $primaryKey = 'product_stock_attribute_option_id';
    
    protected $fillable = ['product_stock_id', ''];
    public $timestamps = false;
    
    public function translation($language=null)
	{
		if($language==null) {
			return $this->hasMany(AttributeOptionTranslation::class, 'attribute_option_id');
		} else {
			return $this->hasOne(AttributeOptionTranslation::class, 'attribute_option_id')->where('language_id',$language);
		}
	}

	public function english()
	{
		return $this->translation(1);
	}
	public function french()
	{
		return $this->translation(2);
	}
    
}
