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

    public function updateProductCount($id, $count_request) {
        $product_stock = $this->model->find($id);
        if($product_stock!=null) {
            $product_stock->product_count = $product_stock->product_count - $count_request;
            $product_stock->save();
        }
    }

    public function getById($id) {
        $product_stock = $this->model->find($id);
        return $product_stock;
    }

    public function updateProductCountInEncasement($id, $count_request) {
        $product_stock = $this->model->find($id);
        if($product_stock->product_count < $count_request)
            return false;
        $product_stock->product_count = $product_stock->product_count - $count_request;
        $product_stock->save();
        return true;
    }
}