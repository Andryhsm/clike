                            <section class="content">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box-body mt-30">
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        {!! Form::label('last_name', 'Nom', ['class' => 'col-sm-3 control-label']) !!}
                                                        <div class="col-sm-9">
                                                            {!! Form::text('last_name', ($customer) ? $customer->last_name : null , ['class' => 'form-control required','id'=>'last_name','placeholder'=>"Nom", 'required']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        {!! Form::label('firt_name', 'Prénom', ['class' => 'col-sm-3 control-label']) !!}
                                                        <div class="col-sm-9">
                                                            {!! Form::text('first_name', ($customer) ? $customer->first_name : null , ['class' => 'form-control required','id'=>'first_name','placeholder'=>"Prénom", 'required']) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-12">
                                                        {!! Form::label('address', 'Adresse', ['class' => 'col-sm-3 control-label']) !!}
                                                        <div class="col-sm-9">
                                                            {!! Form::text('address', ($customer && $type_customer==1) ? $customer->address->address1 : ($customer) ? $customer->address : null , ['class' => 'form-control','id'=>'address','placeholder'=>"Adresse"]) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        {!! Form::label('postal_code', 'Code Postal', ['class' => 'col-sm-3 control-label required']) !!}
                                                        <div class="col-sm-9">
                                                            {!! Form::text('postal_code', ($customer && $type_customer==1) ? $customer->address->zip : ($customer) ? $customer->postal_code : null , ['class' => 'form-control','id'=>'postal_code','placeholder'=>"Code postal"]) !!}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        {!! Form::label('country', 'Ville', ['class' => 'col-sm-3 control-label']) !!}
                                                        <div class="col-sm-9">
                                                            {!! Form::text('country', ($customer && $type_customer==1) ? $customer->address->city : ($customer) ? $customer->country : null , ['class' => 'form-control','id'=>'country','placeholder'=>"Ville"]) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-6">
                                                        {!! Form::label('phone_number', 'Téléphone', ['class' => 'col-sm-3 control-label']) !!}
                                                        <div class="col-sm-9">
                                                            {!! Form::text('phone_number', ($customer) ? $customer->phone_number : null , ['class' => 'form-control','id'=>'phone_number','placeholder'=>"Téléphone"]) !!}
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        {!! Form::label('birthday', 'Date de naissance', ['class' => 'col-sm-3 control-label']) !!}
                                                        <div class="col-sm-9">
                                                            {!! Form::text('birthday', ($customer) ? $customer->birthday : null , ['class' => 'form-control datepicker','id'=>'birthday','placeholder'=>"Date de naissance"]) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group col-sm-12">
                                                        {!! Form::label('email', 'Adresse email', ['class' => 'col-sm-3 control-label']) !!}
                                                        <div class="col-sm-9">
                                                            {!! Form::text('email', ($customer) ? $customer->email : null , ['type' => 'email', 'class' => 'form-control required','id'=>'email','placeholder'=>"Adresse email"]) !!}
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="number" class="hidden" id="type_customer" name="type_customer" value="{!! ($customer) ? $type_customer : null !!}"/>
                                                <input type="number" class="hidden" id="customer_id" name="customer_id" value="{!! ($customer && $type_customer==2) ? $customer->customer_id : null !!}"/>
                                                <input type="text" class="hidden" id="user_id" name="user_id" value="{!! ($customer && $type_customer==1) ? $customer->user_id : null !!}"/>
                                                <input type="text" class="hidden" name="store_id" value="{!! Session::get('store_to_user') !!}"/>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <div class="box-footer">
                                    <a href="{!! Url('merchant/customer') !!}" class="btn btn-default">Annuler</a>
                                        <button type="button" class="btn btn-primary pull-right" onclick="validate_customer_info();"> {!! ($customer) ? "Confirmer client" : "Ajouter client"!!}
                                    </button>
                                    <button type="button" class="btn hiden" id="add-customer" href="#tab_2" data-toggle="tab"> {!! ($customer) ? "Confirmer client" : "Ajouter client"!!}
                                    </button>
                                </div>