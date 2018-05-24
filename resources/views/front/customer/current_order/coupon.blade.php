@extends('front.customer.layout.master')

@section('content')
<div class="ajax-content">
    <div class="current-coupon">
        <div class="coupon-item col-lg-12">
            <div class="col-lg-12">
                <span class="title-bold-2">Coupon de réception</span>
            </div>
            <div class="col-lg-12">
                <div class="logo text-center">
                    <img src="{!! URL::to('/') !!}/images/logo.svg" alt="logo Alternateeve"/>
                </div>
            </div>
            <div class="col-lg-12">
                <p>Votre commande vous attend à la boutique {!! $item->product->store->store_name !!}.</p>
            </div>
            <div class="col-lg-12">
                <div class="customer col-lg-7">
                    <span class="mini-height">
                        @foreach ($item->itemRequest as $index=>$request)
                        <p>Réservation acceptée par :<span class="title-bold-2"> {!! $request->merchant->last_name !!} {!! $request->merchant->first_name !!}</span></p>
                        <p>Date d’acceptation :<span class="title-bold-2"> {!! formatDate($request->booked_date, "M dS, Y") !!} </span></p>
                        @endforeach
                        <p>Adresse :<span class="title-bold-2"> {!! $item->product->store->address1 !!}</span></p>
                        <p>N° de téléphone :<span class="title-bold-2"> {!! $item->product->store->phone !!}</span></p>
                    </span>
                    <p class="think-hour"><i>Pensez à vérifier les horaires d’ouverture</i></p>
                </div>
            </div>
            <div class="coupon-product text-center col-lg-12">
                <div class="order-img col-lg-4">
                    <img src="{!! URL::to('/').'/'.$item->product->getDefaultImagePath() !!}"></img>
                </div>
                <div class="order-info ptb-10 col-lg-4">
                    @if(count($item->brand)>0)
                        <p class="title-bold-2 mb-30">{!! ($item->brand->parent_id==null) ? $item->brand->brand_name : $item->brand->parent->brand_name !!}</p>
                    @endif
                    <span class="mini-height mb-20">
                        <p>{!! $item->product_name !!}</p>
                        @foreach($item->attributes as $index=>$attribute)
                            <p>{!! $attribute->attribute_label !!} {!! $attribute->attribute_selected_value !!}</p>
                        @endforeach
                    </span>
                    <p><span>Tarif : </span><span class="title-bold-2">{!! format_price($item->price) !!}</span></p>
                </div>
            </div>
            <div class="coupon-condition col-lg-12">
                <span><b>conditions générales de vente : </b></span>
                <span>
                    dejhgtkh ddijg cpgt coe vo trfjcdhbbv dejhgtkh ddijg cpgt coe vo trfjcdhbbv dejhgtkh ddijg cpgt
                    coe vo trfjcdhbbv dejhgtkh ddijg cpgt coe vo trfjcdhbbv dejhgtkh ddijg cpgt coe vo trfjcdhbbv dejhgtkh ddijg cpgt coe vo
                    trfjcdhbbv dejhgtkh ddijg cpgt coe vo trfjcdhbbv dejhgtkh ddijg cpgt coe vo trfjcdhbbv dejhgtkh ddijg cpgt coe vo trfjcdhbbv
                    dejhgtkh ddijg cpgt coe vo trfjcdhbbv dejhgtkh ddijg cpgt coe vo trfjcdhbbv dejhgtkh ddijg cpgt coe vo trfjcdhbbv dejhgtkh ddijg
                    cpgt coe vo trfjcdhbbv dejhgtkh ddijg cpgt coe vo trfjcdhbbv dejhgtkh ddijg cpgt coe vo trfjcdhbbv dejhgtkh ddijg cpgt coe vo
                    trfjcdhbbv dejhgtkh ddijg cpgt coe vo trfjcdhbbv.
                </span>
            </div>
        </div>
        <div class="coupon-boutton col-lg-12">
            <div class="customer-file-action download col-lg-4">
                <a href="{!! url(LaravelLocalization::getCurrentLocale().'/customer/download-pdf/'.$item->order_item_id) !!}" class="btn btn-customer-filled">
                    <span>Télécharger</span>
                </a>
            </div>
            <div class="customer-file-action print col-lg-4">
                <a href="{!! url(LaravelLocalization::getCurrentLocale().'/customer/print-pdf/'.$item->order_item_id) !!}" class="btn btn-customer-filled" target="_blank">
                    <span>Imprimer</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection