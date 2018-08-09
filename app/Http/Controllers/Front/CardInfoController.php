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
    	dd($request);
    }
}
