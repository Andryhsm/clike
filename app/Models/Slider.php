<?php
/**
 * Created by PhpStorm.
 * User: Chirag
 * Date: 4/22/2017
 * Time: 9:19 AM
 */

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Slider extends Model
{

    protected $table = 'slider';
    protected $primaryKey = 'slider_id';
    const Slider_IMAGE_PATH = '/upload/slider/';
    const Slider_CDN_IMAGE_PATH = 'https://db-alternateeve-csi7douue.stackpathdns.com/upload/slider/';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slider_title',
        'is_active',
        'alt'
    ];

    public function getSliderImage($language_code){
        $image_name= $this->slider_image;
        return URL::to('/').self::Slider_IMAGE_PATH.$image_name;
    }
    public function getCdnSliderImage($language_code){
        $image_name= $this->slider_image;
        return self::Slider_CDN_IMAGE_PATH.$image_name;
    }
}