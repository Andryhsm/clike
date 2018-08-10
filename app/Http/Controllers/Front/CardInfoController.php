<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\CardInfoInterface;

class CardInfoController extends Controller
{
	protected $cart_info_repository;

    public function __construct(CardInfoInterface $card_info_repo) {
    	$this->cart_info_repository = $card_info_repo;
    }

    public function deleteCard(Request $request) {
    	$card_info_id = $request->get('id');
    	$status = $this->cart_info_repository->deleteById($card_info_id);
    	return response()->json(['status' => $status, 'card_info_id' => $card_info_id]);
    }
}
