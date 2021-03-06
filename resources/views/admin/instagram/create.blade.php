@extends($layout)
@section('content')

    <section class="content-header">
        @include('notification')
        <h1>
            Nouvelle Instagram Feed
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
              <!--  <div class="alert alert-info alert-dismissible ">
                    Taille du photo recommandée: 375 x 365
                </div> -->
                        <div class="box box-primary">
                            {!! Form::open(array('url' => 'admin/instagram','files' => true,'class'=>'validate_form')) !!}
                            <div class="box-body">
                
                                <div class="form-group">
                                    <label for="title">Description</label>
                                    <input type="text" name="title" class="form-control required" id="title"
                                        placeholder="Description instagram feed">
                                </div>

                                <div class="form-group">
                                    <label for="title">URL</label>
                                    <input type="text" name="url" class="form-control required" id="url"
                                        placeholder="URL instagram feed">
                                </div>

                                <div class="form-group">
                                    <label for="content-heading">Photo Instagram Feed</label>
                                    {!!  Form::file('image',['class'=>"form-control"])!!}
                                </div>
                                <div class="form-group">
                                    {!! Form::label('is_active', 'Activé', ['class' => 'col-sm-1 control-label']) !!}
                                    <div class="">
                                        {!! Form::checkbox('is_active', '1') !!}
                                    </div>

                                </div>
                            </div>
                            <div class="box-footer">
                                {{--<a href="{!!  URL::to('/admin/brand/create') !!}" class="btn btn-default">Annuler</a>--}}
                                <a href="{!!  URL::to('/admin/instagram') !!}" class="btn btn-primary">Return</a>
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