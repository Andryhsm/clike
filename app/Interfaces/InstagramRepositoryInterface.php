<?php
namespace App\Interfaces;

interface InstagramRepositoryInterface
{
	public function create($input,$image_name);

	public function getAll();

	public function updateById($product_id, $input,$image_name);

	public function deleteById($product_id);

	public function getById($product_id);

	public function getActiveInstagram();
	
	public function getActiveMainInstagram();

}