<?php

namespace App\Http\Controllers\Admin;


use App\Interfaces\LanguageInterface;
use App\Models\Banner;
use App\Repositories\BannerRepository;
use App\Service\UploadService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class BannerController extends Controller
{
	protected $upload_service;
	protected $banner_repository;
	protected $language_repository;

	public function __construct(UploadService $upload_service,BannerRepository $banner_repository, LanguageInterface $language )
	{
		$this->upload_service = $upload_service;
		$this->banner_repository = $banner_repository;
		$this->language_repository = $language;
	}	

	public function index()
	{
		$banners = $this->banner_repository->getAllBanner();
		return view('admin.banner.index')->with('banners', $banners);
	}


	public function create()
	{
		$languages = $this->language_repository->getOptions();
		return view('admin.banner.create',compact('languages'));
	}

	public function store(Request $request)
	{
		$rules = array(
			'banner_title' => 'required',
			'image' => 'mimes:jpeg,jpg,png,gif|max:10000' // max 10000kb
		);
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
            $image_name['french_image_name']=$this->uploadImage('french_image',$request->is_subbanner);
            $image_name['french_image_name_hover']=$this->uploadImage('french_image_hover',$request->is_subbanner);
			$brand=$this->banner_repository->create($request->all(),$image_name);
			if($brand){				
					flash()->success(config('message.banner.add-success'));
					return Redirect('admin/banner');
				
			}
		}
	}

	public function edit($id, Request $request)
	{
		$banner = Banner::find($id);
		$languages = $this->language_repository->getOptions();
		return view('admin.banner.edit')->with('banner', $banner)->with('languages',$languages);
	}

	public function update($id,Request $request){

		$rules = array(
			'banner_title' => 'required',
			'image' => 'mimes:jpeg,jpg,png,gif' // max 10000kb
		);
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
            $image_name['french_image_name']=$this->uploadImage('french_image',$request->is_subbanner);
			$image_name['french_image_name_hover']=$this->uploadImage('french_image_hover',$request->is_subbanner);

			if(!empty($request['french_image']) && !empty($request['french_image_hover'])){
				$this->deleteUploadedImage($id);
			}
			
			$banner=$this->banner_repository->updateById($id,$request->all(),$image_name);
			if($banner){
				flash()->success(config('message.banner.update-success'));
				return Redirect('admin/banner');
			/*return Redirect('admin/banner');*/
		}
	}
}

	public function uploadImage($name,$type){
		
		$image_name = "";
		if (Input::hasFile($name)) {
			$file = Input::file($name);
			try{
              $image_name = $this->upload_service->upload($file, 'upload/banner');
			}catch(Exception $e){
				  flash()->error($e->getMessage());
                  return Redirect::back();
			}

            $path_img_delete = public_path(Banner::Banner_IMAGE_PATH.$image_name);
			$img = \Image::make(public_path().'/'.Banner::Banner_IMAGE_PATH.$image_name);
			$thumb_path = public_path(Banner::Banner_IMAGE_PATH);
			
            $image_name = str_replace(' ', '_', $image_name) ;
            $image_name = strval(mt_rand());											//genêre un nom aléatoire pour renommer l'image
            $image_name .= ".png";

			if(!\File::isDirectory($thumb_path)){
				\File::makeDirectory($thumb_path);
			}

			if (file_exists($path_img_delete)) {
                unlink($path_img_delete);
            }   
			
			switch ($type) {
				case 1:
					$img->fit(1000,1000)->save($thumb_path.'/'.$image_name);		
					break;
				case 2:
					$img->fit(750,500)->save($thumb_path.'/'.$image_name);		
					break;
				case 4:
					$img->fit(3000,1300)->save($thumb_path.'/'.$image_name);		
					break;		
				default:
					# code...
					break;
			}
		}
		return $image_name;

	}
	public function deleteUploadedImage($id){

		$bannerImage = $this->banner_repository->getById($id);
		$path = public_path(Banner::Banner_IMAGE_PATH.$bannerImage->french_banner_image);
		$inpath = public_path(Banner::Banner_IMAGE_PATH.$bannerImage->banner_image_hover);
			if (file_exists($path) && file_exists($inpath) ){
			   unlink($path);
			   unlink($inpath);
			}
		
	
    }
	public function destroy($id)
	{
		$this->deleteUploadedImage($id);
		if ($this->banner_repository->deleteById($id)) {
			flash()->success(config('message.banner.delete-success'));
			return Redirect('admin/banner');
		}
	}
}
