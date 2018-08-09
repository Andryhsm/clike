<?php

namespace App\Http\Controllers\Front\Merchant;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CodePromoRepository;
use App\Interfaces\CategoryRepositoryInterface;
use Yajra\Datatables\Facades\Datatables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CodePromoController extends Controller
{
	protected $code_promo_repository;
	protected $category_repository;

	public function __construct(CodePromoRepository $code_promo_repo, CategoryRepositoryInterface $category_repo)
	{
		$this->code_promo_repository = $code_promo_repo;
		$this->category_repository = $category_repo;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$code_promos = Datatables::collection($this->code_promo_repository->getAll(auth()->user()->store->first()->store_id))->make(true);
		$code_promos = $code_promos->getData();
		return view('merchant.code_promo.list', compact('code_promos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$language_id=app('language')->language_id;
		$categories = $this->category_repository->getParentCategories($language_id);
		$code_promo = false;
		return view('merchant.code_promo.form', compact('code_promo','categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$rules = array(
			'code_promo_name' => 'required',
			'date_debut' => 'required',
			'date_fin' => 'required',
			'quantity_max' => 'required',
			'discount' => 'required'
		);
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			$code_promo=$this->code_promo_repository->save($request->all());
			if($code_promo){
				flash()->success(config('message.code_promo.add-success'));
				return redirect()->route('code-promo.index');
			}
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$language_id=app('language')->language_id;
		$code_promo = $this->code_promo_repository->getById($id);
		$categories = $this->category_repository->getParentCategories($language_id);
		return view('merchant.code_promo.form', compact('code_promo','categories'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$rules = array(
			'code_promo_name' => 'required',
			'date_debut' => 'required',
			'date_fin' => 'required',
			'quantity_max' => 'required',
			'discount' => 'required'
		);
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
			$code_promo=$this->code_promo_repository->updateById($id,$request->all());
			if($code_promo){
				flash()->success(config('message.code_promo.update-success'));
				return redirect()->route('code-promo.index');
			}
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) 
	{
		if ($this->code_promo_repository->deleteById($id)) {
			flash()->success(config('message.code_promo.delete-success'));
		}else {
			flash()->error(config('message.code_promo.delete-error'));
		}
		return redirect()->route('code-promo.index');
	}
	
	public function getProduct(Request $request){
		$keyword = $request->get('datastring');
		$products = $this->code_promo_repository->getProducts($keyword,\Auth::user()->user_id);
		return response()->json($products);
	}

	public function getDiscountPrice(Request $request){ 
		// $code_promo = $this->code_promo_repository->getByPromoName($request);
		// $ids = explode(',', $request['category_ids']);
		// $promed_ids = [];
		// $category_ids = [];
		// if($code_promo){
		// 	$begin_date = \Carbon\Carbon::parse($code_promo->date_debut);
		// 	$end_date = \Carbon\Carbon::parse($code_promo->date_fin);
		// 	$now = \Carbon\Carbon::now();
		// 	if($now > $end_date) return response()->json(['error' => "La durée d'utilisation du code a été expirée."]);
		// 	else {
		// 		foreach ($code_promo->products as $product) {
		// 			if(in_array($product->product_id, $request['product_ids'])) $promed_ids[] = $product->product_id;
		// 		} 
		// 		foreach ($code_promo->categories as $category) {
		// 			if(in_array($category->category_id, $ids)) $category_ids[] = $category->category_id;
		// 		}
		// 		return response()->json(['discount' => $code_promo->discount, 
		// 								'promed_ids' => implode(',', $promed_ids), 
		// 								'category_ids' => implode(',', $category_ids), 
		// 								'quantity_max' => $code_promo->quantity_max]);
		// 	}
		// }
		// else return response()->json(['error' => "Code inexistant."]);
		$code_promo = $this->code_promo_repository->getByPromoName($request);
		if($code_promo){
			$begin_date = \Carbon\Carbon::parse($code_promo->date_debut);
			$end_date = \Carbon\Carbon::parse($code_promo->date_fin);
			$now = \Carbon\Carbon::now();
			if($now > $end_date || $now < $begin_date) return response()->json(['error' => "La durée d'utilisation du code a expirée."]);
			else {
				$product_ids = $this->createArrayFromCollection($code_promo->products, 'product_id');
				$category_ids = $this->createArrayFromCollection($code_promo->categories, 'category_id');
				$data = [];
				foreach($request['data'] as $cart_item){
					if(in_array($cart_item['product_id'], $product_ids) || $this->compareTwoArrays($cart_item['category_id'], $category_ids)) {
						$cart_item['real_price'] -= $cart_item['real_price'] * $code_promo->discount /100;
						$data[] = $cart_item;
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

	public function getDiscountByNameCode(Request $request) {
		$code_promo = $this->code_promo_repository->getByPromoName($request);
		$product_id = $request['product_id'];
		$parent_category_id = $request['parent_category_id'];
		$product_ids = [];
		$category_ids = [];

		if($code_promo){
			$begin_date = \Carbon\Carbon::parse($code_promo->date_debut);
			$end_date = \Carbon\Carbon::parse($code_promo->date_fin);
			$now = \Carbon\Carbon::now();
			if($now > $end_date) return response()->json([
							'status' => 'notfound', 
							'message' => "La durée d'utilisation du code a expirée."
						]);
			else {
				foreach ($code_promo->products as $product) {
					$product_ids[] = $product->product_id;
				} 
				if(in_array($product_id, $product_ids)) {
					$message = "Féliciation. Vous avez un rabais de ".$code_promo->discount."% pour ce produit!";
					return response()->json([
						'status' => 'found',
						'code_with' => 'product',   
						'quantity_max' => $code_promo->quantity_max,
						'discount' => $code_promo->discount,
						'message' => $message
					]);
				} 
				foreach ($code_promo->categories as $category) {
					$category_ids[] = $category->category_id;
				}
				if(in_array($parent_category_id, $category_ids)) {
					return response()->json([
						'status' => 'found', 
						'code_with' => 'category', 
						'quantity_max' => $code_promo->quantity_max, 
						'discount' => $code_promo->discount
					]);
				} else {
					return response()->json([
						'status' => 'notfound', 
						'message' => 'La catégorie ou le produit n\'existe pas dans ce code promo.'
					]);
				}
			}
		} 
		else return response()->json(['status'=> 'notfound', 'message' => "Code inexistant."]);
	}
}
