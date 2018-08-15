@extends($layout)
@section('content')
    <section class="content-header">
        @include('notification')
        <h1>
            Nouvelle bannière
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info alert-dismissible">
                    Taille de la bannière principale recommandée: 1000 x 1000, Taille de la bannière latérale: 750 x 500
                </div>
                <div class="box box-primary">
                    {!! Form::open(array('url' => 'admin/banner','files' => true,'class'=>'validate_form')) !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="content-heading">Type de bannière</label>
                                {!! Form::select('is_subbanner', [''=>'Type de bannière','1' => 'Bannière principal', '2' => 'Bannière latérale'],(isset($banner)) ? $banner->is_subbanner : null,['class'=>'form-control required','id'=>'is_subbanner']) !!}                            
                        </div>
                        <div class="form-group">
                            <label for="page_title">Nom bannière</label>
                            <input type="text" name="banner_title" class="form-control required" id="page_title"
                                   placeholder="Nom bannière">
                        </div>
                        <div class="form-group">
                            <label for="title">Titre</label>
                            <input type="text" name="title" class="form-control required" id="title"
                                   placeholder="Titre">
                        </div>
                        <div class="form-group">
                            <label for="subtitle">Sous titre</label>
                            <input type="text" name="subtitle" class="form-control required" id="subtitle"
                                   placeholder="Sous titre">
                        </div>
                        <div class="form-group">
                            <label for="page_title">Alt bannière</label>
                            <input type="text" name="alt" class="form-control " id="page_title"
                                   placeholder="Alt bannière">
                        </div>
                        <div class="form-group">
                            <label for="page_title">Url bannière</label>
                            <input type="text" name="banner_url" class="form-control " id="banner_url" placeholder="Url bannière">
                        </div>
                        <div class="form-group">
                            <label for="content-heading">Bannière image</label>
                            {!!  Form::file('french_image',['class'=>"form-control"])!!}
                        </div>
                        <div class="form-group">
                            <label for="content-heading">Bannière image hover</label>
                            {!!  Form::file('french_image_hover',['class'=>"form-control"])!!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('is_active', 'Activé', ['class' => 'col-sm-1 control-label']) !!}
                            <div class="">
                                {!! Form::checkbox('is_active', '1') !!}
                            </div>

                        </div>
                    </div>
                    <div class="box-footer">
                        <a href="{!!  URL::to('/admin/banner') !!}" class="btn btn-default">Retour</a>
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