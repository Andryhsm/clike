@extends($layout)
@section('content')
    <section class="content-header">
        <h1>
            @if($pack)
                Mise à jour Pack
            @else
                Nouvelle Pack
            @endif
        </h1>
    </section>
    <section class="content">
        @include('admin.layout.notification')

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    {!! Form::open(['url' => ($pack) ? Url("admin/pack/$pack->pack_id") :  route("pack.store"), 'class' => '','id' =>'pack_form','method'=>($pack)?'PATCH':'POST']) !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="control-label">Nom</label>
                            <select class="form-control required" name="name">
                                <option value="Découverte" {!! ($pack) ? (($pack->name == "Découverte")?"selected":""):null !!}>Découverte</option>
                                <option value="Vendeur" {!! ($pack) ? (($pack->name == "Vendeur")?"selected":""):null !!}>Vendeur</option>
                                <option value="Marketing" {!! ($pack) ? (($pack->name == "Marketing")?"selected":""):null !!}>Marketing</option>
                                <option value="Marketing +" {!! ($pack) ? (($pack->name == "Marketing +")?"selected":""):null !!}>Marketing +</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="type" class="control-label">Type</label>
                            <select class="form-control required" name="type">
                                <option value="Engagement annuel" {!! ($pack) ? (($pack->type == "Engagement annuel")?"selected":""):null !!}>Engagement annuel</option>
                                <option value="Sans engagement" {!! ($pack) ? (($pack->type == "Sans engagement")?"selected":""):null !!}>Sans engagement</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price" class="control-label">Prix</label>
                            <div class="input-group">
                                <input type="text" name="price" value="{!! ($pack) ? $pack->price:'0' !!}" placeholder="Prix" class="form-control required">
                                 <span class="input-group-addon"> € </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="transaction_fees" class="control-label">Frais de transaction</label>
                            <div class="input-group">
                                <input type="number" name="transaction_fees" value="{!! ($pack) ? $pack->transaction_fees:'0' !!}" placeholder="Frais de transaction" class="form-control required">
                                 <span class="input-group-addon"> % </span>
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('product_visibility', 'Visibilité des produits', ['class' => 'col-sm-2 control-label']) !!}
                            <div class="">
                                {!! Form::checkbox('product_visibility', '1', ($pack) ? (($pack->product_visibility == 1)?true:false) : false) !!}
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-lg-4 row">
                                {!! Form::label('pack_newsletter', 'Newsletters', ['class' => 'col-sm-6 control-label']) !!}
                                <div class="col-sm-6">
                                    {!! Form::checkbox('pack_newsletter', '1', ($pack) ? (($pack->pack_newsletter == 1)?true:false) : false, ['class' => '']) !!}
                                </div>
                            </div>
                            <div class="col-lg-8 show_pack_newsletter hidden">
                                <div class="col-lg-6">
                                    <label for="price" class="control-label col-lg-3">De</label>
                                    <div class="input-group col-lg-9">
                                        <input type="number" name="of" value="{!! ($pack) ? $pack->price:null !!}" class="form-control required">
                                    </div>    
                                </div>
                                <div class="col-lg-6">
                                    <label for="price" class="control-label col-lg-3">à</label>
                                    <div class="input-group col-lg-9">
                                        <input type="number" name="at" value="{!! ($pack) ? $pack->price:null !!}" class="form-control required">
                                    </div>
                                </div>
                            </div>    
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{!! route('pack.index') !!}" class="btn btn-default">Annuler</a>
                        <button type="submit" class="btn btn-primary pull-right" id="add-pack">Enregistrer
                        </button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </section>
@stop
@section('footer-scripts')
    <script type="text/javascript" language="JavaScript">
        $(document).ready(function($) {
            $('#add-pack').click(function () {
                $('#pack_form').validate({
                    rules: {
                        name: {
                            required: true
                        },
                        price: {
                            required: true
                        },
                        type: {
                            required: true
                        }
                    },
                    errorPlacement: function (error, element) {
                        return error.insertAfter(element);
                    }
                });
                if ($('#pack_form').valid()) {
                    $('#pack_form').submit();
                }
            });

            $('#pack_newsletter').click(function(){
                if($('.show_pack_newsletter').hasClass('hidden')){
                    $('.show_pack_newsletter').removeClass('hidden');
                }else{
                    $('.show_pack_newsletter').addClass('hidden');
                }
            });
        });

    </script>
@stop