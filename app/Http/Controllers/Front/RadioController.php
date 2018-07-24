<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\RadioRepository;

class RadioController extends Controller
{
    protected $radio_repository;

	public function __construct(RadioRepository $radio_repository)
	{
		$this->radio_repository = $radio_repository;
	}
    
    public function getRadioByZip($zip)
    {
        $radio = $this->radio_repository->findRadio($zip);
        if($radio){
            if(stristr($radio->url, "http://") === TRUE  || stristr($radio->url, "https://") === TRUE) {
                return \Redirect::to($radio->url);
            }else{
                return \Redirect::to('http://'.$radio->url);
            }
        }
    }

    public function verifyRadio(Request $request)
    {
        $zip_code = $request->get('zip_code');

        $radio = $this->radio_repository->findRadio($zip_code);

        return response()->json(['radio' => $radio]);
    }
}
