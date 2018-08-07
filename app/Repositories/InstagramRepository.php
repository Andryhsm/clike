<?php

namespace App\Repositories;

use App\Interfaces\InstagramRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Instagram;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Hash;

class InstagramRepository implements InstagramRepositoryInterface
{
    protected $model;

    public function __construct(Instagram $instagram)
    {
        $this->model = $instagram;
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

        $this->model->title = $input['title'];
        $this->model->image = $image_name['image'];
        $this->model->is_active = isset($input['is_active']) ? $input['is_active'] : '0';
        $this->model->created_by = auth()->guard('admin')->user()->admin_id;
        return $this->model->save();
    }

    public function updateById($id, $input,$image_name)
    {
        $this->model = $this->model->findOrNew($id);
        $this->model->title = $input['title'];
        $this->model->image = $image_name['image'];
        $this->model->is_active = isset($input['is_active']) ? $input['is_active'] : '0';
		$this->model->created_by = auth()->guard('admin')->user()->admin_id;
        return $this->model->save();
    }

    public function deleteById($id)
    {
        return $this->model->find($id)->delete();
    }

    public function getActiveInstagram()
    {
        return $this->model->whereIsActive(1)->orderBy('id', 'DESC')->limit(5)->get();
    }

    public function getAllInstagram(){
        return $this->model->where('is_active','=','0')->orwhere('is_active','=','1')->get();
    }
    
    public function getActiveMainInstagram(){
        return $this->model->whereIsActive(1)->first();
    }
}