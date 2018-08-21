@extends($layout)

@section('additional-styles')
    {!! Html::style('backend/plugins/datatables/dataTables.bootstrap.css') !!}
@stop
@section('content')
    <section class="content-header">
        <h1>
            Liste des sliders
        </h1>
        <div class="header-btn">
            <div class="clearfix">
                <div class="btn-group inline pull-left">
                    <div class="btn btn-small">
                        <a href="{!! URL::to('/admin/slider/create') !!}" class="btn btn-block btn-primary">Nouvelle slider</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        @include('admin.layout.notification')
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Statut</th>
                                <th>Slider</th>
                                <th class="no-sort">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $slider)
                            <tr>
                                <td>{!! $slider->slider_title !!}</td>
                                <td>
                                    @if($slider->is_active=='1')
                                        <span class="badge bg-green">Actif</span>
                                    @else
                                        <span class="badge bg-light-blue">Inactif</span>
                                    @endif
                                </td>
                                <td><img src="{!! url('upload/slider/'.$slider->slider_image) !!}" class="preview-image"></td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ URL::to('admin/slider/' . $slider->slider_id . '/edit') }}"  class="btn btn-default btn-sm" title="Edit"><i class="fa fa-fw fa-edit"></i></a>
                                        {!! Form::open(array('url' => 'admin/slider/' . $slider->slider_id, 'class' => 'pull-right')) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        {!! Form::button('<i class="fa fa-fw fa-trash"></i>', ['type' => 'submit', 'class' => 'btn delete-btn btn-default btn-sm'] ) !!}
                                        {{ Form::close() }}
                                    </div>
                                </td>
                            </tr>
                          @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@stop
@section('additional-scripts')
    {!! Html::script('backend/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('backend/plugins/datatables/dataTables.bootstrap.min.js') !!}
@stop
@section('footer-scripts')
    {!! Html::script('backend/js/banner.js') !!}
@stop
