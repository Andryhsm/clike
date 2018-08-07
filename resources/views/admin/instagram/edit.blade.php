@extends($layout)
@section('content')

    <section class="content-header">
        @include('notification')
        <h1>
            Modification Instagram
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info alert-dismissible">                    
                    Taille du photo instagram Feed recommandée: 1000 x 1000, Taille de la bannière latérale: 750 x 500
                </div>
                <div class="box box-primary">
                       {{ Form::model($instagram, array('method' => 'PATCH', 'url' => array('admin/instagram', $instagram->id),'class'=>'validate_form','files' => true)) }}
                    <div class="box-body">

                        <div class="form-group">
                            <label for="page_title">Déscription du Instagram</label>
                            {!! Form::text('title', null,array('class'=>'form-control required', 'placeholder'=>'Description Instagram feed')) !!}
                        </div>
                
                        
                        <div class="form-group">
                            <label for="content-heading">Photo Instagram</label>
                            {!!  Form::file('image',['class'=>"form-control"])!!}
                            {{ Form::image('/upload/instagram_img/'.$instagram->image, null, ['class' => 'brand-image'])}}
                        </div>

                        <div class="form-group">
                            {!! Form::label('is_active', 'Activé', ['class' => 'col-sm-1 control-label']) !!}
                            <div class="">
                                {!! Form::checkbox('is_active', '1',($instagram->is_active==1)?true:false) !!}
                            </div>

                        </div>
                    </div>
                    <div class="box-footer">
                     {{--   <a href="{!!  URL::to('/admin/banner/create') !!}" class="btn btn-default">Annuler</a>--}}
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