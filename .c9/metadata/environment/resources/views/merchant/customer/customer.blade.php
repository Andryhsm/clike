{"changed":true,"filter":false,"title":"customer.blade.php","tooltip":"/resources/views/merchant/customer/customer.blade.php","value":"<section class=\"\">\n        <div class=\"col-lg-12\">\n            <div class=\"\">\n                <div class=\"box-body mt-30\">\n                    <div class=\"customer_encasement\">\n                        <div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-12\">\n                            <div class=\"form-group\">\n                                {!! Form::label('last_name', 'Nom', ['class' => 'control-label']) !!}\n                                {!! Form::text('last_name', ($customer) ? $customer->last_name : null , ['class' => 'form-control required','id'=>'last_name','placeholder'=>\"Nom\", 'required']) !!}\n                            </div>\n                            <div class=\"form-group\">\n                                {!! Form::label('address', 'Adresse', ['class' => 'control-label']) !!}\n                                {!! Form::text('address', ($customer && $type_customer==1) ? $customer->address->address1 : ($customer) ? $customer->address : null , ['class' => 'form-control','id'=>'address','placeholder'=>\"Adresse\"]) !!}\n                            </div>\n                            <div class=\"form-group\">\n                                {!! Form::label('country', 'Ville', ['class' => 'control-label']) !!}\n                                {!! Form::text('country', ($customer && $type_customer==1) ? $customer->address->city : ($customer) ? $customer->country : null , ['class' => 'form-control','id'=>'country','placeholder'=>\"Ville\"]) !!}\n                            </div>\n                            <div class=\"form-group\">\n                                {!! Form::label('birthday', 'Date de naissance', ['class' => 'control-label']) !!}\n                                {!! Form::text('birthday', ($customer) ? $customer->birthday : null , ['class' => 'form-control datepicker','id'=>'birthday','placeholder'=>\"Date de naissance\"]) !!}\n                            </div>\n                            \n                        </div>\n                        <div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-12\">\n                            <div class=\"form-group\">\n                                {!! Form::label('firt_name', 'Prénom', ['class' => 'control-label']) !!}\n                                {!! Form::text('first_name', ($customer) ? $customer->first_name : null , ['class' => 'form-control required','id'=>'first_name','placeholder'=>\"Prénom\", 'required']) !!}\n                            </div>\n                            <div class=\"form-group\">\n                                {!! Form::label('postal_code', 'Code Postal', ['class' => 'control-label required']) !!}\n                                {!! Form::text('postal_code', ($customer && $type_customer==1) ? $customer->address->zip : ($customer) ? $customer->postal_code : null , ['class' => 'form-control','id'=>'postal_code','placeholder'=>\"Code postal\"]) !!}\n                            </div>\n                            <div class=\"form-group\">\n                                {!! Form::label('phone_number', 'Téléphone', ['class' => 'control-label']) !!}\n                                \n                                {!! Form::text('phone_number', ($customer) ? $customer->phone_number : null , ['class' => 'form-control','id'=>'phone_number','placeholder'=>\"Téléphone\"]) !!}\n                                \n                            </div>\n                            <div class=\"form-group\">\n                                {!! Form::label('email', 'Adresse email', ['class' => 'control-label']) !!}\n                                {!! Form::text('email', ($customer) ? $customer->email : null , ['type' => 'email', 'class' => 'form-control required','id'=>'email','placeholder'=>\"Adresse email\"]) !!}\n                                \n                            </div>\n                        </div>\n                    </div>\n                    \n                    <input type=\"number\" class=\"hidden\" id=\"type_customer\" name=\"type_customer\" value=\"{!! ($customer) ? $type_customer : null !!}\"/>\n                    <input type=\"number\" class=\"hidden\" id=\"customer_id\" name=\"customer_id\" value=\"{!! ($customer && $type_customer==2) ? $customer->customer_id : null !!}\"/>\n                    <input type=\"text\" class=\"hidden\" id=\"user_id\" name=\"user_id\" value=\"{!! ($customer && $type_customer==1) ? $customer->user_id : null !!}\"/>\n                    <input type=\"text\" class=\"hidden\" name=\"store_id\" value=\"{!! Session::get('store_to_user') !!}\"/>\n                </div>\n            </div>\n            <div class=\"col-lg-12 col-md-12\">\n                <div class=\"box-body\">\n                    <a href=\"{!! Url('merchant/customer') !!}\" class=\"btn btn-merchant-filled\">Annuler</a>\n                    <button type=\"button\" class=\"btn btn-merchant-filled pull-right\" onclick=\"validate_customer_info();\"> {!! ($customer) ? \"Confirmer client\" : \"Ajouter client\"!!}\n                    </button>\n                    <button type=\"button\" class=\"btn hidden\" id=\"add-customer\" href=\"#tab_2\" data-toggle=\"tab\"> {!! ($customer) ? \"Confirmer client\" : \"Ajouter client\"!!}\n                    </button>\n                    <button type=\"button\" class=\"btn btn-default\" onclick=\"\"></button>\n                </div>\n            </div>\n        </div>\n    </section>\n    ","undoManager":{"mark":-2,"position":18,"stack":[[{"start":{"row":59,"column":29},"end":{"row":60,"column":0},"action":"insert","lines":["",""],"id":2},{"start":{"row":60,"column":0},"end":{"row":60,"column":20},"action":"insert","lines":["                    "]},{"start":{"row":60,"column":20},"end":{"row":60,"column":21},"action":"insert","lines":["<"]},{"start":{"row":60,"column":21},"end":{"row":60,"column":22},"action":"insert","lines":[">"]}],[{"start":{"row":60,"column":21},"end":{"row":60,"column":22},"action":"insert","lines":["b"],"id":3},{"start":{"row":60,"column":22},"end":{"row":60,"column":23},"action":"insert","lines":["u"]},{"start":{"row":60,"column":23},"end":{"row":60,"column":24},"action":"insert","lines":["t"]},{"start":{"row":60,"column":24},"end":{"row":60,"column":25},"action":"insert","lines":["t"]},{"start":{"row":60,"column":25},"end":{"row":60,"column":26},"action":"insert","lines":["o"]},{"start":{"row":60,"column":26},"end":{"row":60,"column":27},"action":"insert","lines":["n"]}],[{"start":{"row":60,"column":28},"end":{"row":60,"column":29},"action":"insert","lines":["<"],"id":4},{"start":{"row":60,"column":29},"end":{"row":60,"column":30},"action":"insert","lines":[">"]}],[{"start":{"row":60,"column":29},"end":{"row":60,"column":30},"action":"insert","lines":["/"],"id":5},{"start":{"row":60,"column":30},"end":{"row":60,"column":31},"action":"insert","lines":["b"]},{"start":{"row":60,"column":31},"end":{"row":60,"column":32},"action":"insert","lines":["u"]},{"start":{"row":60,"column":32},"end":{"row":60,"column":33},"action":"insert","lines":["t"]},{"start":{"row":60,"column":33},"end":{"row":60,"column":34},"action":"insert","lines":["t"]},{"start":{"row":60,"column":34},"end":{"row":60,"column":35},"action":"insert","lines":["o"]},{"start":{"row":60,"column":35},"end":{"row":60,"column":36},"action":"insert","lines":["n"]}],[{"start":{"row":60,"column":27},"end":{"row":60,"column":28},"action":"insert","lines":[" "],"id":6},{"start":{"row":60,"column":28},"end":{"row":60,"column":29},"action":"insert","lines":["t"]},{"start":{"row":60,"column":29},"end":{"row":60,"column":30},"action":"insert","lines":["y"]},{"start":{"row":60,"column":30},"end":{"row":60,"column":31},"action":"insert","lines":["p"]},{"start":{"row":60,"column":31},"end":{"row":60,"column":32},"action":"insert","lines":["e"]},{"start":{"row":60,"column":32},"end":{"row":60,"column":33},"action":"insert","lines":["="]}],[{"start":{"row":60,"column":33},"end":{"row":60,"column":35},"action":"insert","lines":["\"\""],"id":7}],[{"start":{"row":60,"column":34},"end":{"row":60,"column":35},"action":"insert","lines":["b"],"id":8},{"start":{"row":60,"column":35},"end":{"row":60,"column":36},"action":"insert","lines":["u"]},{"start":{"row":60,"column":36},"end":{"row":60,"column":37},"action":"insert","lines":["t"]},{"start":{"row":60,"column":37},"end":{"row":60,"column":38},"action":"insert","lines":["t"]},{"start":{"row":60,"column":38},"end":{"row":60,"column":39},"action":"insert","lines":["o"]},{"start":{"row":60,"column":39},"end":{"row":60,"column":40},"action":"insert","lines":["n"]}],[{"start":{"row":60,"column":41},"end":{"row":60,"column":42},"action":"insert","lines":[" "],"id":9},{"start":{"row":60,"column":42},"end":{"row":60,"column":43},"action":"insert","lines":["c"]},{"start":{"row":60,"column":43},"end":{"row":60,"column":44},"action":"insert","lines":["l"]},{"start":{"row":60,"column":44},"end":{"row":60,"column":45},"action":"insert","lines":["a"]},{"start":{"row":60,"column":45},"end":{"row":60,"column":46},"action":"insert","lines":["s"]},{"start":{"row":60,"column":46},"end":{"row":60,"column":47},"action":"insert","lines":["s"]}],[{"start":{"row":60,"column":46},"end":{"row":60,"column":47},"action":"remove","lines":["s"],"id":10}],[{"start":{"row":60,"column":46},"end":{"row":60,"column":47},"action":"insert","lines":["\""],"id":11}],[{"start":{"row":60,"column":46},"end":{"row":60,"column":47},"action":"remove","lines":["\""],"id":12}],[{"start":{"row":60,"column":46},"end":{"row":60,"column":47},"action":"insert","lines":["s"],"id":13},{"start":{"row":60,"column":47},"end":{"row":60,"column":48},"action":"insert","lines":["="]}],[{"start":{"row":60,"column":48},"end":{"row":60,"column":50},"action":"insert","lines":["\"\""],"id":14}],[{"start":{"row":60,"column":49},"end":{"row":60,"column":50},"action":"insert","lines":["b"],"id":15},{"start":{"row":60,"column":50},"end":{"row":60,"column":51},"action":"insert","lines":["t"]},{"start":{"row":60,"column":51},"end":{"row":60,"column":52},"action":"insert","lines":["n"]}],[{"start":{"row":60,"column":52},"end":{"row":60,"column":53},"action":"insert","lines":[" "],"id":16},{"start":{"row":60,"column":53},"end":{"row":60,"column":54},"action":"insert","lines":["b"]},{"start":{"row":60,"column":54},"end":{"row":60,"column":55},"action":"insert","lines":["t"]},{"start":{"row":60,"column":55},"end":{"row":60,"column":56},"action":"insert","lines":["n"]},{"start":{"row":60,"column":56},"end":{"row":60,"column":57},"action":"insert","lines":["-"]},{"start":{"row":60,"column":57},"end":{"row":60,"column":58},"action":"insert","lines":["d"]}],[{"start":{"row":60,"column":58},"end":{"row":60,"column":59},"action":"insert","lines":["e"],"id":17},{"start":{"row":60,"column":59},"end":{"row":60,"column":60},"action":"insert","lines":["f"]},{"start":{"row":60,"column":60},"end":{"row":60,"column":61},"action":"insert","lines":["a"]},{"start":{"row":60,"column":61},"end":{"row":60,"column":62},"action":"insert","lines":["u"]},{"start":{"row":60,"column":62},"end":{"row":60,"column":63},"action":"insert","lines":["l"]},{"start":{"row":60,"column":63},"end":{"row":60,"column":64},"action":"insert","lines":["t"]}],[{"start":{"row":60,"column":65},"end":{"row":60,"column":66},"action":"insert","lines":[" "],"id":18},{"start":{"row":60,"column":66},"end":{"row":60,"column":67},"action":"insert","lines":["o"]},{"start":{"row":60,"column":67},"end":{"row":60,"column":68},"action":"insert","lines":["n"]},{"start":{"row":60,"column":68},"end":{"row":60,"column":69},"action":"insert","lines":["c"]},{"start":{"row":60,"column":69},"end":{"row":60,"column":70},"action":"insert","lines":["l"]},{"start":{"row":60,"column":70},"end":{"row":60,"column":71},"action":"insert","lines":["i"]},{"start":{"row":60,"column":71},"end":{"row":60,"column":72},"action":"insert","lines":["c"]},{"start":{"row":60,"column":72},"end":{"row":60,"column":73},"action":"insert","lines":["k"]}],[{"start":{"row":60,"column":73},"end":{"row":60,"column":74},"action":"insert","lines":["="],"id":20}],[{"start":{"row":60,"column":74},"end":{"row":60,"column":76},"action":"insert","lines":["\"\""],"id":21}]]},"ace":{"folds":[],"scrolltop":567.5,"scrollleft":0,"selection":{"start":{"row":36,"column":10},"end":{"row":36,"column":10},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":140,"mode":"ace/mode/php"}},"timestamp":1528205896557}