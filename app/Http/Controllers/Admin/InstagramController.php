<?php

namespace App\Http\Controllers\Admin;

use App\Interfaces\LanguageInterface;
use App\Models\Instagram;
use App\Repositories\InstagramRepository;
use App\Service\UploadService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class InstagramController extends Controller
{
	protected $upload_service;
	protected $instagram_repository;
	protected $language_repository;

	public function __construct(UploadService $upload_service,InstagramRepository $instagram_repository, LanguageInterface $language )
	{
		$this->upload_service = $upload_service;
		$this->instagram_repository = $instagram_repository;
		$this->language_repository = $language;
	}	

	public function index()
	{
		$instagrams = $this->instagram_repository->getAll();
		return view('admin.instagram.index')->with('instagrams', $instagrams);
	}

	public function create()
	{
		$languages = $this->language_repository->getOptions();
		return view('admin.instagram.create',compact('languages'));
	}

	public function store(Request $request)
	{
		$rules = array(
			'title' => 'required',
			'image' => 'mimes:jpeg,jpg,png,gif|max:10000|required' // max 10000kb
		);
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
            $image_name['image']=$this->uploadImage('image');
			$brand=$this->instagram_repository->create($request->all(),$image_name);
			
            flash()->success(config('message.instagram.add-success'));
            return Redirect('admin/instagram');
				}
    }

	public function edit($id, Request $request)
	{
		$instagram = Instagram::find($id);
		$languages = $this->language_repository->getOptions();
		flash()->success(config('message.instagram.update-success'));
		return view('admin.instagram.edit')->with('instagram', $instagram)->with('languages',$languages);
	}

	public function update($id,Request $request){

		$rules = array(
			'title' => 'required',
			'image' => 'mimes:jpeg,jpg,png,gif' // max 10000kb
		);
		$validator = Validator::make($request->all(), $rules);
		if ($validator->fails()) {
			return Redirect::back()->withInput()->withErrors($validator);
		} else {
          	if (!empty($request->image)) {
				$this->deleteUploadedImage($id);
          	}
            $image_name['image']=$this->uploadImage('image');
			$instagram=$this->instagram_repository->updateById($id,$request->all(),$image_name);
            flash()->success(config('message.instagram.update-success'));
            return Redirect('admin/instagram');
        }
    }

	public function uploadImage($name){
		
		$image_name = "";
		if (Input::hasFile($name)) {
			$file = Input::file($name);
			try{
              $image_name = $this->upload_service->upload($file, '/upload/instagram_img/');
			}catch(Exception $e){
				  flash()->error($e->getMessage());
                  return Redirect::back();
			}

			$img = \Image::make(public_path().'/'.Instagram::Instagram_IMAGE_PATH.$image_name);
			$thumb_path = public_path(Instagram::Instagram_IMAGE_PATH);
			
			if(!\File::isDirectory($thumb_path)){
				\File::makeDirectory($thumb_path);
			}
			$img->fit(375,365)->save($thumb_path.'/'.$image_name);
		}
		return $image_name;

	}
	public function destroy($id)
	{
		$this->deleteUploadedImage($id);
		if ($this->instagram_repository->deleteById($id)) {
				flash()->success(config('message.instagram.delete-success'));
				return Redirect('admin/instagram');
		}
	}
	public function orders(Request $request){
		
		$instagram = $this->instagram_repository->updateOrderInstagram($request->all());
		flash()->success(config('message.instagram.order-success'));
		return Redirect('admin/instagram');
			
	}

    public function deleteUploadedImage($id){
    	$instagram = $this->instagram_repository->getById($id);
        $path = public_path(Instagram::Instagram_IMAGE_PATH.$instagram->image);
        if (file_exists($path)) {
          	unlink($path);
        }
    }
}