@extends('front.layout.master')

@section('content')
    <div class="">
        <div class="container-fluid page-confirm-cart-content mt-50 mb-50">

            <div class="row">
                <div class="col-lg-12">
                    @include('notification')
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 pt-40">
                    {!! Form::open(['url' => url(LaravelLocalization::getCurrentLocale().'/checkout'),'id' =>'cart_form', 'method' => 'POST']) !!}
                        <div class="row">
                             <div class="cart-order col-lg-7 col-md-7 col-sm-7 col-xs-12 mb-20">
                                <div class="cart-information row">
                                    <div class="cart-title">
                                        <h2>Ma commande</h2>
                                    </div>
                                    <div class="cart-product row">
                                        <div class="content-cart">
                                            <div class="paiement-title">
                                                <h2>CODE PROMOTIONNEL</h2>
                                            </div>
                                            <input type="text" class="form-control" name="code-promo"/>
                                        </div>
                                         <div class="col-lg-1 product-remove pull-right">
                                                 <button type="button" onclick="location.href = '".http://clickee.fr/fr/cart/remove/8fc983a91396319d8c394084e2d749d7."'" class="close">×</button>
                                          </div>
                                    </div>
                                    <div class="col-lg-12 info">
                                        <ul>
                                            
                                            <li class="text-center">    
                                                <button type="submit" class="btn btn-clickee-default mt-40  text-uppercase">Paiement</button>
                                            </li>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="cart-product-list col-lg-5 col-md-5 col-sm-5 col-xs-12 ">
                                <div class="content-cart-product">
                                    <div class="cart-title">
                                        <h2>{!! (count($cart->items()) == 0) ? count($cart->items()).' ARTICLE' : count($cart->items()).' ARTICLES' !!} </h2>
                                    </div>
                                    @if(count($cart->items())>0)
                                    @foreach($cart->items() as $item_id=>$item)
                                 
                                    <div class="cart-product row">
                                        <div class="col-lg-4 mb-20">
                                            <div class="product-image"><a href="{!! url(LaravelLocalization::getCurrentLocale().'/'.$item->getUrl()) !!}"><img src="{!! URL::to('/').'/'.\App\Product::PRODUCT_IMAGE_PATH.$item->getImage() !!}" alt="{!! $item->getImageAlt() !!}"></a>
                                            </div>
                                        </div>
                                        <div class="col-lg-7">
                                            <h4>{!! (isset($item->getProduct()->brand)) ? ($item->getProduct()->brand->parent_id==null) ? $item->getProduct()->brand->brand_name : $item->getProduct()->brand->parent->brand_name : "" !!}</h4>
                                            <span><a href="#">{!! $item->getName() !!}</a></span>
                                            <div class="product-price">
                                                    <?php $product = $item->getProduct();?>
                                                    @if($product->original_price != $product->best_price)
                                                        <span class="old-price" style="color: rgb(67, 223, 230);">({!! getPercentage($product->original_price,$product->best_price) !!})</span>
                                                        <span class="old-price original_price" style="color: rgb(67, 223, 230);" data-price="{!! $product->original_price !!}"><del>{!! format_price($product->original_price) !!}</del></span>
                                                        <span class="new-price real-price" data-price="{!! $product->best_price !!}">{!! format_price($product->best_price) !!}</span>
                                                    @else
                                                        <span class="old-price real-price original_price" data-price="{!! $product->original_price !!}">{!! format_price($product->original_price) !!}</span>
                                                    @endif
                                            </div>
                                            <div class="product-quantity">
                                                   @foreach($item->getAttributes() as $attribute)
                                                        @if($loop->first)
                                                            <span>{!! $attribute->getName() !!}</span>&nbsp;&nbsp;&nbsp;<span> | </span>
                                                        @endif
                                                    @endforeach
                                                <select  class="quantity form-control form-select" name="qty[{!! $item_id !!}]">
                                                    @for($i=1; $i<=10 ; $i++)    
                                                        <option value="{!!$i!!}" {!! (Session::has($item_id) && Session::get($item_id) == $i) ? 'selected' : '' !!}>Qté {!! $i !!}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                           
                                        </div>
                                        
                                        <div class="col-lg-1 product-remove pull-right">
                                                <!--<a href="{!! url(LaravelLocalization::getCurrentLocale()."/cart/remove/$item_id") !!}"><i class="fa fa-times"></i></a>-->
                                                <button type="button" onclick="location.href = '".{!! url(LaravelLocalization::getCurrentLocale()."/cart/remove/$item_id") !!}."'" class="close">×</button>
                    
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="cart-product row">
                                        <div class="col-lg-12 fs-16 total-amount">
                                                <span>TOTAL À RÉGLER</span>
                                                <span class="pull-right total_original_amount">{!! format_price($cart->total()) !!}</span>
                                        </div>
                                    </div>
                                    @else
                                    <tr>
                                        <td colspan="7">
                                               {!! trans('cart.no_item') !!}
                                            </td>
                                        </tr>
                                    @endif
                                </div>
                            </div>
                           
                        </div>
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>
    @include('front.layout.section-avantage')    
@stop
