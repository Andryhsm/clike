<?php
namespace App\Repositories;

use App\Models\Pack;

class PackRepository
{
    protected $model;

    public function __construct(Pack $pack)
    {
        $this->model = $pack;
    }

    public function getById($id)
    {
        return $this->model->find($id);
    }

    public function getAll()
    {
        return $this->model->all();
    }

    public function save($input)
    {
        $this->model->name = $input['name'];
        $this->model->price = $input['price'];
        $this->model->type = $input['type'];
        return $this->model->save();
    }

    public function updateById($id, $input)
    {
        $this->model = $this->model->findOrNew($id);
        $this->model->name = $input['name'];
        $this->model->price = $input['price'];
        $this->model->type = $input['type'];
        return $this->model->save();
    }

    public function deleteById($id)
    {
        return $this->model->find($id)->delete();
    }
    
}