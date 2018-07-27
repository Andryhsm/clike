<?php

namespace App\Interfaces;


interface ProductStockRepositoryInterface
{

    public function create($input);

    public function update($id, $input);

    public function delete($id);

    public function getAll();

    public function updateProductCount($id, $count_request);

}