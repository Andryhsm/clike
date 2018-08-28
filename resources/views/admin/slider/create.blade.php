@extends($layout)
@section('content')

    <section class="content-header">
        @include('notification')
        <h1>
            Nouvelle slider
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!--<div class="alert alert-info alert-dismissible">
                    Taille du slider recommandée: 3000 x 1300 
                </div> -->
                <div class="box box-primary">
                    {!! Form::open(array('url' => 'admin/slider','files' => true,'class'=>'validate_form')) !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="page_title">Titre</label>
                            <input type="text" name="slider_title" class="form-control required" id="page_title"
                                   placeholder="Nom Slider">
                        </div>
                        <div class="form-group">
                            <label for="page_title">Alt slider</label>
                            <input type="text" name="alt" class="form-control required" id="page_title"
                                   placeholder="Alt Slider">
                        </div>
                        <div class="form-group">
                            <label for="page_title">Url slider</label>
                            <input type="text" name="slider_url" class="form-control required" id="slider_url" placeholder="Url Slider">
                        </div>
                        <div class="form-group">
                            <label for="content-heading">slider image</label>
                            {!!  Form::file('slider_image',['class'=>"form-control required"])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('is_active', 'Activé', ['class' => 'col-sm-1 control-label']) !!}
                            <div class="">
                                {!! Form::checkbox('is_active', '1') !!}
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{!!  URL::to('/admin/slider') !!}" class="btn btn-default">Retour</a>
                        <button type="submit" class="btn btn-primary pull-right save-form">Enregistrer</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@stop
@section('footer-scripts')

@stop