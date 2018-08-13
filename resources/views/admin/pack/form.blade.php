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
                                <input type="text" name="price" value="{!! ($pack) ? $pack->price:null !!}" placeholder="Prix" class="form-control required">
                                 <span class="input-group-addon"> € </span>
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
        });

    </script>
@stop