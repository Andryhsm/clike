<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NewsletterOption extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'newsletter_option';
    protected $primaryKey = 'newsletter_option_id';
    protected $fillable = ['user_id', 'key', 'value'];
    public $timestamps = false;

    public function user()
	{
		return $this->hasOne(User::class,'user_id','user_id');
	}
}
