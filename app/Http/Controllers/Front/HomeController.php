<?php
namespace App\Http\Controllers\Front;

use App\Interfaces\BannerRepositoryInterface;
use App\Interfaces\SliderRepositoryInterface;
use App\Interfaces\InstagramRepositoryInterface;
use App\Interfaces\BlogPostInterface;
use App\Interfaces\BrandRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\SpecialProductRepositoryInterface;
use App\Repositories\BannerRepository;
use App\Repositories\SliderRepository;
use App\Repositories\InstagramRepository;
use App\Repositories\BrandRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $category_repository;
    protected $banner_repository;
    protected $slider_repository;
    protected $instagram_repository;
    protected $brand_repository;
    protected $special_product_repository;
	protected $blog_repository;

    public function __construct(CategoryRepositoryInterface $category_repository, BannerRepositoryInterface $banner_repository,BrandRepositoryInterface $brand_repository,
								SpecialProductRepositoryInterface $special_product_repository, InstagramRepositoryInterface $instagram_repository, SliderRepositoryInterface $slider_repository,
								BlogPostInterface $blog_repo
	)
    {
        $this->category_repository = $category_repository;
        $this->banner_repository = $banner_repository;
        $this->slider_repository = $slider_repository;
        $this->instagram_repository = $instagram_repository;
        $this->brand_repository = $brand_repository;
        $this->special_product_repository = $special_product_repository;
		$this->blog_repository = $blog_repo;
    }
    public function index(Request $request)
    {
        // if(!($request->get('key') == 'open'))    
        //     return redirect()->route('crowdfunding');
        $language_id=app('language')->language_id;
        $categories = $this->category_repository->getParentCategories($language_id);
        $banner = $this->banner_repository->getActiveMainBanner($language_id);
		$sub_banners = $this->banner_repository->getActiveSubBanner($language_id);
        $instagrams = $this->instagram_repository->getActiveInstagram($language_id);
        $sliders = $this->slider_repository->getActiveSlider($language_id);
        $brands=$this->brand_repository->getAll();
        $special_products=$this->special_product_repository->getspecialProducts();
		$blog_posts = $this->blog_repository->getHomePagePost();
        return view('front.home.index', compact('categories','banner','sliders','instagrams','brands','sub_banners','special_products','blog_posts'));
    }

    public function getInstagramFeeds(Request $request)
    {
        $language_id=app('language')->language_id;
        $instagrams = $this->instagram_repository->getActiveInstagram($request);
        $instagram_imgs = [];
        foreach ($instagrams as $key => $value) {
            $instagram_imgs[] = $value->getInstagramImage($language_id);
        }
        return response()->json(['instagrams' => $instagram_imgs]);
    }

}
