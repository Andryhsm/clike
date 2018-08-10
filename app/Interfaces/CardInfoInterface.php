<?php

namespace App\Interfaces;


interface CardInfoInterface
{
	
	public function getByUserId($user_id);

	public function save($input);

	public function saveForMerchant($input, $user_id);

}