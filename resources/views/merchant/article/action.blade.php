<div class="btn-group">
	<a href="{!! route('article.edit',['article'=>$product->product_id]) !!}" class="show_article_eye"></a>
    
    {!! Form::open(array('url' => route('article.destroy',['article'=>$product->product_id]), 'class' => 'pull-right')) !!}
    {!! Form::hidden('_method', 'DELETE') !!}
	
	<a class="delete_article_garbage">
    {!! Form::button('', ['type' => 'submit', 'class' => ''.$product->product_id.' hidden'] ) !!}
    </a>
    {{ Form::close() }}
</div>