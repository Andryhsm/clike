@extends('front.customer.layout.master')

@section('content')

<div class="ajax-content">
    @if(count($items) > 0) 
        @foreach($items as $item)
        <div class="order col-lg-12 ">
            <div class="order-containt">
                <div class="row">
                    <div class="order-img1 col-lg-3">
                        <img src="{!! URL::to('/').'/'.$item->product->getDefaultImagePath() !!}"></img>
                    </div>
                    <div class="col-lg-9">
                        <div class="text-center col-lg-12 pt-20">
                            <?php 
                                switch ($item->order_status_id) {
                                    case 3:
                                        $status = "PRODUIT NON DISPONIBLE";
                                        break;
                                    case 5:
                                        $status = "TERMINER";
                                        break;
                                    case 6:
                                        $status = "ANNULER";
                                        break;
                                    default:
                                        $status = "";
                                }
                            ?>
                            <p ><span class="title-bold-2">STATUS : </span> {!! $status !!} </p>
                        </div>
                        
                        <div class="order-info1 ptb-10 col-lg-5">
                            @if(count($item->brand)>0)
                                <div><strong class="text-uppercase">{!! ($item->brand->parent_id==null) ? $item->brand->brand_name : $item->brand->parent->brand_name !!}</strong></div>
                            @endif
                            <div class="">
                                <p>{!! $item->product_name !!}</p>
                                @foreach($item->attributes as $index=>$attribute)
                                    <p>{!! $attribute->attribute_label !!} {!! $attribute->attribute_selected_value !!}</p>
                                @endforeach
                            </div>
                            <div>
                                <div class="title-bold-2">{!! format_price($item->price) !!}</div>
                            </div>
                            
                        </div>
                        <div class="order-info2 ptb-10 col-lg-7">
                            <p ><span class="title-bold-2">N° DE COMMANDE : </span>{!! $item->order->order_id !!}</p>
                            <p ><span class="title-bold-2">DATE DE COMMANDE : </span>{!! formatDate($item->order->order_date, "M dS, Y") !!}</p>
                            <p ><span class="title-bold-2">BOUTIQUE : </span>{!! $item->product->store->store_name !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <div class="order">
            <p class="title-bold-2 text-uppercase text-center">Aucun commande trouvé</p>&nbsp;
        </div>
    @endif
</div>
@endsection