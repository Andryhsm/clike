<div class="btn-group">
	<a href="{!! route('article.edit',['article'=>$product->product_id]) !!}" class="btn show_article_eye"></a>
    
    {!! Form::open(array('url' => route('article.destroy',['article'=>$product->product_id]), 'class' => 'pull-right')) !!}
    {!! Form::hidden('_method', 'DELETE') !!}
	
	<a class="btn delete_article_garbage">
    </a>
    {!! Form::button('', ['type' => 'submit', 'class' => 'delete-btn delete-btn'.$product->product_id.' hidden'] ) !!}
    {{ Form::close() }}
</div>
