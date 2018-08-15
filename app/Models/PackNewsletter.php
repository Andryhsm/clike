<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackNewsletter extends Model
{
    protected $table = 'pack_newsletter';
    protected $primaryKey = 'pack_newsletter_id';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pack_id',
        'of',
        'at',
    ];
}
