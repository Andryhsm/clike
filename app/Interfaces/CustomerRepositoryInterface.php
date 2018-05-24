<?php
namespace App\Interfaces;

interface CustomerRepositoryInterface
{
	public function create($input);

	public function getCustomerSystemById($id);

	public function update($id,$input);

	public function deleteById($id);

	public function save($input);

	public function getCustomers($store_id);

	public function getCustomersLocal($store_id);

	public function getAllCustomersSystem();

	
}