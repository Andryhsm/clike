<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Instagram extends Model
{
    //
    protected $table = 'instagram';
    protected $primaryKey = 'id';
    const Instagram_IMAGE_PATH = '/upload/instagram_img/';
    const Instagram_CDN_IMAGE_PATH = 'https://db-alternateeve-csi7douue.stackpathdns.com/instagram_img/';

    protected $fillable = ['title','image','url','is_active','order'];

    public function getInstagramImage(){
        $image_name=($this->image==null)?$this->instagram_image:$this->image; 
        return URL::to('/').self::Instagram_IMAGE_PATH.$image_name;
    }
  
    public function getCdnInstagramImage(){
        $image_name=($this->image==null)?$this->instagram_image:$this->image;
        return self::Instagram_CDN_IMAGE_PATH.$image_name;
    }
}
