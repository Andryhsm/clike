{"changed":true,"filter":false,"title":"AuthController.php","tooltip":"/app/Http/Controllers/Front/Auth/AuthController.php","value":"<?php\n\nnamespace App\\Http\\Controllers\\front\\Auth;\n\nuse App\\Events\\UserRegistered;\nuse App\\Repositories\\UserRepository;\nuse Illuminate\\Http\\Request;\nuse App\\Http\\Controllers\\Controller;\nuse Illuminate\\Support\\Facades\\Auth;\nuse Illuminate\\Support\\Facades\\Redirect;\nuse Illuminate\\Support\\Facades\\Validator;\nuse Illuminate\\Support\\Facades\\Event;\nuse Laravel\\Socialite\\Facades\\Socialite;\nuse Mcamara\\LaravelLocalization\\Facades\\LaravelLocalization;\nuse App\\Interfaces\\BrandRepositoryInterface;\nuse App\\Interfaces\\RegionRepositoryInterface;\nuse App\\BrandTag;\nuse Illuminate\\Support\\Facades\\Cookie;\nuse Illuminate\\Support\\Facades\\Session;\n\nclass AuthController extends Controller\n{\n\n    protected $user_repository;\n    public function __construct(UserRepository $user_repository,RegionRepositoryInterface $region_repo, BrandRepositoryInterface $brand_repo){\n        $this->user_repository=$user_repository;\n        $this->region_repository = $region_repo;\n        $this->brand_repository = $brand_repo;\n    }\n    /**\n     * Display a listing of the resource.\n     *\n     * @return \\Illuminate\\Http\\Response\n     */\n    public function getLogin()\n    {\n        //\n        return view('front.auth.content');\n    }\n\n    public function getMerchantLogin()\n\t{\n        $countries = $this->region_repository->getCountries();\n        $store = false;\n        $brands = $this->brand_repository->lists();\n        $brand_tags = BrandTag::get();\n\t\treturn view('merchant.content', compact('countries', 'store', 'brands', 'brand_tags'));\n\t}\n\n\tpublic function postMerchantLogin(Request $request)\n\t{\n\t\t$rules = array(\n\t\t\t'email' => 'required',\n\t\t\t'password' => 'required',\n\t\t);\n\t\t$validator = Validator::make($request->all(), $rules);\n        \n\t\tif ($validator->fails()) {\n\t\t\treturn Redirect::back()->withInput()->withErrors($validator);\n\t\t} else {\n\t\t\tif (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password'), 'status' => '1','role_id'=>'2'])) {\n\t\t\t\t$user = Auth::getLastAttempted();\n\t\t\t\tAuth::login($user, $request->has('memory'));\n\t\t\t\tSession::put('store_to_user', $user->store[0]->store_id);\n\t\t\t\treturn redirect()->route('merchant-dashboard');\n\t\t\t}\n\t\t}\n\t\treturn Redirect::back()\n\t\t\t->withInput()->withErrors('Your email address/password combination is incorrect.');\n\t}\n\n    /**\n     * Show the form for creating a new resource.\n     *\n     * @return \\Illuminate\\Http\\Response\n     */\n    public function getRegister()\n    {\n        return view('front.auth.register')->with('role_id',1);\n    }\n\n    public function postLogin(Request $request)\n    {\n        $rules = array(\n            'email' => 'required',\n            'password' => 'required',\n        );\n        $validator = Validator::make($request->all(), $rules);\n        if ($validator->fails()) {\n            return Redirect::back()->withInput()->withErrors($validator);\n        } else {\n            if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password'), 'status' => '1','role_id'=>'1'])) {\n\t\t\t\t$user = Auth::getLastAttempted();\n                //add_info_cookie_area($user->address->zip, $user->radius);\n                Auth::login($user, $request->has('memory'));\n\t\t\t\t$intended_url = \\Session::get('url.intended', '');\n\t\t\t\tif(!Cookie::has('zip-code') && !Cookie::has('radius')){\n\t\t\t\t    add_area_in_cookie($user->address->zip, $user->radius);\n                }else{\n                    $user = \\App\\User::find(auth()->user()->user_id);\n                    $user->radius = Cookie::get('radius');\n                    $user->save();\n                    $user_address = $user->address;\n                    $user_address->zip = Cookie::get('zip-code');\n                    $user_address->save();\n                }\n\t\t\t\tif (ends_with($intended_url, 'caisse/confirmation')) {\n\t\t\t\t\treturn redirect()->route('cart');\n\t\t\t\t}\n\t\t\t\tif(\\Session::has('ask-product')){\n\t\t\t\t\t$ask_product = \\Session::get('ask-product');\n\t\t\t\t\treturn redirect()->route('ask-product-search', ['keyword' => $ask_product['keyword']]);\n\t\t\t\t\t//return Redirect::to('ask-product/search?keyword='.$ask_product['keyword']);\n\t\t\t\t}\n\t\t\t\treturn redirect()->route('customer-commande-en-cours');\n            }\n        }\n        return Redirect::back()\n            ->withInput()->withErrors('Your email address/password combination is incorrect.');\n    }\n\n    public function saveUser(Request $request)\n    {\n        $rules = array(\n            'first_name' => 'required',\n            'last_name' => 'required',\n            'email' => 'required|email|unique:users',\n            'password' => 'required',\n            'confirm_password' => 'required|same:password',\n            'g-recaptcha-response'=>'required|recaptcha'\n        );\n        $validator = Validator::make($request->all(), $rules);\n        if ($validator->fails()) {\n            return Redirect::back()->withInput()->withErrors($validator);\n        } else {\n            try {\n                $user = $this->user_repository->saveUser($request->all());\n                //add_info_cookie_area($user->address->zip, $user->radius);\n                Event::fire(new UserRegistered($user));\n\t\t\t\tAuth::login($user);\n\t\t\t\tflash()->success(trans('form.register_success_message'));\n\t\t\t} catch (\\Exception $e) {\n                flash()->error(trans('form.register_error_message'));\n                return Redirect::back();\n                //dd($e->getMessage());\n            }\n            return redirect()->route('customer-commande-en-cours');\n        }\n    }\n\n\n    public function redirectToProvider($provider)\n    {\n        return Socialite::driver($provider)->redirect();\n    }\n\n    public function handleProviderCallback($provider)\n    {\n        if($provider == 'google' || $provider == 'facebook')\n            $user = Socialite::driver($provider)->stateless()->user();\n        else\n            $user = Socialite::driver($provider)->user();\n        $authUser = $this->findOrCreateUser($user, $provider);    \n        Auth::login($authUser, true);\n        flash()->success(config('message.user.success-login'));\n        \\Session::forget('role_id');\n        return redirect()->route('home');\n    }\n\n    public function findOrCreateUser($user, $provider)\n    {\n        $users = $this->user_repository->getByEmail($user->email);\n        if ($users) {\n            return $users;\n        }\n        $user = ($provider == 'google') ? $this->getGoogleUser($user) : $this->getUser($user);\n        try{\n            $user_data = $this->user_repository->saveUserBySocialMedia($user, $provider);\n            return $user_data;\n        }catch (\\Exception $e){\n            flash()->error($e->getMessage());\n        }\n\n\n    }\n\n    public function getUser($user)\n    {\n        $user_data = [];\n        if (!empty($user)) {\n            $name = $this->getFirstAndLastname($user->name);\n            $user_data['first_name'] = (!empty($name[0])) ? $name[0] : null;\n            $user_data['last_name'] = (!empty($name[1])) ? $name[1] : $name[0];\n            $user_data['email'] = ($user->email != null) ? $user->email : $user_data['first_name'].\"\".ucfirst($user_data['last_name']).\"@alternateeve.com\";\n            $user_data['id'] = $user->id;\n        }\n        return $user_data;\n    }\n\n    public function getGoogleUser($user)\n    {\n        $user_data = [];\n        if (!empty($user)) {\n            $user_data['first_name'] = $user->user['name']['givenName'];\n            $user_data['last_name'] = $user->user['name']['familyName'];\n            $user_data['email'] = $user->email;\n            $user_data['id'] = $user->id;\n        }\n        return $user_data;\n    }\n\n    public function getFirstAndLastname($full_name)\n    {\n        return array_values(array_filter(explode(\" \", $full_name)));\n    }\n\n    public function destroy()\n    {\n    \t$user =  Auth::user();\n        Auth::logout();\n\t\t\\Session::flush();\n\t\tflash()->success(config('message.user.success-logout'));\n\t\tif($user->role_id=='2')\n\t\t{\n\t\t\treturn redirect()->route('merchant-login');\n\t\t} else {\n\t\t\treturn redirect()->route('login');\n\t\t}\n    }\n    \n    public function loginInMerchant(){\n        $user =  Auth::user();\n        Auth::logout();\n    \t\\Session::flush();\n    \tflash()->success(config('message.user.success-logout'));\n    \treturn redirect()->route('merchant-login');\n    }\n}\n\n","undoManager":{"mark":60,"position":59,"stack":[[{"start":{"row":113,"column":19},"end":{"row":113,"column":23},"action":"remove","lines":["::to"],"id":635,"ignore":true}],[{"start":{"row":113,"column":13},"end":{"row":113,"column":19},"action":"remove","lines":["direct"],"id":636,"ignore":true}],[{"start":{"row":113,"column":12},"end":{"row":113,"column":13},"action":"remove","lines":["e"],"id":637,"ignore":true}],[{"start":{"row":113,"column":11},"end":{"row":113,"column":12},"action":"remove","lines":["R"],"id":638,"ignore":true},{"start":{"row":113,"column":11},"end":{"row":113,"column":14},"action":"insert","lines":["red"]}],[{"start":{"row":113,"column":14},"end":{"row":113,"column":17},"action":"insert","lines":["ire"],"id":639,"ignore":true}],[{"start":{"row":113,"column":17},"end":{"row":113,"column":20},"action":"insert","lines":["ct-"],"id":640,"ignore":true}],[{"start":{"row":113,"column":19},"end":{"row":113,"column":20},"action":"remove","lines":["-"],"id":641,"ignore":true}],[{"start":{"row":113,"column":19},"end":{"row":113,"column":21},"action":"insert","lines":["(="],"id":642,"ignore":true}],[{"start":{"row":113,"column":21},"end":{"row":113,"column":22},"action":"insert","lines":[")"],"id":643,"ignore":true}],[{"start":{"row":113,"column":20},"end":{"row":113,"column":21},"action":"remove","lines":["="],"id":644,"ignore":true}],[{"start":{"row":113,"column":21},"end":{"row":113,"column":23},"action":"insert","lines":["->"],"id":645,"ignore":true}],[{"start":{"row":113,"column":23},"end":{"row":113,"column":24},"action":"insert","lines":["r"],"id":646,"ignore":true}],[{"start":{"row":113,"column":24},"end":{"row":113,"column":27},"action":"insert","lines":["pit"],"id":647,"ignore":true}],[{"start":{"row":113,"column":24},"end":{"row":113,"column":27},"action":"remove","lines":["pit"],"id":648,"ignore":true}],[{"start":{"row":113,"column":24},"end":{"row":113,"column":26},"action":"insert","lines":["ou"],"id":649,"ignore":true}],[{"start":{"row":113,"column":26},"end":{"row":113,"column":28},"action":"insert","lines":["te"],"id":650,"ignore":true}],[{"start":{"row":113,"column":30},"end":{"row":113,"column":31},"action":"remove","lines":["/"],"id":651,"ignore":true}],[{"start":{"row":113,"column":38},"end":{"row":113,"column":39},"action":"remove","lines":["/"],"id":652,"ignore":true}],[{"start":{"row":113,"column":38},"end":{"row":113,"column":39},"action":"insert","lines":["-"],"id":653,"ignore":true}],[{"start":{"row":110,"column":49},"end":{"row":111,"column":6},"action":"insert","lines":["","\t\t\t\t\tr"],"id":654,"ignore":true}],[{"start":{"row":111,"column":6},"end":{"row":111,"column":9},"action":"insert","lines":["edi"],"id":655,"ignore":true}],[{"start":{"row":111,"column":9},"end":{"row":111,"column":11},"action":"insert","lines":["re"],"id":656,"ignore":true}],[{"start":{"row":110,"column":49},"end":{"row":111,"column":11},"action":"remove","lines":["","\t\t\t\t\tredire"],"id":657,"ignore":true}],[{"start":{"row":110,"column":49},"end":{"row":111,"column":60},"action":"insert","lines":["","\t\t\t\t\treturn redirect()->route('customer-commande-en-cours');"],"id":658,"ignore":true}],[{"start":{"row":111,"column":31},"end":{"row":111,"column":57},"action":"remove","lines":["customer-commande-en-cours"],"id":659,"ignore":true},{"start":{"row":111,"column":31},"end":{"row":111,"column":49},"action":"insert","lines":["ask-product/search"]}],[{"start":{"row":112,"column":5},"end":{"row":112,"column":7},"action":"insert","lines":["//"],"id":660,"ignore":true}],[{"start":{"row":111,"column":42},"end":{"row":111,"column":43},"action":"remove","lines":["/"],"id":661,"ignore":true},{"start":{"row":111,"column":42},"end":{"row":111,"column":43},"action":"insert","lines":["-"]}],[{"start":{"row":111,"column":50},"end":{"row":111,"column":52},"action":"insert","lines":[", "],"id":662,"ignore":true}],[{"start":{"row":111,"column":52},"end":{"row":111,"column":54},"action":"insert","lines":["[]"],"id":663,"ignore":true}],[{"start":{"row":111,"column":53},"end":{"row":111,"column":55},"action":"insert","lines":["''"],"id":664,"ignore":true}],[{"start":{"row":111,"column":54},"end":{"row":111,"column":61},"action":"insert","lines":["keyword"],"id":665,"ignore":true}],[{"start":{"row":111,"column":62},"end":{"row":111,"column":63},"action":"insert","lines":[" "],"id":666,"ignore":true}],[{"start":{"row":111,"column":63},"end":{"row":111,"column":66},"action":"insert","lines":["=> "],"id":667,"ignore":true}],[{"start":{"row":111,"column":66},"end":{"row":111,"column":89},"action":"insert","lines":["$ask_product['keyword']"],"id":668,"ignore":true}],[{"start":{"row":146,"column":33},"end":{"row":146,"column":56},"action":"remove","lines":["/customer/current-order"],"id":669,"ignore":true},{"start":{"row":146,"column":33},"end":{"row":146,"column":59},"action":"insert","lines":["customer-commande-en-cours"]}],[{"start":{"row":146,"column":19},"end":{"row":146,"column":32},"action":"remove","lines":["Redirect::to("],"id":670,"ignore":true},{"start":{"row":146,"column":19},"end":{"row":146,"column":37},"action":"insert","lines":["redirect()->route("]}],[{"start":{"row":166,"column":15},"end":{"row":166,"column":28},"action":"remove","lines":["Redirect::to("],"id":671,"ignore":true},{"start":{"row":166,"column":15},"end":{"row":166,"column":33},"action":"insert","lines":["redirect()->route("]}],[{"start":{"row":166,"column":34},"end":{"row":166,"column":35},"action":"remove","lines":["/"],"id":672,"ignore":true}],[{"start":{"row":166,"column":34},"end":{"row":166,"column":37},"action":"insert","lines":["hom"],"id":673,"ignore":true}],[{"start":{"row":166,"column":37},"end":{"row":166,"column":38},"action":"insert","lines":["e"],"id":674,"ignore":true}],[{"start":{"row":64,"column":11},"end":{"row":64,"column":23},"action":"remove","lines":["Redirect::to"],"id":675},{"start":{"row":64,"column":11},"end":{"row":64,"column":28},"action":"insert","lines":["redirect()->route"]}],[{"start":{"row":64,"column":38},"end":{"row":64,"column":39},"action":"remove","lines":["/"],"id":676},{"start":{"row":64,"column":38},"end":{"row":64,"column":39},"action":"insert","lines":["-"]}],[{"start":{"row":224,"column":10},"end":{"row":224,"column":27},"action":"remove","lines":["Redirect::to(url("],"id":677,"ignore":true},{"start":{"row":224,"column":10},"end":{"row":224,"column":28},"action":"insert","lines":["redirect()->route("]}],[{"start":{"row":224,"column":45},"end":{"row":224,"column":46},"action":"remove","lines":[")"],"id":678,"ignore":true}],[{"start":{"row":224,"column":38},"end":{"row":224,"column":39},"action":"remove","lines":["/"],"id":679,"ignore":true},{"start":{"row":224,"column":38},"end":{"row":224,"column":39},"action":"insert","lines":["-"]}],[{"start":{"row":224,"column":29},"end":{"row":224,"column":30},"action":"remove","lines":["/"],"id":680,"ignore":true}],[{"start":{"row":226,"column":10},"end":{"row":226,"column":29},"action":"remove","lines":["Redirect::to(url('/"],"id":681,"ignore":true},{"start":{"row":226,"column":10},"end":{"row":226,"column":28},"action":"insert","lines":["redirect()->route("]}],[{"start":{"row":226,"column":28},"end":{"row":226,"column":29},"action":"insert","lines":["'"],"id":682,"ignore":true}],[{"start":{"row":226,"column":36},"end":{"row":226,"column":37},"action":"remove","lines":[")"],"id":683,"ignore":true}],[{"start":{"row":235,"column":12},"end":{"row":235,"column":29},"action":"remove","lines":["Redirect::to(url("],"id":684,"ignore":true},{"start":{"row":235,"column":12},"end":{"row":235,"column":30},"action":"insert","lines":["redirect()->route("]}],[{"start":{"row":235,"column":40},"end":{"row":235,"column":41},"action":"remove","lines":["/"],"id":685,"ignore":true}],[{"start":{"row":235,"column":40},"end":{"row":235,"column":41},"action":"insert","lines":["-"],"id":686,"ignore":true}],[{"start":{"row":235,"column":31},"end":{"row":235,"column":32},"action":"remove","lines":["/"],"id":687,"ignore":true}],[{"start":{"row":235,"column":46},"end":{"row":235,"column":47},"action":"remove","lines":[")"],"id":688,"ignore":true}],[{"start":{"row":106,"column":37},"end":{"row":106,"column":42},"action":"remove","lines":["ckout"],"id":689,"ignore":true}],[{"start":{"row":106,"column":34},"end":{"row":106,"column":37},"action":"remove","lines":["che"],"id":690,"ignore":true},{"start":{"row":106,"column":34},"end":{"row":106,"column":36},"action":"insert","lines":["ca"]}],[{"start":{"row":106,"column":36},"end":{"row":106,"column":40},"action":"insert","lines":["isse"],"id":691,"ignore":true}],[{"start":{"row":106,"column":48},"end":{"row":106,"column":53},"action":"remove","lines":["-cart"],"id":692,"ignore":true}],[{"start":{"row":106,"column":48},"end":{"row":106,"column":53},"action":"insert","lines":["ation"],"id":693,"ignore":true}],[{"start":{"row":107,"column":12},"end":{"row":107,"column":25},"action":"remove","lines":["Redirect::to("],"id":694,"ignore":true},{"start":{"row":107,"column":12},"end":{"row":107,"column":30},"action":"insert","lines":["redirect()->route("]}],[{"start":{"row":129,"column":12},"end":{"row":129,"column":13},"action":"insert","lines":["/"],"id":703},{"start":{"row":129,"column":13},"end":{"row":129,"column":14},"action":"insert","lines":["/"]}]]},"ace":{"folds":[],"scrolltop":1892,"scrollleft":0,"selection":{"start":{"row":49,"column":52},"end":{"row":49,"column":52},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":134,"mode":"ace/mode/php"}},"timestamp":1528988512580}