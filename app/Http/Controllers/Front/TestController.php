<?php

namespace App\Http\Controllers\front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    //
    public function imageZoom()
    {
    	return view('front.test.image.index');
    }

    public function styleElement()
    {
    	return view('front.test.page.style-element');
    }
}
