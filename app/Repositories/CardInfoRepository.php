<?php

namespace App\Repositories;


use App\Interfaces\CardInfoInterface;
use App\Models\CardInfo;
use Carbon\Carbon;

class CardInfoRepository implements CardInfoInterface
{
	protected $model;

	public function __construct(CardInfo $card_info)
	{
		$this->model = $card_info;
	}

	public function getByUserId($user_id)
	{
		return $this->model->where('user_id', $user_id)->get();
	}

	public function save($input)
	{
		if($input['cart_number'] != null) {
			$card_info = $this->model->where('card_number', $input['cart_number'])->first();
			if($card_info == null) {
				$this->model->card_number = $input['cart_number'];
				$this->model->verification_code = $input['verif_code'];
				$this->model->date_expirate = Carbon::parse($input['date_expirate']);
				$this->model->user_id = auth()->user()->user_id;
				$this->model->save();
			}
		}
	}

}