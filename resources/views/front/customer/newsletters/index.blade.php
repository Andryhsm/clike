@extends('front.customer.layout.master')

@section('content')
<?php //dd($newsletter_option['news']->value); ?>
<div class="ajax-content">
    <a class="hidden newsletter_action" href="{!! route('update-newsletters') !!}"></a>
    <div class="newsletter col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="newsletter-containt row">
            <div class="newsletter-item-img col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <p><img class="newsletter-img news-img" src="{!! URL::to('/') !!}/images/icon/newsletter_cloche.svg"></img></p>
            </div>
            <div class="newsletter-item col-lg-6 col-md-6 col-sm-6 col-xs-9">
                <p class="title-bold-2">NOUVEAUTÉS</p>
                <p class="newsletter-height">
                    Dernières tendances, nouveautés et conseils : vous avez vu les produits en premier, vous serez les premiers à les avoir
                </p>
            </div>
            @if($newsletter_option)
                <div class="newsletter-item checkbox col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <p>
                        <a onclick="updateNewsletter(this, 'news', 'e-mail');" id="new-received-email" class="received-email"><i class="fa {!! ($newsletter_option['news']->value == 'e-mail') ? 'fa-dot-circle-o' : 'fa-circle-o' !!}"></i>&nbsp;&nbsp;E-mail</a>
                    </p>
                    <p>
                        <a onclick="updateNewsletter(this, 'news', 'sms');" id="new-received-notification" class="received-notification"><i class="fa {!! ($newsletter_option['news']->value == 'sms') ? 'fa-dot-circle-o' : 'fa-circle-o' !!}"></i>&nbsp;&nbsp;SMS</a>
                    </p>
                    <p>
                        <a onclick="updateNewsletter(this, 'news', 'desactivate');"  id="new-desactivate" class="desactivate"><i class="fa {!! ($newsletter_option['news']->value == 'desactivate') ? 'fa-dot-circle-o' : 'fa-circle-o' !!}"></i>&nbsp;&nbsp;Désactiver</a>
                    </p>               
                </div>
            @else
                <div class="newsletter-item checkbox col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <p>
                        <a onclick="updateNewsletter(this, 'news', 'e-mail');" id="new-received-email" class="received-email"><i class="fa fa-circle-o"></i>&nbsp;&nbsp;E-mail</a>
                    </p>
                    <p>
                        <a onclick="updateNewsletter(this, 'news', 'sms');" id="new-received-notification" class="received-notification"><i class="fa fa-circle-o"></i>&nbsp;&nbsp;SMS</a>
                    </p>
                    <p>
                        <a onclick="updateNewsletter(this, 'news', 'desactivate');"  id="new-desactivate" class="desactivate"><i class="fa fa-circle-o"></i>&nbsp;&nbsp;Désactiver</a>
                    </p>               
                </div>
            @endif
        </div>
    </div>
    <div class="newsletter col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="newsletter-containt row">
            <div class="newsletter-item-img col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <p><img class="newsletter-img promo-img" src="{!! URL::to('/') !!}/images/icon/newsletter_portecle.svg"></img></p> 
            </div>
            <div class="newsletter-item col-lg-6 col-md-6 col-sm-6 col-xs-9">
                <p class="title-bold-2">PROMOS ET SOLDES</p>
                <p class="newsletter-height">
                    Soyez les premiers à réserver vos coups de coeurs pour moins cher.
                </p>
            </div>
            @if($newsletter_option)
                <div class="newsletter-item checkbox col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <p>
                        <a onclick="updateNewsletter(this, 'promo_sold', 'e-mail');" id="special-received-email" class="received-email"><i class="fa {!! ($newsletter_option['promo_sold']->value == 'e-mail') ? 'fa-dot-circle-o' : 'fa-circle-o' !!}"></i>&nbsp;&nbsp;E-mail</a>
                    </p>
                    <p>
                        <a onclick="updateNewsletter(this, 'promo_sold', 'sms');" id="special-received-notification" class="received-notification"><i class="fa {!! ($newsletter_option['promo_sold']->value == 'sms') ? 'fa-dot-circle-o' : 'fa-circle-o' !!}"></i>&nbsp;&nbsp;SMS</a>
                    </p>
                    <p>
                        <a onclick="updateNewsletter(this, 'promo_sold', 'desactivate');"  id="special-desactivate" class="desactivate"><i class="fa {!! ($newsletter_option['promo_sold']->value == 'desactivate') ? 'fa-dot-circle-o' : 'fa-circle-o' !!}"></i>&nbsp;&nbsp;Désactiver</a>
                    </p>
                </div>
            @else
                <div class="newsletter-item checkbox col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <p>
                        <a onclick="updateNewsletter(this, 'promo_sold', 'e-mail');" id="special-received-email" class="received-email"><i class="fa fa-circle-o"></i>&nbsp;&nbsp;E-mail</a>
                    </p>
                    <p>
                        <a onclick="updateNewsletter(this, 'promo_sold', 'sms');" id="special-received-notification" class="received-notification"><i class="fa fa-circle-o"></i>&nbsp;&nbsp;SMS</a>
                    </p>
                    <p>
                        <a onclick="updateNewsletter(this, 'promo_sold', 'desactivate');"  id="special-desactivate" class="desactivate"><i class="fa fa-circle-o"></i>&nbsp;&nbsp;Désactiver</a>
                    </p>
                </div>
            @endif
        </div>
    </div>
    <div class="newsletter col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="newsletter-containt row">
            <div class="newsletter-item-img col-lg-3 col-md-3 col-sm-3 col-xs-3">
                <p><img class="newsletter-img taste-img" src="{!! URL::to('/') !!}/images/icon/newsletter_etoile.svg"></img></p>
            </div>
            <div class="newsletter-item col-lg-6 col-md-6 col-sm-6 col-xs-9">
                <p class="title-bold-2">EXCLUSIVEMENT POUR VOUS</p>
                <p class="newsletter-height">
                    Des exclusivités sur-mesure, qui vous ressemblent, élaborées en fonction de vos précédants achats.
                </p>
            </div>
            @if($newsletter_option)
                <div class="newsletter-item checkbox col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <p>
                        <a onclick="updateNewsletter(this, 'personal', 'e-mail');" id="exclusive-received-email" class="received-email"><i class="fa {!! ($newsletter_option['personal']->value == 'e-mail') ? 'fa-dot-circle-o' : 'fa-circle-o' !!}"></i>&nbsp;&nbsp;E-mail</a>
                    </p>
                    <p>
                        <a onclick="updateNewsletter(this, 'personal', 'sms');" id="exclusive-received-notification" class="received-notification"><i class="fa {!! ($newsletter_option['personal']->value == 'sms') ? 'fa-dot-circle-o' : 'fa-circle-o' !!}"></i>&nbsp;&nbsp;SMS</a>
                    </p>
                    <p>
                        <a onclick="updateNewsletter(this, 'personal', 'desactivate');"  id="exclusive-desactivate" class="desactivate"><i class="fa {!! ($newsletter_option['personal']->value == 'desactivate') ? 'fa-dot-circle-o' : 'fa-circle-o' !!}"></i>&nbsp;&nbsp;Désactiver</a>
                    </p>
                </div>
            @else
                <div class="newsletter-item checkbox col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <p>
                        <a onclick="updateNewsletter(this, 'personal', 'e-mail');" id="exclusive-received-email" class="received-email"><i class="fa fa-circle-o"></i>&nbsp;&nbsp;E-mail</a>
                    </p>
                    <p>
                        <a onclick="updateNewsletter(this, 'personal', 'sms');" id="exclusive-received-notification" class="received-notification"><i class="fa fa-circle-o"></i>&nbsp;&nbsp;SMS</a>
                    </p>
                    <p>
                        <a onclick="updateNewsletter(this, 'personal', 'desactivate');"  id="exclusive-desactivate" class="desactivate"><i class="fa fa-circle-o"></i>&nbsp;&nbsp;Désactiver</a>
                    </p>
                </div>
            @else
            @endif
        </div>
    </div>

</div>    
@endsection
