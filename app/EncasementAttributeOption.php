<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EncasementAttributeOption extends Model
{
    	/**
	 * @var string
	 */
	protected $table = 'encasement_attribute_option';
	/**
	 * @var string
	 */
	protected $primaryKey = 'encasement_attribute_option_id';
	/**
	 * @var array
	 */
	protected $fillable = ['encasement_product_id', 'attribute_option_id'];

	public $timestamps = false;
}
