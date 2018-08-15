<div class="btn-group">
	<a href="{!! route('article.edit',['article'=>$product->product_id]) !!}" class="btn btn-default btn-sm"><i class="fa fa-eye"></i></a>
    
    {!! Form::open(array('url' => route('article.destroy',['article'=>$product->product_id]), 'class' => 'pull-right')) !!}
    {!! Form::hidden('_method', 'DELETE') !!}
    {!! Form::button('<i class="fa fa-fw fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-default btn-sm delete-btn delete-btn'.$product->product_id.' btn-default btn-sm'] ) !!}
    {{ Form::close() }}
</div>