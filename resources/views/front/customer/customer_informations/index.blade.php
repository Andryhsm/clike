@extends('front.customer.layout.master')

@section('content')
<div class="ajax-content customer_info">
    <div class="customer-informations">
        <div class="content col-lg-12 mb-30">
            <form class="customer-form" id="customer-form" action="{!! route('customer-update-info') !!}">
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
    @if(count($card_infos) > 0)
        @foreach($card_infos as $card_info)
            <div class="information-visa" data-card-info-id="{!! $card_info->card_info_id !!}">
                <div class="content">
                    <div class="bottle">
                        <div class="visa-img">
                            <img class="pull-left" src="{!! URL::to('/') !!}/images/icon/visa.svg"></img>
                        </div>
                        <div class="visa-information col-lg-4 col-md-4 col-sm-4 col-xs-6 mini-height">
                            <p class="title-bold-2">VISA (3485)</p>
                            <p>Exp : {!! $card_info->date_expirate !!}</p>
                            <p class="text-uppercase">{!! $customer->last_name !!} {!! $customer->first_name !!}</p>
                        </div>
                        <div class="col-lg-6  col-md-6 col-sm-6 col-xs-4 no-padding pull-right">
                            <button data-url="{!! route('delete-card-info') !!}" data-card-info-id="{!! $card_info->card_info_id !!}" class="btn btn-customer-filled btn-icon pull-right delete-card">
                                <span>Supprimer</span>
                            </button>
                        </div>
                    </div>
                    <div class="text-center">
                        <p>
                            @if($customer->default_card_id == $card_info->card_info_id)
                                Ceci est votre paiement par défaut
                            @else
                            <a href="#" class="default-payment mt-30 mr-20" data-url="{!! route('set-default-card-id') !!}">
                                <i class="icon-mode-payement fa fa-circle-o"></i>
                                Définir comme mode de paiement par défaut
                            </a>
                            @endif
                            {{ Form::text('default_payment', '' ,['class'=>"hidden",'id' => 'default_payment']) }}
                        </p>
                    </div>
                    <?php
                        $date_cart = \Carbon\Carbon::parse($card_info->date_expirate);
                        $now =  $now = \Carbon\Carbon::now();
                    ?>
                    @if($date_cart < $now)
                    <div class="visa-expired col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <img class="mr-10" src="{!! URL::to('/') !!}/images/icon/information.svg"/>
                        <span>Cette carte a expiré</span>
                    </div>
                    @endif
                </div>
            </div>
        @endforeach
    @endif
</div>
@stop