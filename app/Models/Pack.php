<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pack extends Model
{
    protected $table = 'pack';
    protected $primaryKey = 'pack_id';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'type',
        'product_visibility',
        'transaction_fees',
        'pack_newsletter',
    ];
}
