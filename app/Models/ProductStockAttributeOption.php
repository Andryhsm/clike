<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductStockAttributeOption extends Model
{
    protected $table = 'product_stock_attribute_option';
    protected $primaryKey = 'product_stock_attribute_option_id';
    
    protected $fillable = ['product_stock_id', ''];
    public $timestamps = false;
    
}
