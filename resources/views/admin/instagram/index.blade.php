
@extends($layout)

@section('additional-styles')
    {!! Html::style('backend/plugins/datatables/dataTables.bootstrap.css') !!}
@stop
<style>
     /* Systeme draggable dans gestion Instagram */
        [draggable] {
            -moz-user-select: none;
            -khtml-user-select: none;
            -webkit-user-select: none;
            user-select: none;
            -khtml-user-drag: element;
            -webkit-user-drag: element;
          }
          .listItem {
            margin: 0px;
            background-color: #f4f4f4;
            color: white;
            width: 10px;
            border-top: thick solid white;
            border-top-width: 1px;
            -webkit-transition: all 0.2s ease-out;
            -moz-transition: all 0.2s ease-out;
            -ms-transition: all 0.2s ease-out;
            -o-transition: all 0.2s ease-out;
            transition: all 0.2s ease-out;
          }
          .dataTransferClass {
            background-color: #f4f4f4;
          }
          .dragStartClass {
            opacity: 0;
            -webkit-transition: all 0.2s ease-out;
            -moz-transition: all 0.2s ease-out;
            -ms-transition: all 0.2s ease-out;
            -o-transition: all 0.2s ease-out;
            transition: all 0.2s ease-out;
          }
          .listItem.over {
            border-top: thick solid white;
            border-top-width: 50px;
            -webkit-transition: all 0.2s ease-out;
            -moz-transition: all 0.2s ease-out;
            -ms-transition: all 0.2s ease-out;
            -o-transition: all 0.2s ease-out;
            transition: all 0.2s ease-out;
          }
    /* END Systeme draggable dans gestion Instagram */
</style>
@section('content')
<section class="content-header">
    <h1>
        Liste des Photos Instagrams Feeds
    </h1>
    <div class="header-btn">
        <div class="clearfix">
            <div class="btn-group inline pull-left">
                <div class="btn btn-small">
                    <a href="{!! URL::to('/admin/instagram/create') !!}" class="btn btn-block btn-primary"> Nouvelle Instagram Feed </a>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Fin Liste des Instagrams feed -->

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Instagram Feed</th>
                            <th class="no-sort">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($instagrams as $instagram)
                        <tr>
                            <td>{!! $instagram->title !!}</td>
                            <td>
                                @if($instagram->is_active=='1')
                                    <span class="badge bg-green">Active</span>
                                @else
                                    <span class="badge bg-light-blue">Inactive</span>
                                @endif
                            </td>
                            <td><img src="{!! url('upload/instagram_img/'. $instagram->image) !!}" class="preview-image"></td>
                            <td>
                                <div class="btn-group">
                                        <a href="{{ URL::to('admin/instagram/' . $instagram->id . '/edit') }}"  class="btn btn-default btn-sm" title="Edit"><i class="fa fa-fw fa-edit"></i></a>
                                        {!! Form::open(array('url' => 'admin/instagram/' . $instagram->id, 'class' => 'pull-right', 'method'=>'POST')) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        {!! Form::button('<i class="fa fa-fw fa-trash"></i>', ['type' => 'submit', 'class' => 'btn delete-btn btn-default btn-sm'] ) !!}
                                        {{ Form::close() }}
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>


                    <!-- Liste des ordres affichage -->
                    <div class="box-footer">
                        <input type="button" name="answer" class="btn btn-primary" onclick="showDiv('toggle')" value="Voir les orders"></input>
                    </div>
                    <div id="toggle" style="display:none">
                        <h3>
                            Modification des Orders affichages des Instagrams Feeds
                        </h3>
                        {!! Form::open(array('url' => 'admin/instagram/images' ,'class' => 'pull-right', 'method'=>'POST')) !!}
                            <div  id="checklist">
                                <div class='list-group gallery'>
                                        @if($instagram->count())
                                            @foreach($instagrams as $instagram)
                                            @if($instagram->is_active =='1')
                                            <div class='col-sm-4 col-xs-6 col-md-3 col-lg-3 listItem' draggable="true">
                                            <input type="hidden" name="orders[]"  value="orders">
                                            <input type="hidden" name="ids[]"  value="{!! $instagram->id !!}">
                                                <a class="thumbnail fancybox" rel="ligthbox" href="">
                                                    <img class="img-responsive" alt="" src="/upload/instagram_img/{{ $instagram->image }}" />
                                                    <div class='text-center'>
                                                        <small class='text-muted'>{{ $instagram->title }}</small>
                                                    </div> 
                                                </a>
                                            </div> 
                                            @endif
                                            @endforeach
                                        @endif
                                    </div>
                                </div> 
                            <div class="box-footer">
                                    <button type="submit" class="btn btn-primary pull-right save-form">Validate the order</button>
                            </div>
                            {{ Form::close() }}
                    </div>
                    
                    <!-- End Liste des ordres affichage -->

                </div>
            </div>
        </div>
    </div>
    
       
</section>
    <!-- Fin Liste des Instagrams feed -->
@stop
@section('additional-scripts')
    {!! Html::script('backend/js/instagram.js') !!}
    {!! Html::script('backend/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('backend/plugins/datatables/dataTables.bootstrap.min.js') !!}
@stop

@section('footer-scripts')
    {!! Html::script('backend/js/banner.js') !!}
@stop
