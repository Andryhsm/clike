<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\UserRepositoryInterface;
use App\Interfaces\StoreRepositoryInterface;
use App\Interfaces\ProductRepositoryInterface;

class PagesController extends Controller
{
	protected $user_repository;
	protected $store_repository;
	protected $product_repository;
	
	public function __construct(StoreRepositoryInterface $store_repo_interface, UserRepositoryInterface $user_repo_interface, ProductRepositoryInterface $product_repo_interface)
	{
		$this->user_repository = $user_repo_interface;
		$this->store_repository = $store_repo_interface;
		$this->product_repository = $product_repo_interface;
	}
	
    public function legalMention()
	{
		return view('front.pages.legal_mention');
	}
	
	public function PageCGV()
	{
		return view('front.pages.cgv_page');
	}
	
	public function PageCGU()
	{
		return view('front.pages.cgu_page');
	}
	
	public function SaleWithUs()
	{
		$product_count = $this->product_repository->getCount();
		$user_count = $this->user_repository->getCountByRole(1);
		$store_count = $this->store_repository->getCount();
		return view('front.pages.sale_with_clickee', compact('product_count', 'user_count', 'store_count'));
	}
	
	public function PagePresse()
	{
		return view('front.pages.presse');
	}
	
	public function PageWhoAreWe()
	{
		$product_count = $this->product_repository->getCount();
		$user_count = $this->user_repository->getCountByRole(1);
		$store_count = $this->store_repository->getCount();
		return view('front.pages.who_are_we', compact('product_count', 'user_count', 'store_count'));
	}
	
	public function PageBuyWithClickee()
	{
		$product_count = $this->product_repository->getCount();
		$user_count = $this->user_repository->getCountByRole(1);
		$store_count = $this->store_repository->getCount();
		return view('front.pages.buy_with_clickee');
	}
	
	public function PageOurPhotosTips()
	{
		return view('front.pages.our_photos_tips');
	}
	
	public function PageOperation()
	{
		$product_count = $this->product_repository->getCount();
		$user_count = $this->user_repository->getCountByRole(1);
		$store_count = $this->store_repository->getCount();
		return view('front.pages.operation', compact('product_count', 'user_count', 'store_count'));
	}
	
	//Page de test pour le tab
	public function PageTest()
	{
		return view('front.test.test');
	}
}
