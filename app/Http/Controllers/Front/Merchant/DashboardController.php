<?php

namespace App\Http\Controllers\Front\Merchant;

use App\Interfaces\OrderRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
	protected $product_repository;
	protected $order_repository;

	public function __construct(ProductRepositoryInterface $productRepository, OrderRepositoryInterface $orderRepository)
	{
		$this->product_repository = $productRepository;
		$this->order_repository = $orderRepository;
	}

    public function index()
    {
    	$product_count = $this->product_repository->getCount();
    	$sales_count = $this->order_repository->getCount();
        return view('merchant.dashboard.index', compact('product_count', 'sales_count'));
    }
}
