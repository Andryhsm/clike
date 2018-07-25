<?php

namespace App\Repositories;

use App\Interfaces\ProductStockRepositoryInterface;
use App\Models\ProductStock;


class ProductStockRepository implements ProductStockRepositoryInterface
{
    protected $model;

    public function __construct(ProductStock $stock)
    {
        $this->model = $stock;
    }

    public function create($input)
    {
        
    }

    public function update($id, $input)
    {
        
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    public function getAll()
    {
        return $this->model->all();
    }

}