@extends('front.layout.master')
@section('content')
    <section class="ptb-30">
        <div class="container">
            @include('notification')

            <table id="cart" class="table table-hover table-condensed">
                <thead>
                <tr class="fs-20">
                    <th style="width:30%">{!! trans('product.product') !!}</th>
                    <th style="width:15%">{!! trans('product.original_price') !!}</th>
                    <th style="width:15%">Tarif promotionel</th>
                    <th style="width:20%"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    @if($product->product != null)
                    <?php     
                        $product_translation = $product->product->getByLanguageId(app('language')->language_id);
                            ?>
                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-2 hidden-xs"><img src="{!! url(\App\Product::THUMB_IMAGE_PATH.$product->product->images->first()->image_name) !!}" alt="{!! $product_translation->product_name !!}" class="img-responsive"/></div>
                                    <div class="col-sm-10">
                                        <h4 class="nomargin pt-25">{!! $product_translation->product_name !!}</h4>
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price"><p class="pt-35">{!! format_price($product->product->original_price) !!}</p></td>
                            <td data-th="Subtotal"><p class="pt-35">{!! ($product->product->promotional_price != null) ? format_price($product->product->promotional_price) : '' !!}</p></td>
                            <td class="actions" data-th="">
                                <p class="pt-25">
                                    <a class="btn btn-clickee-info" href="{!! (auth()->check()) ? route('wishlist-remove-in-list', ['id' => $product->wishlist_id]) : route('wishlist-remove-in-list', ['id' => $product->product_id]) !!}"><i class="fa fa-trash-o"></i></a>
                                    <a class="btn btn-clickee-info" href="{!! url($product->product->url->target_url) !!}">{!! trans('product.buy') !!}</a>
                                </p>    
                            </td>
                        </tr>
                     @endif
                 @endforeach

                 </tbody>
                 
                <tfoot>
                </tfoot>
            </table>

            @if(count($products) == 0)
               <div>
                <h3 class="text-center" style="margin: 50px 0">Votre liste de souhait est vide</h3>
               </div>
            @endif
        </div>
    </section>
@stop
@section('footer-script')
    <script>
    </script>
@stop