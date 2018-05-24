<div class="btn-group">
	<a href="{!! Url("fr/merchant/product/edit/$product->product_id") !!}"  class="btn btn-default btn-sm" title="Edit"><i class="fa fa-fw fa-edit"></i></a>
	{!! Form::open(array('url' => 'admin/product/' . $product->product_id, 'class' => 'pull-right')) !!}
	{!! Form::hidden('_method', 'DELETE') !!}
	{!! Form::button('<i class="fa fa-fw fa-trash"></i>', ['type' => 'submit', 'class' => 'btn delete-btn btn-default btn-sm','title'=>'Delete'] ) !!}
	{{ Form::close() }}
</div>
