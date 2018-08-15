@extends($layout)
@section('content')

   <section class="content-header">
        @include('notification')
        <h1>
            Modification slider
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info alert-dismissible">
                    Taille du slider recommandée: 3000 x 1300 
                </div>
                <div class="box box-primary">
                       {{ Form::model($slider, array('method' => 'PATCH', 'url' => array('admin/slider', $slider->slider_id),'class'=>'validate_form','files' => true)) }}
                    <div class="box-body">
                       
                        <div class="form-group">
                            <label for="page_title">Titre</label>
                            {!! Form::text('slider_title', null,array('class'=>'form-control required', 'placeholder'=>'Slider Name')) !!}
                        </div>
                    
                         <div class="form-group">
                            <label for="page_title">Alt slider</label>
                            {!! Form::text('alt', null,array('class'=>'form-control ', 'placeholder'=>'Alt slider')) !!}
                        </div>
                        <div class="form-group">
                            <label for="page_title">Url slider</label>
                            <input type="text" name="slider_url" class="form-control " id="slider_url" placeholder="Slider Url" value="{!! $slider->url !!}">
                        </div>
                        <div class="form-group">
                            <label for="content-heading">Slider image</label>
                            {!!  Form::file('slider_image',['class'=>"form-control"])!!}
                            {{ Form::image('upload/slider/'.$slider->slider_image, null, ['class' => 'brand-image'])}}
                        </div>
                        <div class="form-group">
                            {!! Form::label('is_active', 'Activé', ['class' => 'col-sm-1 control-label']) !!}
                            <div class="">
                                {!! Form::checkbox('is_active', '1',($slider->is_active==1)?true:false) !!}
                            </div>

                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{!!  URL::to('/admin/slider') !!}" class="btn btn-default">Annuler</a>
                        <button type="submit" class="btn btn-primary pull-right save-form">Modifier</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


@stop
@section('footer-scripts')

@stop