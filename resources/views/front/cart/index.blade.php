@extends('front.layout.master')

@section('content')
    <div class="">
        <div class="container-fluid page-cart-content mt-50 mb-50">

            <div class="row">
                <div class="col-lg-12">
                    @include('notification')
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 pt-40">
                    {!! Form::open(['url' => route('checkout-confirm-cart'),'id' =>'cart_form', 'method' => 'GET']) !!}
                        <div class="row">
                            <div class="cart-product-list col-lg-7 col-md-7 col-sm-7 col-xs-12 mb-20">
                                <div class="content-cart-product">
                                    <div class="cart-title">
                                        <h2>Mon panier</h2>
                                    </div>
                                    @if(count($cart->items())>0)
                                    @foreach($cart->items() as $item_id=>$item)
                                 
                                    <div class="cart-product row">
                                        <div class="col-lg-4 mb-20">
                                            <div class="product-image"><a href="{!! url($item->getUrl()) !!}"><img src="{!! URL::to('/').'/'.\App\Product::PRODUCT_IMAGE_PATH.$item->getImage() !!}" alt="{!! $item->getImageAlt() !!}"></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <h4>{!! (isset($item->getProduct()->brand)) ? ($item->getProduct()->brand->parent_id==null) ? $item->getProduct()->brand->brand_name : $item->getProduct()->brand->parent->brand_name : "" !!}</h4>
                                            <span><a href="#">{!! $item->getName() !!}</a></span>
                                            <div class="product-price">
                                                    <?php $product = $item->getProduct();?>
                                                    @if($product->promotional_price != null)
                                                        <span class="old-price discount" style="color: rgb(67, 223, 230);">(-{!! $product->discount !!}%)</span>
                                                        <span class="old-price original_price" style="color: rgb(67, 223, 230);" data-price="{!! $product->original_price !!}"><del>{!! format_price($product->original_price) !!}</del></span>
                                                        <span class="new-price real-price" data-price="{!! $product->promotional_price !!}">{!! format_price($product->promotional_price) !!}</span>
                                                        <input type="text" class="hidden promotional_price" value="{!! $product->promotional_price !!}" >
                                                    @else
                                                        <span class="old-price real-price original_price" data-price="{!! $product->original_price !!}">{!! format_price($product->original_price) !!}</span>
                                                        <input type="text" class="hidden original_price" value="{!! $product->original_price !!}" >
                                                    @endif
                                                    <!-- <span class="old-price real-price original_price" data-price="{!! $product->original_price !!}">{!! format_price($product->original_price) !!}</span> -->
                                                    
                                            </div>
                                            <div class="row reviews-total">
                                                <div class="stars_review col-lg-12" style="overflow: show !important;">
                                                    @for($i=1;$i <= average_rating($product->product_id);$i++)
                                                            <a title="1" class="star fullStar"></a>
                                                    @endfor
                                                    @for($i=5 ;$i > average_rating($product->product_id);$i--)
                                                            <a title="1" class="star"></a>
                                                    @endfor
                                                </div>
                                            </div>
                                            <div class="product-quantity">
                                                <?php $count_item = count($item->getAttributes()); ?>
                                                   <!-- @foreach($item->getAttributes() as $attribute)
                                                        @if($loop->first)
                                                            <span>{!! $attribute->getName() !!}</span>&nbsp;&nbsp;&nbsp;<span> | </span>
                                                        @endif
                                                    @endforeach -->
                                                    @foreach($item->getAttributes() as $attribute)
                                                        <span>{!! $attribute->getName() !!}</span>&nbsp;&nbsp;&nbsp;<span> | </span>&nbsp;&nbsp;&nbsp;
                                                    @endforeach
                                                <select data-url="{!! route('checkout_store_quantity_session') !!}"  class="quantity form-control form-select {!! ($count_item == 0) ? 'mlp--2v5' : '' !!}" name="qty[{!! $item_id !!}]">
                                                    @for($i=1; $i<=10 ; $i++)    
                                                        <option value="{!!$i!!}" {!! (Session::has($item_id) && Session::get($item_id) == $i) ? 'selected' : '' !!}>Qté {!! $i !!}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                           
                                        </div>
                                        <div class="col-lg-1 product-remove pull-right">
                                                <!--<a href="{!! url(LaravelLocalization::getCurrentLocale()."/cart/remove/$item_id") !!}"><i class="fa fa-times"></i></a>-->
                                                <button data-url="{!! route('cart-remove', ['item_id' => $item_id]) !!}" type="button" class="close cart-remove">×</button>
                    
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7">
                                               {!! trans('cart.no_item') !!}
                                            </td>
                                        </tr>
                                    @endif
                                </div>
                            </div>
                            <div class="cart-order col-lg-5 col-md-5 col-sm-5 col-xs-12">
                                <div class="cart-information row">
                                    <div class="cart-title">
                                        <h2>Ma commande</h2>
                                    </div>
                                    <div class="col-lg-12 info">
                                        <ul>
                                            <li>
                                                <span>TOTAL</span>
                                                <span class="pull-right total_original_amount">{!! format_price($total_commande) !!}</span>
                                             </li>
                                            <li class="text-center">    
                                                <button type="submit" class="btn btn-clickee-default mt-40  text-uppercase">Paiement</button>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-md-8 col-sm-7 col-xs-12">
                                <div class="buttons-cart">
                                    <input type="submit" value="{!! trans('cart.update_cart') !!}" name="update_cart">
                                    <a href="{!! url(LaravelLocalization::getCurrentLocale().'/') !!}">{!! trans('cart.continue_shopping') !!}</a>
                                </div>

                            </div>
                            <div class="col-md-4 col-sm-5 col-xs-12 mb-30">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="payment_type" value="1"> {!! trans('cart.payment_label') !!}
                                    </label>
                                </div>                                <div class="cart_totals">
                                    <div class="wc-proceed-to-checkout">
                                        <a href="javascript://" class="checkout-btn">{!! trans('cart.proceed_to_checkout') !!}</a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
    @include('front.layout.section-avantage')    
@stop
@section('footer-script')
    <!-- Les script sont dans order.js -->
@endsection