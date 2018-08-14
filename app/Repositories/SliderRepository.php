<?php

namespace App\Repositories;

use App\Interfaces\SliderRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Slider;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Hash;

class SliderRepository implements SliderRepositoryInterface
{
    protected $model;

    public function __construct(Slider $slider)
    {
        $this->model = $slider;
    }

    public function getById($template_id)
    {
        return $this->model->find($template_id);
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function create($input,$image_name)
    {

        $this->model->slider_title = $input['slider_title'];
        $this->model->alt = $input['alt'];
        $this->model->slider_image = $image_name['slider_image'];
        $this->model->is_active = isset($input['is_active']) ? $input['is_active'] : '0';
		$this->model->url = $input['slider_url'];
        $this->model->created_by = auth()->guard('admin')->user()->admin_id;
        return $this->model->save();
    }

    public function updateById($id, $input,$image_name)
    {
        $this->model = $this->model->findOrNew($id);
        $this->model->slider_title = $input['slider_title'];
		$this->model->alt = $input['alt'];
        if(!empty($image_name['slider_image'])){
            $this->model->slider_image = $image_name['slider_image'];
        }
        $this->model->is_active = isset($input['is_active']) ? $input['is_active'] : '0';
		$this->model->url = $input['slider_url'];
		$this->model->created_by = auth()->guard('admin')->user()->admin_id;
        return $this->model->save();
    }

    public function deleteById($id)
    {
        return $this->model->find($id)->delete();
    }

    public function getActiveSlider()
    {
        return $this->model->whereIsActive(1)->orderBy('slider_id', 'DESC')->limit(5)->get();
    }

    public function getAllSlider(){
        return $this->model->get();
    }

    public function getActiveMainSlider(){
        return $this->model->whereIsActive(1)->first();
    }
    public function getProductImageById($id){
        return $sliderImage = Slider::where('slider', $id)->get()->first();
    }
}