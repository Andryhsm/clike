@extends('front.customer.layout.master')

@section('content')
<div class="ajax-content">
    <div class="customer-informations">
        <div class="content col-lg-12 mb-30">
            <form class="customer-form" id="customer-form">
                <p>
                    <span><a class="gender mt-30 mr-20" id="Femme" onclick="simulateRadioButton(this);">
                        <i class="fa fa-circle-o"></i>&nbsp;&nbsp;&nbsp;&nbsp;Mme
                    </a></span>
                    <span><a class="gender mt-30" id="Homme" onclick="simulateRadioButton(this);">
                        <i class="fa fa-circle-o"></i>&nbsp;&nbsp;&nbsp;&nbsp;M
                    </a></span>
                    {{ Form::text('gender', $customer->gender ,['class'=>"hidden", 'id' =>'gender']) }}
                </p>
                <div class="form-group row mb-0">
                     <div class="col-lg-12">
                        {{ Form::text('first_name', $customer->first_name ,['class'=>"customer-form-item", 'placeholder' =>  'First name', 'id' => 'first_name']) }}
                    </div>
                </div>
                <div class="form-group row mb-0">
                     <div class="col-lg-12">
                        {{ Form::text('last_name', $customer->last_name ,['class'=>"customer-form-item required", 'placeholder' =>  'Last name', 'id' => 'last_name']) }}
                    </div>
                </div>
                <div class="form-group row mb-0">
                     <div class="col-lg-12">
                        {{ Form::email('email', $customer->email ,['class'=>"customer-form-item required", 'placeholder' =>  'Email', 'id' => 'phone']) }}
                    </div>
                </div>
                <div class="form-group row mb-0">
                     <div class="col-lg-12">
                        {{ Form::text('phone', $customer->phone_number ,['class'=>"customer-form-item required", 'placeholder' =>  'Phone number', 'id' => 'phone']) }}
                    </div>
                </div>
                
                <div class="form-group row mb-0">
                     <div class="col-lg-12">
                        {{ Form::text('zip', ($customer->address) ? $customer->address->zip : null ,['class'=>"customer-form-item required", 'placeholder' =>  'Code postal', 'id' => 'zip']) }}
                    </div>
                </div>
                <div class="form-group row mb-0">
                     <div class="col-lg-12">
                        {{ Form::text('city', ($customer->address) ? $customer->address->city : null ,['class'=>"customer-form-item required", 'placeholder' =>  'Ville', 'id' => 'city']) }}
                    </div>
                </div>
                <!--<div class="form-group row mb-0">
                     <div class="col-lg-12">
                        <span>Zone d’achat</span>
                        <button type="button" class="btn btn-customer-bordered ml-40">
                            <span>10Km</span>
                        </button>
                    </div>
                </div>-->
                <div class="form-group row mb-0">
                     <div class="col-lg-12">
                        {{ Form::text('birthday', $customer->birthday ,['class'=>"customer-form-item datepicker", 'placeholder' =>  'Date Anniversaire', 'id' =>'birthday']) }}
                    </div>
                </div>
            </form>
            <div class="text-center mt-30">
                <button class="btn btn-customer-filled" id="save_customer" onclick="updateCustomerInfo()">
                    Sauvegarder
                </button>
            </div>
        </div>
    </div> 
          
    <div class="information-visa">
        <div class="content col-lg-12 mb-30">
            <div class="col-lg-12 mb-10">
                <div class="visa-img">
                    <img class="pull-left" src="{!! URL::to('/') !!}/images/icon/visa.svg"></img>
                </div>
                <div class="visa-information col-lg-4 mini-height">
                    <p class="title-bold-2">VISA (3485)</p>
                    <p>Exp : 10/19</p>
                    <p>DAVID BOITARD</p>
                </div>
                <div class="col-lg-6">
                    <button class="btn btn-customer-filled pull-right">
                        <span>Supprimer</span>
                    </button>
                </div>
            </div>
            <div class="text-center">
                <p>Ceci est votre mode de paiement par défaut</p>
            </div>
            <div class ="visa-expired col-lg-12">
                <span>
                    <i class="fa fa-info-circle"></i>
                </span>
                <span>&nbsp&nbsp Cette carte a expiré</span>
            </div>
        </div>
    </div>
    <div class="information-visa">
        <div class="content col-lg-12 mb-30">
            <div class="col-lg-12 mb-10">
                <div class="visa-img">
                    <img class="pull-left" src="{!! URL::to('/') !!}/images/icon/visa.svg"></img>
                </div>
                <div class="visa-information col-lg-4 mini-height">
                    <p class="title-bold-2">VISA (3485)</p>
                    <p>Exp : 10/19</p>
                    <p>DAVID BOITARD</p>
                </div>
                <div class="col-lg-6">
                    <button class="btn btn-customer-filled pull-right">
                        <span>Supprimer</span>
                    </button>
                </div>
            </div>
            <div class="text-center">
                <p>
                    <a href="#" class="default-payment mt-30 mr-20" id="default_payment" onclick="checka(this);">
                        <i class="fa fa-circle-o"></i>
                        Définir comme mode de paiement par défaut
                    </a>
                    {{ Form::text('default_payment', '' ,['class'=>"hidden",'id' => 'default_payment']) }}
                </p>
            </div>
        </div>
    </div>
</div>
@stop