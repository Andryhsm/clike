<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CardInfo extends Model
{
    protected $table = 'card_info';

    /**
     * @var string
     */
    protected $primaryKey = 'card_info_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'user_id',
        'card_number',
		'date_expirate',
		'verification_code'
    ];

    public $timestamps = false;
}
