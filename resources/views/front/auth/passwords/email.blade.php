@extends('front.layout.master')

@section('content')
    <section class="content-block default-bg ptb-50">
        <div class="container">
            <div class="section-title animated animated fadeInUp text-center">
                <h2> MOT DE PASSE OUBLIÉ </h2>
            </div>
            <div class="col-lg-12">
                @include('notification')
            </div>
            <div class="login-area">
            {!! Form::open(['route' => 'auth.reset.submit', 'method' => 'post','id'=>'forgot_password_form', 'role' => 'form','name'=>'forgotPasswordform' ,'class'=>'form-horizontal']) !!}
            <div class="">
                <div class="col-sm-9">
                    {!! Form::input('email', 'email', '', ['class' => 'required','autocomplete' => 'off']) !!}
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-clickee-default mt-0" id="forgot_password">ENVOYER</button>
                </div>
            </div>
<!-- 
            <div class="clearfix">
                
            </div> -->
            {!! Form::close() !!}
         </div>
        </div>
    </section>
@stop