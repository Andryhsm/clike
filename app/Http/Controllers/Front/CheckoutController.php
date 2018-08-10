<?php

namespace App\Http\Controllers\Front;

use App\Interfaces\OrderRepositoryInterface;
use App\Order\Processor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Repositories\CodePromoRepository;
use Auth;

class CheckoutController extends Controller
{
	protected $order_processor;
	protected $cart;
	protected $order_repository;
	public function __construct(Processor $processor,OrderRepositoryInterface $order_repo, CodePromoRepository $code_promo_repo)
	{
		$this->order_processor = $processor;
		$this->cart = app('cart');
		$this->order_repository = $order_repo;
		$this->code_promo_repo = $code_promo_repo;
	}

	public function storeOrderInfo(Request $request)
	{
		$cart_product_info = Session::get('cart_product_info');
		$this->cart->setCustomer(Auth::user());
		foreach ($request["real-price"] as $item_id => $price) {
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
		try {
			$order = $this->order_processor->placeOrder($this->cart, $request->all());
			$this->cart->clear();
			Session::forget('cart_product_info');
			return redirect()->route('customer-commande-en-cours');
			//return redirect("checkout/order-confirmed")->with('order_id',$order->order_id);
		} catch (OrderException $e) {
			dd($e->getMessage());
			flash()->error($e->getMessage());
			return redirect("cart");
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
		//dd($cart);
        return view('front.cart.confirm_cart',compact('cart'));
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
				foreach($request['data'] as $cart_item_id){
					$cart_item = $this->cart->item($cart_item_id);
					if(in_array($cart_item->getId(), $product_ids) || $this->compareTwoArrays($cart_item->getCategoryIds(), $category_ids)) {
						//$exceed_quantity_item[] = $cart_item->getName();
						$price = $cart_item->getOriginalPrice() - $cart_item->getOriginalPrice() * $code_promo->discount /100;
						$item = array("item_id"=>$cart_item_id, "real_price"=>$price);
						$data[] = $item;
					}
				}

				return response()->json(['data' => $data]);
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
