<?php
namespace App\Repositories;

use App\Models\Pack;
use App\Models\PackNewsletter;

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
        $this->model->product_visibility = isset($input['product_visibility']) ? $input['product_visibility'] : '0';
        $this->model->transaction_fees = $input['transaction_fees'];
        $this->model->pack_newsletter = isset($input['pack_newsletter']) ? $input['pack_newsletter'] : '0';
        $this->model->save();

        if(isset($input['pack_newsletter'])){
            $packNewsletter = new PackNewsletter();
            $packNewsletter->pack_id = $this->model->pack_id;
            $packNewsletter->at = $input['at'];
            $packNewsletter->of = $input['of'];

            $packNewsletter->save();
        }

        return $this->model;
    }

    public function updateById($id, $input)
    {
        $this->model = $this->model->findOrNew($id);
        $this->model->name = $input['name'];
        $this->model->price = $input['price'];
        $this->model->type = $input['type'];
        $this->model->product_visibility = isset($input['product_visibility']) ? $input['product_visibility'] : '0';
        $this->model->transaction_fees = $input['transaction_fees'];
        $this->model->pack_newsletter = isset($input['pack_newsletter']) ? $input['pack_newsletter'] : '0';
        $this->model->save();

        if(isset($input['pack_newsletter'])){
            PackNewsletter::updateOrCreate(['pack_id' => $this->model->pack_id],
                [
                    'at' => $input['at'],
                    'of' => $input['of'],
                ]
            );

        }        

        return $this->model;
    }

    public function deleteById($id)
    {
        return $this->model->find($id)->delete();
    }
    public function findPackByNameAndType($input){

        return $this->model->Where('name', $input['name'])->Where('type', $input['type'])->first();
    }
    
}