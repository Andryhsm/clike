<<<<<<< HEAD
{"changed":false,"filter":false,"title":"register.blade.php","tooltip":"/resources/views/merchant/register.blade.php","value":"    <div class=\"account-area\">\n            <div class=\"row account\">\n                <div class=\"col-lg-12\">\n                    <div class=\"account-title title text-uppercase mb-26 text-center mt-40\">\n                        <h2>\n                            @if($store)\n                                {!! trans('merchant.update_info') !!}\n                            @elseif(Auth::check())\n                                {!! trans('merchant.add_store') !!}\n                            @else\n                                ENREGISTREMENT DES COMMERÇANTS\n                            @endif\n                        </h2>\n                    </div>\n                </div>\n                <div class=\"register-area register-area-merchant\">\n                    <?php\n                        if($store){\n                            $url = url(LaravelLocalization::getCurrentLocale().\"/store/$store->store_id\");\n                        }elseif(Auth::check()){\n                            $url = url(LaravelLocalization::getCurrentLocale().\"/store\");\n                        }else{\n                            $url = url(LaravelLocalization::getCurrentLocale().'/merchant/sign-up');\n                        }\n                    ?>\n                    \n                    {!! Form::open(['url' =>$url , 'id'=>'store_form', 'method' => ($store) ? 'PATCH' : 'post', 'role' => 'form','class'=>'form-horizontal','enctype' => 'multipart/form-data']) !!}\n                    <div class=\"row\">\n                        <div class=\"section-title\">\n                            <div style=\"height: 110px;\"></div>\n                            <h2 class=\"souligne\">\n                                Mes coordonées\n                            </h2>\n                        </div>\n                    </div>\n                    <div class=\"row\">\n                        <div class=\"row\">\n                        <div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-12 mg-18\">\n                            <div class=\"register-area\">\n                                <div class=\"ptb-7\">\n                                    <label for=\"shop_name\">{!! trans(\"merchant.shop_name\")!!} *</label>\n                                    {{Form::text('shop_name', ($store && $store->store_name !='') ? $store->store_name : null ,['class'=>'form-control required'])}}\n                                </div>\n                                <div class=\"ptb-7\">\n                                    <label for=\"address1\">{!! trans(\"merchant.address_1\")!!} *</label>\n                                    {{Form::text('address1', ($store && $store->address1 !='') ? $store->address1 : null,['class'=>'form-control required','id'=>\"address1\"])}}\n                                </div>\n\n                                <div class=\"ptb-7\">\n                                    <label for=\"address2\">{!! trans(\"merchant.address_2\")!!}</label>\n                                    {{Form::text('address2', ($store && $store->address2 !='') ? $store->address2 : null,['class'=>'form-control','id'=>\"address2\"])}}\n                                </div>\n                                <div class=\"ptb-7\">\n                                    <label for=\"fix_phone\">Numéro de téléphone fixe *</label>\n                                    {{Form::text('fix_phone', ($store && $store->fix_phone !='') ? $store->fix_phone : null,['class'=>'form-control required','id'=>\"fix_phone\"])}}\n                                </div>\n                                <div class=\"ptb-7\">\n                                    <label for=\"country\">{!! trans(\"merchant.country\")!!}* </label>\n                                    <select name=\"country_id\" id=\"country\"\n                                            class=\"required select_merchant\">\n                                        <option value=\"\">Choisissez le pays</option>\n                                        @foreach($countries as $country)\n                                            <option value=\"{!! $country->id !!}\" {!! ($store && $store->country_id == $country->id) ? \"selected\":\"\" !!}>{!! $country->name !!}</option>\n                                        @endforeach\n                                    </select>\n                                </div>\n                            </div>\n                        </div>\n                        <div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-12 mg-18\">\n                            <div class=\"register-area\">\n                                <div class=\"ptb-7\">\n                                    <label for=\"registration_number\"> SIREN *</label>\n                                    {{Form::text('registration_number', ($store) ? $store->registration_number :  null,['class'=>'form-control required'])}}\n                                </div>\n                                <div class=\"ptb-7\">\n                                    <label for=\"city\">{!! trans(\"merchant.city\")!!} *</label>\n                                    {{Form::text('city', ($store) ? $store->city :  null ,['class'=>'form-control required','id'=>\"city\"])}}\n                                </div>\n\n                                <div class=\"ptb-7\">\n                                    <label for=\"zip_code\">{!! trans(\"merchant.zip_code\")!!} *</label>\n                                    {{Form::text('zip_code', ($store) ? $store->zip :  null ,['class'=>'form-control required','id'=>\"zip\"])}}\n                                </div>\n                                <div class=\"ptb-7\">\n                                    <label for=\"cell_phone\">Numéro de téléphone portable *</label>\n                                    {{Form::text('cell_phone', ($store && $store->cell_phone !='') ? $store->cell_phone : null,['class'=>'form-control required','id'=>\"cell_phone\"])}}\n                                </div>\n                                <div class=\"ptb-7\">\n                                    <label for=\"state\">Région *</label>\n                                    <select name=\"state_id\" id=\"state\" class=\"required select_merchant\">\n                                        <option value=\"\">Sélectionnez l'état</option>\n                                    </select>\n                                </div>\n                            </div>\n                        </div>\n                        </div>\n                    </div>\n\n                    <div class=\"row\">\n                        <div class=\"col-md-12 text-center mt-10 mb-20\">\n                            <button type=\"button\" class=\"btn btn-clickee-primary\"\n                                    id=\"confirm_position\">{!! trans('merchant.confirm_position') !!}</button>\n                        </div>\n                        <div class=\"row\">\n                            <div class=\"col-md-6\">\n                                <div class=\"ptb-7\">\n                                    {!! Form::label('latitude', trans('merchant.latitude'), ['class' => 'control-label']) !!}\n                                    {!! Form::text('latitude', ($store) ? $store->latitude :  null, ['class' => 'form-control required','id'=>'latitude']) !!}\n                                </div>\n                            </div>\n                            <div class=\"col-md-6\">\n                                <div class=\"ptb-7\">\n                                    {!! Form::label('longitude', trans('merchant.longitude'), ['class' => 'control-label']) !!}                                \n                                    {!! Form::text('longitude', ($store) ? $store->longitude :  null, ['class' => 'form-control required','id'=>'longitude']) !!}\n                                    \n                                </div>\n                            </div>\n                        </div>    \n                    </div>\n                    <div class=\"row\">\n                        {!! Form::label('tva', 'Numéro TVA Intracommunautaire', ['class' => 'control-label']) !!}\n                        {!! Form::text('tva', ($store) ? $store->tva :  null, ['class' => 'form-control','id'=>'tva']) !!}\n                    </div>\n                    <div class=\"row info-one-day\">\n                        <label class=\"control-label col-lg-12 mt-10 pb-20\" style=\"text-align: left;\">Choisisser les horaires d'ouverture de votre magasin</label>\n                        <div class=\"form-check col-lg-4\">\n                            <a class=\"open-day\" data-day=\"monday\" href=\"#\"><span><i class=\"fa fa-square-o\"></i>&nbsp;&nbsp;&nbsp;&nbsp;Lundi</span></a>\n                            <input type=\"hidden\" name=\"opening_day_id[1]\" class=\"form-check-input\" id=\"monday\" value=\"1\"/>\n                        </div>\n                        <div style=\"position: relative\">\n                            <input type=\"text\" class=\"col-lg-2 form-control open-time\" name=\"opening_hour[1]\" value=\"null\">\n                        </div><span class=\"col-lg-2 text-center\">à</span>\n                        <div style=\"position: relative\">\n                            <input type=\"text\" class=\"col-lg-2 form-control open-time\" name=\"closure_hour[1]\" value=\"null\">\n                        </div>\n                    </div>\n                    <div class=\"row info-one-day\">\n                        <div class=\"form-check col-lg-4\">\n                            <a class=\"open-day\" data-day=\"tuesday\" href=\"#\"><span><i class=\"fa fa-square-o\"></i>&nbsp;&nbsp;&nbsp;&nbsp;Mardi</span></a>\n                            <input type=\"hidden\" name=\"opening_day_id[2]\" class=\"form-check-input\" id=\"tuesday\" value=\"2\"/>\n                        </div>\n                        <div style=\"position: relative\">\n                            <input type=\"text\" class=\"col-lg-2 form-control open-time\" name=\"opening_hour[2]\" value=\"null\">\n                        </div><span class=\"col-lg-2 text-center\">à</span>\n                        <div style=\"position: relative\">\n                            <input type=\"text\" class=\"col-lg-2 form-control open-time\" name=\"closure_hour[2]\" value=\"null\">\n                        </div>\n                    </div>\n                    <div class=\"row info-one-day\">\n                        <div class=\"form-check col-lg-4\">\n                            <a class=\"open-day\" data-day=\"wednesday\" href=\"#\"><span><i class=\"fa fa-square-o\"></i>&nbsp;&nbsp;&nbsp;&nbsp;Mercredi</span></a>\n                            <input type=\"hidden\" name=\"opening_day_id[3]\" class=\"form-check-input\" id=\"wednesday\" value=\"3\"/>\n                        </div>\n                        <div style=\"position: relative\">\n                            <input type=\"text\" class=\"col-lg-2 form-control open-time\" name=\"opening_hour[3]\" value=\"null\">\n                        </div><span class=\"col-lg-2 text-center\">à</span>\n                        <div style=\"position: relative\">\n                            <input type=\"text\" class=\"col-lg-2 form-control open-time\" name=\"closure_hour[3]\" value=\"null\">\n                        </div>\n                    </div>\n                    <div class=\"row info-one-day\">\n                        <div class=\"form-check col-lg-4\">\n                            <a class=\"open-day\" data-day=\"thursday\" href=\"#\"><span><i class=\"fa fa-square-o\"></i>&nbsp;&nbsp;&nbsp;&nbsp;Jeudi</span></a>\n                            <input type=\"hidden\" name=\"opening_day_id[4]\" class=\"form-check-input\" id=\"thursday\" value=\"4\"/>\n                        </div>\n                        <div style=\"position: relative\">\n                            <input type=\"text\" class=\"col-lg-2 form-control open-time\" name=\"opening_hour[4]\" value=\"null\">\n                        </div><span class=\"col-lg-2 text-center\">à</span>\n                        <div style=\"position: relative\">\n                            <input type=\"text\" class=\"col-lg-2 form-control open-time\" name=\"closure_hour[4]\" value=\"null\">\n                        </div>\n                    </div>\n                    <div class=\"row info-one-day\">\n                        <div class=\"form-check col-lg-4\">\n                            <a class=\"open-day\" data-day=\"friday\" href=\"#\"><span><i class=\"fa fa-square-o\"></i>&nbsp;&nbsp;&nbsp;&nbsp;Vendredi</span></a>\n                            <input type=\"hidden\" name=\"opening_day_id[5]\" class=\"form-check-input\" id=\"friday\" value=\"5\"/>\n                        </div>\n                        <div style=\"position: relative\">\n                            <input type=\"text\" class=\"col-lg-2 form-control open-time\" name=\"opening_hour[5]\" value=\"null\">\n                        </div><span class=\"col-lg-2 text-center\">à</span>\n                        <div style=\"position: relative\">\n                            <input type=\"text\" class=\"col-lg-2 form-control open-time\" name=\"closure_hour[5]\" value=\"null\">\n                        </div>\n                    </div>\n                    <div class=\"row info-one-day\">\n                        <div class=\"form-check col-lg-4\">\n                            <a class=\"open-day\" data-day=\"saturday\" href=\"#\"><span><i class=\"fa fa-square-o\"></i>&nbsp;&nbsp;&nbsp;&nbsp;Samedi</span></a>\n                            <input type=\"hidden\" name=\"opening_day_id[6]\" class=\"form-check-input\" id=\"saturday\" value=\"6\"/>\n                        </div>\n                        <div style=\"position: relative\">\n                            <input type=\"text\" class=\"col-lg-2 form-control open-time\" name=\"opening_hour[6]\" value=\"null\">\n                        </div><span class=\"col-lg-2 text-center\">à</span>\n                        <div style=\"position: relative\">\n                            <input type=\"text\" class=\"col-lg-2 form-control open-time\" name=\"closure_hour[6]\" value=\"null\">\n                        </div>\n                    </div>\n                    <div class=\"row info-one-day\">\n                        <div class=\"form-check col-lg-4\">\n                            <a class=\"open-day\" data-day=\"sunday\" href=\"#\"><span><i class=\"fa fa-square-o\"></i>&nbsp;&nbsp;&nbsp;&nbsp;Dimanche</span></a>\n                            <input type=\"hidden\" name=\"opening_day_id[7]\" class=\"form-check-input\" id=\"sunday\" value=\"7\"/>\n                        </div>\n                        <div style=\"position: relative\">\n                            <input type=\"text\" class=\"col-lg-2 form-control open-time\" name=\"opening_hour[7]\" value=\"null\">\n                        </div><span class=\"col-lg-2 text-center\">à</span>\n                        <div style=\"position: relative\">\n                            <input type=\"text\" class=\"col-lg-2 form-control open-time\" name=\"closure_hour[7]\" value=\"null\">\n                        </div>\n                    </div>\n                    <div class=\"row\">\n                        <div class=\"section-title\">\n                            <div class=\"align-title\"></div>\n                            <h2 class=\"souligne\">\n                                {!! trans('merchant.contact') !!}\n                            </h2>\n                        </div>\n                    </div>\n                    <div class=\"row\">\n                        <div class=\"row\">\n                        <div class=\"col-md-6\">\n                            <div class=\"box-body\">\n                                <div class=\"\">\n                                    <label for=\"main_phone\">{!! trans('merchant.main_phone') !!} *</label>\n                                    {!! Form::text('main_phone', ($store) ? $store->phone :  null  , ['class' => 'form-control required','id'=>'main_phone']) !!}\n                                </div>\n                                \n                            </div>\n                        </div>\n                        <div class=\"col-md-6\">\n                            <div class=\"box-body\">\n                                <div class=\"\">\n                                    <label for=\"main_email\">Adresse email  *</label>\n                                    {!! Form::text('main_email',($store) ? $store->email :  null , ['class' => 'form-control required','id'=>'main_email']) !!}\n                                </div>                                \n                            </div>\n                        </div>\n                        </div>\n                    </div>\n                    <div class=\"row\">\n                        <div class=\"section-title\">\n                            <div class=\"align-title\"></div>\n                            <h2 class=\"souligne\">{!! trans('merchant.corporate_identity') !!}</h2>\n                        </div>    \n                    </div>\n                    <div class=\"row\">\n                        <div class=\"row\"> \n                        <div class=\"col-lg-6\">\n                            <div class=\"\">\n                                {!! Form::label('logo', trans('merchant.logo'), ['class' => '']) !!}\n                                {!! Form::file('logo',array('class'=>'form-control','id'=>'logo')) !!}\n                                @if($store && file_exists(public_path('upload/logo/'.$store->logo)))\n                                    <img src=\"{!! url('upload/logo/'.$store->logo) !!}\" height=\"100\" width=\"100\">\n                                @endif\n                            </div>\n                            <div class=\"ptb-7\">\n                                {!! Form::label('shop_image', trans('merchant.shop_picture'), ['class' => '']) !!}\n                                {!! Form::file('shop_image',array('class'=>'form-control','id'=>'shop_image')) !!}\n                                @if($store && file_exists(public_path('upload/shop/'.$store->shop_image)))\n                                    <img src=\"{!! url('upload/shop/'.$store->shop_image) !!}\" height=\"100\" width=\"100\">\n                                @endif\n                            </div>\n                        </div>                   \n                        \n\n                        <div class=\"col-lg-6\">\n                            {!! Form::label('short_description', trans('merchant.short_description'), ['class' => '']) !!}\n                            <textarea class=\"form-control\" id=\"short_description\" placeholder=\"Short Description\"\n                                      name=\"short_description\"\n                                      style=\"width: 100%; height: 128px; font-size: 14px; line-height: 18px; border: 4px solid rgb(4, 70, 81); padding: 10px;border-radius: 0px;\">\n                                @if($store)\n                                    {!!  $store->short_description !!}\n                                @endif\n                                    </textarea>\n                        </div>\n                        </div>\n                    </div>\n\n                    @if($store || Auth::check()==false)\n                        <div class=\"row\">\n                            <div class=\"section-title\">\n                                <div style=\"height: 29px;\"></div>\n                                <h2 class=\"souligne\">\n                                    Directeur(s)\n                                </h2>\n                            </div>\n                        </div>\n\n                        <div class=\"row hidden\">\n                            <div class=\"col-md-6 mr-l-25\">\n                                <div class=\"form-group\">\n                                    <div class=\"checkbox\">\n                                        <label>\n                                            <input type=\"checkbox\" checked=\"checked\">\n                                            {!! trans('merchant.same_as_primary') !!}\n                                        </label>\n                                    </div>\n                                </div>\n                            </div>\n                        </div>\n\n                        @if(!empty($store->users) && count($store->users)>0)\n                        <?php $old_manager_id = []; ?>\n                        @foreach($store->users as $index=>$user)\n                         <?php $key = $index+1;\n                               $old_manager_id[] =  $user->user_id;\n                         ?>\n                        <div class=\"row master_manager\" id=\"{!! $key !!}\">\n                            <div class=\"hidden\">\n                                <div class=\"form-group add-user\">\n                                    @if($key=='1')\n                                        <label><button type=\"button\" class=\"simple-btn btn btn-primary add_user\">{!! trans('merchant.add_user') !!}</button> </label>\n                                    @else\n                                        <label><button type=\"button\" class=\"simple-btn btn btn-primary remove_user\">{!! trans('merchant.remove_user') !!}</button> </label>\n                                    @endif\n                                </div>\n                            </div>\n                            <div class=\"row line-separator hidden\"></div>\n                            <div class=\"title-master-manager\">\n                                @if($key=='1')\n                                    <span> {!! trans('merchant.main_account') !!} / {!! $user->first_name !!} {!! $user->last_name !!}</span>\n                                @else\n                                    <span> {!! trans('merchant.account') !!} #{!! $key !!} &nbsp;&nbsp;&nbsp;&nbsp; <a class=\"remove_user\"><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i></a> </span>\n                                @endif    \n                            </div>\n                            <div class=\"row\">\n                                <div class=\"col-md-6\">\n                                    <div class=\"\">\n                                        {!! Form::label('last_name', trans('merchant.last_name'), ['class' => '']) !!}\n                                        {!! Form::text(\"manager[\".$key.\"][last_name]\", ($store && $user!=null) ?$user->last_name:null , ['class' => 'form-control required','id'=>'last_name']) !!}\n                                        <input type=\"hidden\" name=\"manager[{!! $key !!}][manager_id]\" value=\"{!! ($store && $user!=null) ? $user->user_id:null  !!}\">\n                                    </div>\n                                    <div class=\"\">\n                                        {!! Form::label('sms', \"Téléphone\", ['class' => '']) !!}\n                                        {!! Form::text(\"manager[\".$key.\"][sms]\", ($store && $user!=null) ? $user->phone_number:null, ['class' => 'form-control required','id'=>'sms']) !!}\n                                    </div>\n                                    <div class=\"\">\n                                        {!! Form::label('password', trans('merchant.password'), ['class' => '']) !!}\n                                        {!! Form::password(\"manager[\".$key.\"][password]\", ['class' => 'form-control required password\".$key.\"','id'=>'password','onkeyup'=>'confirmPassword(\".$key.\");']) !!}\n                                    </div>\n                                </div>\n                                <div class=\"col-md-6\">\n                                    <div class=\"\">\n                                        {!! Form::label('first_name', trans('merchant.first_name'), ['class' => '']) !!}\n                                        {!! Form::text(\"manager[\".$key.\"][first_name]\",($store && $user!=null) ? $user->first_name:null, ['class' => 'form-control required','id'=>'first_name']) !!}\n                                    </div>\n                                    <div class=\"\">\n                                        {!! Form::label('email', 'Adresse email' , ['class' => '']) !!}\n                                        {!! Form::text(\"manager[\".$key.\"][email]\", ($store && $user !=null) ? $user->email:null, ['class' => 'form-control required','id'=>'email']) !!}\n                                    </div>\n                                    <div class=\"\">\n                                        {!! Form::label('confirm_password', trans('merchant.confirm_password'), ['class' => '']) !!}\n                                        {!! Form::password(\"manager[\".$key.\"][confirm_password]\", ['class' => 'form-control required confirm_password\".$key.\"','id'=>'confirm_password','onkeyup'=>'confirmPassword(\".$key.\");']) !!}\n                                    </div>\n                                </div>\n                            </div>                            \n\n                            <!-- Anciens checkbox -->\n                            <div class=\"col-md-4 hidden\">\n                                <div class=\"box-body mr-t-23\">\n                                    <div class=\"form-group\">\n                                        <div class=\"checkbox\">\n                                            <label>\n                                                <input type=\"checkbox\" checked=\"checked\" name='manager[{!! $key !!}][global_manager]' id=\"global_manager\" value=\"1\" {!! ($user->pivot->is_global_manager=='1') ? \"checked\":'' !!}>\n                                                {!! trans('merchant.main_account_owner') !!}\n                                            </label>\n                                        </div>\n                                    </div>\n                                    <div class=\"form-group\">\n                                        <div class=\"checkbox\">\n                                            <label>\n                                                <input type=\"checkbox\" checked=\"checked\" name=\"manager[{!! $key !!}][receive_request]\" id=\"receive_request\" {!! ($user->pivot->receive_request=='1') ? \"checked\":'' !!} value=\"1\">\n                                                {!! trans('merchant.receive_purchase_request') !!}\n                                            </label>\n                                        </div>\n                                    </div>\n                                    <div class=\"form-group\">\n                                        <div class=\"checkbox\">\n                                            <label>\n                                                <input type=\"checkbox\" checked=\"checked\" name=\"manager[{!! $key !!}][reply_request]\" id=\"reply_request\" value=\"1\" {!! ($user->pivot->reply_request=='1') ? \"checked\":'' !!}>\n                                                {!! trans('merchant.can_reply_to_request') !!}\n                                            </label>\n                                        </div>\n                                    </div>\n                                </div>\n                            </div>\n                        </div>\n                        @endforeach\n                        <input type=\"hidden\" name=\"old_manager_id\" value=\"{!! implode(',',$old_manager_id) !!}\">\n                        @else\n                            <div class=\"row master_manager\" id=\"1\">\n                                <div class=\"col-lg-12\">\n                                    <div class=\"form-group add-user hidden\">\n                                        <label><button type=\"button\" class=\"simple-btn btn btn-primary add_user\">{!! trans('merchant.add_user') !!}</button> </label>\n                                    </div>\n                                </div>\n                                <div class=\"row line-separator hidden\"></div>\n                                <div class=\"title-master-manager\">\n                                    <span> Compte principal / propriétaire </span>\n                                </div>\n                                <div class=\"row\">\n                                    <div class=\"col-md-6\">\n                                        <div class=\"ptb-7\">\n                                            {!! Form::label('last_name', trans('merchant.last_name'), ['class' => '']) !!}\n                                            {!! Form::text(\"manager[1][last_name]\", null , ['class' => 'form-control required','id'=>'last_name']) !!}\n                                            <input type=\"hidden\" name=\"manager[1][manager_id]\" value=\"null\">\n                                        </div>\n                                        <div class=\"ptb-7\">\n                                            {!! Form::label('sms', \"Téléphone\", ['class' => '']) !!}\n                                            {!! Form::text(\"manager[1][sms]\", null, ['class' => 'form-control required','id'=>'sms']) !!}\n                                        </div>\n                                        <div class=\"ptb-7\">\n                                            {!! Form::label('password', trans('merchant.password'), ['class' => '']) !!}\n                                            {!! Form::password(\"manager[1][password]\", ['class' => 'form-control required password1','id'=>'password','onkeyup'=>'confirmPassword(\"1\");']) !!}\n                                        </div>\n                                    </div>\n                                    <div class=\"col-md-6\">\n                                        <div class=\"ptb-7\">\n                                            {!! Form::label('first_name', trans('merchant.first_name'), ['class' => '']) !!}\n                                            {!! Form::text(\"manager[1][first_name]\",null, ['class' => 'form-control required','id'=>'first_name']) !!}    \n                                        </div>\n                                        <div class=\"ptb-7\">\n                                            {!! Form::label('email', 'Adresse email', ['class' => '']) !!}\n                                            {!! Form::text(\"manager[1][email]\", null, ['class' => 'form-control required','id'=>'email']) !!}\n                                        </div>\n                                        <div class=\"ptb-7\">\n                                            {!! Form::label('confirm_password', trans('merchant.confirm_password'), ['class' => '']) !!}\n                                            {!! Form::password(\"manager[1][confirm_password]\", ['class' => 'form-control required confirm_password1','id'=>'confirm_password','onkeyup'=>'confirmPassword(\"1\");']) !!}\n                                        </div>\n                                    </div>\n                                </div>                                \n\n                                <!-- Les anciens checkbox -->\n                                <div class=\"col-md-4 hidden\">\n                                    <div class=\"box-body mr-t-23\">\n                                        <div class=\"form-group\">\n                                            <div class=\"checkbox\">\n                                                <label>\n                                                    <input type=\"checkbox\" checked=\"checked\" name=\"manager[1][global_manager]\" id=\"global_manager\" value=\"1\">\n                                                    {!! trans('merchant.main_account_owner') !!}\n                                                </label>\n                                            </div>\n                                        </div>\n                                        <div class=\"form-group\">\n                                            <div class=\"checkbox\">\n                                                <label>\n                                                    <input type=\"checkbox\" checked=\"checked\" name=\"manager[1][receive_request]\" id=\"receive_request\" value=\"1\">\n                                                    {!! trans('merchant.receive_purchase_request') !!}\n                                                </label>\n                                            </div>\n                                        </div>\n                                        <div class=\"form-group\">\n                                            <div class=\"checkbox\">\n                                                <label>\n                                                    <input type=\"checkbox\" checked=\"checked\" name=\"manager[1][reply_request]\" id=\"reply_request\" value=\"1\">\n                                                    {!! trans('merchant.can_reply_to_request') !!}\n                                                </label>\n                                            </div>\n                                        </div>\n\n                                    </div>\n                                </div>\n                            </div>                                \n                        @endif\n\n                        <div class=\"text-center add-user-alignement mb-20\">\n                            <button type=\"button\" class=\"btn btn-clickee-primary call_add_user\">{!! trans('merchant.add_user') !!}</button>\n                        </div>\n\n                    @endif\n                    \n                    <div class=\"recaptcha\">  \n                        <div class=\"g-recaptcha col-lg-6 col-sm-7 mt-30 mb-50\" data-sitekey=\"6Le5eVsUAAAAAMngnmm0lir8RAwGphWiT4dkI0Dl\"></div>\n                    </div>\n                    \n                    <div class=\"text-center mr-t-btn\">\n                        <button class=\"btn btn-clickee-primary\" type=\"submit\" id=\"add-store\">{!! trans(\"merchant.complete_registration\")!!}</button>\n                    </div>\n                    {!! Form::close() !!}\n                </div>\n            </div>\n    </div>\n","undoManager":{"mark":-1,"position":-1,"stack":[]},"ace":{"folds":[],"scrolltop":360,"scrollleft":0,"selection":{"start":{"row":12,"column":29},"end":{"row":12,"column":29},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":19,"state":"php-start","mode":"ace/mode/php"}},"timestamp":1527768163281}
=======
{"filter":false,"title":"register.blade.php","tooltip":"/resources/views/merchant/register.blade.php","undoManager":{"mark":27,"position":27,"stack":[[{"start":{"row":130,"column":46},"end":{"row":130,"column":47},"action":"insert","lines":[" "],"id":2}],[{"start":{"row":130,"column":47},"end":{"row":130,"column":55},"action":"insert","lines":["disabled"],"id":3}],[{"start":{"row":133,"column":46},"end":{"row":133,"column":47},"action":"insert","lines":[" "],"id":4}],[{"start":{"row":133,"column":47},"end":{"row":133,"column":55},"action":"insert","lines":["disabled"],"id":5}],[{"start":{"row":142,"column":46},"end":{"row":142,"column":47},"action":"insert","lines":[" "],"id":6}],[{"start":{"row":142,"column":47},"end":{"row":142,"column":55},"action":"insert","lines":["disabled"],"id":7}],[{"start":{"row":145,"column":46},"end":{"row":145,"column":47},"action":"insert","lines":[" "],"id":8}],[{"start":{"row":145,"column":47},"end":{"row":145,"column":55},"action":"insert","lines":["disabled"],"id":9}],[{"start":{"row":154,"column":46},"end":{"row":154,"column":47},"action":"insert","lines":[" "],"id":10}],[{"start":{"row":154,"column":47},"end":{"row":154,"column":55},"action":"insert","lines":["disabled"],"id":11}],[{"start":{"row":157,"column":46},"end":{"row":157,"column":47},"action":"insert","lines":[" "],"id":12}],[{"start":{"row":157,"column":47},"end":{"row":157,"column":55},"action":"insert","lines":["disabled"],"id":13}],[{"start":{"row":166,"column":46},"end":{"row":166,"column":47},"action":"insert","lines":[" "],"id":14}],[{"start":{"row":166,"column":47},"end":{"row":166,"column":55},"action":"insert","lines":["disabled"],"id":15}],[{"start":{"row":169,"column":46},"end":{"row":169,"column":47},"action":"insert","lines":[" "],"id":16}],[{"start":{"row":169,"column":47},"end":{"row":169,"column":55},"action":"insert","lines":["disabled"],"id":17}],[{"start":{"row":178,"column":46},"end":{"row":178,"column":47},"action":"insert","lines":[" "],"id":18}],[{"start":{"row":178,"column":47},"end":{"row":178,"column":55},"action":"insert","lines":["disabled"],"id":19}],[{"start":{"row":181,"column":46},"end":{"row":181,"column":47},"action":"insert","lines":[" "],"id":20}],[{"start":{"row":181,"column":47},"end":{"row":181,"column":55},"action":"insert","lines":["disabled"],"id":21}],[{"start":{"row":190,"column":46},"end":{"row":190,"column":47},"action":"insert","lines":[" "],"id":22}],[{"start":{"row":190,"column":47},"end":{"row":190,"column":55},"action":"insert","lines":["disabled"],"id":23}],[{"start":{"row":193,"column":46},"end":{"row":193,"column":47},"action":"insert","lines":[" "],"id":24}],[{"start":{"row":193,"column":47},"end":{"row":193,"column":55},"action":"insert","lines":["disabled"],"id":25}],[{"start":{"row":202,"column":46},"end":{"row":202,"column":47},"action":"insert","lines":[" "],"id":26}],[{"start":{"row":202,"column":47},"end":{"row":202,"column":55},"action":"insert","lines":["disabled"],"id":27}],[{"start":{"row":205,"column":46},"end":{"row":205,"column":47},"action":"insert","lines":[" "],"id":28}],[{"start":{"row":205,"column":47},"end":{"row":205,"column":55},"action":"insert","lines":["disabled"],"id":29}]]},"ace":{"folds":[],"scrolltop":2460,"scrollleft":0,"selection":{"start":{"row":205,"column":55},"end":{"row":205,"column":55},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":{"row":133,"state":"start","mode":"ace/mode/php"}},"timestamp":1527781310506,"hash":"7570f52341036767c2af1dd67b02825abef77650"}
>>>>>>> ab7305995cc9681f7d1eec2cb9a9ad1473ac0374
