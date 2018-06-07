<?php

namespace App\Http\Controllers\Front\Merchant;

use App\Interfaces\OrderRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\OrderItemRepositoryInterface;
use App\Interfaces\OrderItemRequestInterface;

class DashboardController extends Controller
{
	protected $product_repository;
	protected $order_repository;
	protected $order_item_repository;

	public function __construct(ProductRepositoryInterface $productRepository, OrderRepositoryInterface $orderRepository, OrderItemRepositoryInterface $orderItemRepository)
	{
		$this->product_repository = $productRepository;
		$this->order_repository = $orderRepository;
		$this->order_item_repository = $orderItemRepository;
	}

    public function index()
    {	
    	$store_id = \Auth::user()->store->first()->store_id;
    	$user_id = \Auth::user()->user_id;
    	$product_count = $this->product_repository->getCountMerchant($store_id);
    	$sales_count = $this->order_item_repository->getCount($user_id);
    	$total_sales = $this->order_item_repository->getTotalSalesMerchant($user_id);
    	
        return view('merchant.dashboard.index', compact('product_count', 'sales_count', 'total_sales'));
    }
    
    public function statistical()
    {
    	$user_id = \Auth::user()->user_id;
    	$stat_sales = $this->order_item_repository->getStatSales($user_id);
    	
    	$prices=[];
    	foreach ($stat_sales as $value) {
    		$prices[$value->month]=$value->order_count."$".$value->total_price;
    	}
    	return response()->json($prices);
    }
}
