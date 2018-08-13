<?php

namespace App\Http\Controllers\Front;

use App\Interfaces\OrderRepositoryInterface;
use App\Order\Processor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Repositories\CodePromoRepository;
use App\Interfaces\CardInfoInterface;
use Auth;

class CheckoutController extends Controller
{
	protected $order_processor;
	protected $cart;
	protected $order_repository;
	protected $card_info_repository;

	public function __construct(Processor $processor,OrderRepositoryInterface $order_repo, CodePromoRepository $code_promo_repo, CardInfoInterface $card_info_repo)
	{
		$this->order_processor = $processor;
		$this->cart = app('cart');
		$this->order_repository = $order_repo;
		$this->code_promo_repo = $code_promo_repo;
		$this->card_info_repository = $card_info_repo;
	}

	public function storeOrderInfo(Request $request)
	{
		try {
			
			$cart_product_info = Session::get('cart_product_info');
			$this->cart->setCustomer(Auth::user());
			foreach ($request["real-price"] as $item_id => $price) {
				//dd($price);
				$item = $this->cart->item($item_id);
				$item->setOriginalPrice($price);
			}
			foreach ($request->input("qty", []) as $item_id => $qty) {
				$item = $this->cart->item($item_id);
				if ($qty == 0) {
					$this->cart->remove($item_id);
				} else {
					$item->setQuantity($qty);
				}
			}
			$order = $this->order_processor->placeOrder($this->cart, $request->all());
			$this->cart->clear();
			Session::forget('cart_product_info');
			Session::forget('quantity_max');
			Session::forget('old_prices');
			return redirect()->route('customer-commande-en-cours');
			//return redirect("checkout/order-confirmed")->with('order_id',$order->order_id);
		} catch (\Exception $e) {
			//dd($e->getMessage());
			flash()->error("Erreur d'enregistrement de votre commande, veuillez essayer ultérieurement!");
			return redirect()->route("cart");
		}
	}

	public function confirmOrder(Request $request)
	{
		$order_id = $request->session()->get('order_id');
		if(empty($order_id)){
			return redirect('/');
		}
		$order = $this->order_repository->byId($order_id);
		return view('front.cart.order_confirm',compact('order_id','order'));
	}
	
	public function storeQuantitySession(Request $request)
	{
		foreach ($request->input("qty", []) as $item_id => $qty) {
			Session::put($item_id, $qty);
		}
		return response()->json(['success', "Session put ok"]);
	}
	
	public function confirmCart(Request $request)
	{
		Session::put('cart_product_info', $request->all());
		$cart = $this->cart;
		$card_info = $this->card_info_repository->getById(auth()->user()->default_card_id);
		$card_infos = $this->card_info_repository->getByUserId(auth()->user()->user_id);
        return view('front.cart.confirm_cart',compact('cart', 'card_info', 'card_infos'));
	}
	
	public function applyCodePromo(Request $request){ 
		$code_promo = $this->code_promo_repo->getByPromoName($request);
		if($code_promo){
			$begin_date = \Carbon\Carbon::parse($code_promo->date_debut);
			$end_date = \Carbon\Carbon::parse($code_promo->date_fin);
			$now = \Carbon\Carbon::now();
			if($now > $end_date || $now < $begin_date) return response()->json(['error' => "La durée d'utilisation du code a expirée."]);
			else {
				$product_ids = $this->createArrayFromCollection($code_promo->products, 'product_id');
				$category_ids = $this->createArrayFromCollection($code_promo->categories, 'category_id');
				$data = [];
				$exceed_quantity_item = []; 
				$old_prices = [];
				foreach($request['data'] as $item){
					$cart_item = $this->cart->item($item['item_id']);
					if(in_array($cart_item->getId(), $product_ids) || $this->compareTwoArrays($cart_item->getCategoryIds(), $category_ids)) {
						$old_prices[$item['product_id']] = $item['old_price'];
						if($item['quantity'] > $code_promo->quantity_max) 
							$exceed_quantity_item[] = $cart_item->getName();

						$price = $cart_item->getOriginalPrice() - $cart_item->getOriginalPrice() * $code_promo->discount /100;
						$item = array(
									"item_id" => $item['item_id'], 
									"real_price" => $price,
									"original_price" => $cart_item->getOriginalPrice(),
									"discount" => $code_promo->discount
								);
						$data[] = $item;										
					}
				}
			
				Session::put('quantity_max', $code_promo->quantity_max);
				Session::put('old_prices', $old_prices);
				//dd(Session::get('old_prices'));
				return response()->json([
										'data' => $data, 
										'exceed_quantity_item' => join(', ', $exceed_quantity_item),
										'quantity_max' => $code_promo->quantity_max
									]);
			}
		}
		else return response()->json(['error' => "Code inexistant."]);

	}

	public function createArrayFromCollection($collection, $name) {
		$array = [];
		foreach ($collection as $id=>$collection_item) {
			$array[$id] = $collection_item[$name];
		}
		return $array; 
	}

	public function compareTwoArrays($array1, $array2) {
		foreach ($array1 as $key => $value) {
			if(in_array($value, $array2)) return true;
		}
		return false;
	}
}
