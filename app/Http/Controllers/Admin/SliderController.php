<?php

namespace App\Http\Controllers\Admin;


use App\Interfaces\LanguageInterface;
use App\Models\Slider;
use App\Repositories\SliderRepository;
use App\Service\UploadService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
	protected $upload_service;
	protected $slider_repository;
	protected $language_repository;

	public function __construct(UploadService $upload_service,SliderRepository $slider_repository, LanguageInterface $language )
	{
		$this->upload_service = $upload_service;
		$this->slider_repository = $slider_repository;
		$this->language_repository = $language;
	}	
	public function index()
	{
		$sliders = $this->slider_repository->getAllSlider();
		return view('admin.slider.index')->with('sliders', $sliders);
	}

	public function create()
	{
		$languages = $this->language_repository->getOptions();
		return view('admin.slider.create',compact('languages'));
	}

	public function store(Request $request)
	{
		$rules = array(
			'slider_title' => 'required',
			'image' => 'mimes:jpeg,jpg,png,gif|max:10000' // max 10000kb
		);
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
            $image_name['slider_image']=$this->uploadImage('slider_image');
			$brand=$this->slider_repository->create($request->all(),$image_name);
			if($brand){				
				
					flash()->success(config('message.banner.add-success'));
					return Redirect('admin/slider');
				
			}
		}
	}

	public function edit($id, Request $request)
	{
		$slider = Slider::find($id);
		$languages = $this->language_repository->getOptions();
		return view('admin.slider.edit')->with('slider', $slider)->with('languages',$languages);
	}

	public function update($id,Request $request){

		$rules = array(
			'slider_title' => 'required',
			'image' => 'mimes:jpeg,jpg,png,gif' // max 10000kb
		);
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
            $image_name['slider_image']=$this->uploadImage('slider_image');

        if(!empty($request['slider_image'])){
            $this->deleteUploadedImage($id);
        }
			$slider=$this->slider_repository->updateById($id,$request->all(),$image_name);
			if($slider){
				
                flash()->success(config('message.banner.update-success'));
                return Redirect('admin/slider');
			}
			/*return Redirect('admin/banner');*/
		}
	}

	public function uploadImage($name){
		
		$image_name = "";
		if (Input::hasFile($name)) {
			$file = Input::file($name);
			try{
              $image_name = $this->upload_service->upload($file, 'upload/slider');
			}catch(Exception $e){
				  flash()->error($e->getMessage());
                  return Redirect::back();
			}

			$img = \Image::make(public_path().'/'.Slider::Slider_IMAGE_PATH.$image_name);
			$thumb_path = public_path(Slider::Slider_IMAGE_PATH);
			
			if(!\File::isDirectory($thumb_path)){
				\File::makeDirectory($thumb_path);
			}
			$img->fit(3000,1300)->save($thumb_path.'/'.$image_name);		

		}
		return $image_name;

	}
	public function deleteUploadedImage($id){

		$sliderImage = $this->slider_repository->getById($id);
		$path = public_path(Slider::Slider_IMAGE_PATH.$sliderImage->slider_image);	
        if (file_exists($path)){
            unlink($path);
		}
    }
	public function destroy($id)
	{
		$this->deleteUploadedImage($id);
		if ($this->slider_repository->deleteById($id)) {
		
            flash()->success(config('message.banner.delete-success'));
            return Redirect('admin/slider');
    
		}
	}
}
