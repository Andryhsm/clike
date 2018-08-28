@extends('front.layout.master')

@section('content')
    <div class="container-fluid content-page" style="padding:0px !important;">
        <div style="padding: 4.75% 10% 0 10%;">
            <div class="title pb-30">
                <h2>POURQUOI VENDRE SUR CLICKEE</h2>
            </div>
            
            <h4 class="text-title mb--0">1. Mise en vente de vos produits en illimité</h4>
            <p>Vous pouvez mettre autant de produits que vous le souhaitez, au même titre que s’il s’agissait de
            votre site Internet, le tout avec une visibilité optimale (référencement et visibilité de part la
            communication faite de la plateforme).</p>
            
            <h4 class="text-title mb--0">2. Gestion des stocks en temps réel</h4>
            <p>Grâce à notre fonctionnalité « Encaissement », vous pouvez gérer vos stocks en live et éviter les
            doublons.</p>
            
            <h4 class="text-title mb--0">3. Attirer de nouveaux clients</h4>
            <p>Clickee fonctionne sur le principe du Click and Collect, une fois les produits achetés, les clients
            viendront chez vous les récupèrer. A vous de jouer pour les fidéliser.</p>
            
            <h4 class="text-title mb--0">4. Visibilité sur vos statistiques</h4>
            <p>Vous avez accès aux statistiques de vos performances en continue.</p>
            
            <h4 class="text-title mb--0">5. Boutique ouverte 24h/24</h4>
            <p>Les clients peuvent acheter vos produits 24h/24 et 7j/7.</p>
            
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center pt-20">
                    @if($is_user_login && Auth::user()->role_id==2)   
                        <a href="{!! route('merchant-dashboard') !!}" class="btn btn-clickee-info">COMMENCER À VENDRE</a>
                    @elseif($is_user_login && Auth::user()->role_id==1)
                        <a class="btn btn-clickee-info link-to-merchant"> COMMENCER À VENDRE </a>    
                    @else
                        <a href="{!! route('merchant-login') !!}" class="btn btn-clickee-info">COMMENCER À VENDRE</a>
                    @endif
                    <div class="line-separator"></div>
                    <div class="title ptb-40">
                        <H2 class="p-0">LES CHIFFRES DE CLICKEE</H2>
                    </div> 
                    
                    <div class="row mt--10">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="border-green-dark text-center">
                                <p class="figure">
                                    {!! $store_count !!}
                                </p>
                                <p class="figure-name">
                                    Boutiques
                                </p> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="border-green-dark text-center">
                                <p class="figure">
                                    {!! $product_count !!}
                                </p>
                                <p class="figure-name">
                                    Produits
                                </p> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="border-green-dark text-center">
                                <p class="figure">
                                    1
                                </p>
                                <p class="figure-name">
                                    Villes
                                </p> 
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                            <div class="border-green-dark text-center">
                                <p class="figure">
                                    {!! $user_count !!}
                                </p>
                                <p class="figure-name">
                                    Utilisateurs
                                </p> 
                            </div>
                        </div>
                    </div>
                    
                    <div class="line-separator"></div>
                    <div class="title pt-40 pb-10">
                        <H2>COMMENT VENDRE SUR CLICKEE</H2>
                    </div> 
                </div>
            </div>
            
            <h4 class="text-title mb--0">1. Créez votre compte professionnel</h4>
            <p>En moins de 5 minutes vous choisissez le pack le plus adapté à vos besoins et vous rentrez vos
            coordonnées professionnelles.</p>
            
            <h4 class="text-title mb--0">2. Prenez vos produits en photo</h4>
            <p>A l’aide de votre téléphone et nos conseils, prenez vos produits en photo pour les mettre sur le site.</p>
            
            <h4 class="text-title mb--0">3. Décrivez vos produits</h4>
            <p>Rentrez les informations qui concernent vos produits.</p>
            
            <h4 class="text-title mb--0">4. Générez du flux dans votre boutique</h4>
            <p>Une fois vos produits vendus, les clients viennent vous voir pour les récupérer, à vous de jouer!</p>
            
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center pt-20">
                    @if($is_user_login && Auth::user()->role_id==2)    
                        <a href="{!! route('merchant-dashboard') !!}" class="btn btn-clickee-info">CRÉEZ VOTRE COMPTE</a>
                    @elseif($is_user_login &&  Auth::user()->role_id==1)
                        <a class="btn btn-clickee-info link-to-merchant"> CRÉEZ VOTRE COMPTE </a>
                    @else
                        <a href="{!! route('merchant-login') !!}" class="btn btn-clickee-info">CRÉEZ VOTRE COMPTE</a>
                    @endif
                    <div class="line-separator"></div>
                    <div class="title pt-40 pb-10">
                        <H2>NOS PACKS</H2>
                    </div> 
                </div>
            </div>
        </div>
        <div role="tabpanel" id="tab-sale" class="tab-panel tab-panel-customer col-lg-12 col-xs-12 col-md-12 col-sm-12">
        	<div class="section-title">
        	</div>
            <ul class="nav nav-tabs" style="font-size: 17px !important;border-bottom: 1px solid #efefed !important;margin-top: 15px !important;width: 50% !important;" role="tablist">
                <li role="presentation" class="active"><a href="#uploadTab" class="notflip" aria-controls="uploadTab" role="tab" data-toggle="tab" id="head-tab-signing">ENGAGEMENT ANNUEL</a>
                </li>
                <li role="presentation"><a class="flip" href="#browseTab" aria-controls="browseTab" role="tab" data-toggle="tab" id="head-tab-register">SANS ENGAGEMENT</a>

                </li>
                <button type="button" class="close" href="javascript:history.back()" aria-label="Close"/>
            </ul>

        </div>

            <div class="tab-content tab-login" id="tab-engagement">                

                <div role="tabpanel" class="tab-pane active hidden-xs" id="uploadTab">
                	
                	<div class="row" style="width: 105%;margin-bottom: -1.4rem;">
                	    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 point5"></div>
                	    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 point5"></div>
                	    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 point5 bg-green">LE PLUS POPULAIRE</div>
                	    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 point5"></div>
                	    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 point5"></div>
                	</div>    
                	
                	<div class="row" style="width: 105%;">
                        @include('front.pages.mobile_tablet_pages.bloc_sans_engagement.bloc_critere')
                        @include('front.pages.mobile_tablet_pages.bloc_sans_engagement.gratuit')
                        @include('front.pages.mobile_tablet_pages.bloc_sans_engagement.vendre')
                        @include('front.pages.mobile_tablet_pages.bloc_sans_engagement.marketing')
                        @include('front.pages.mobile_tablet_pages.bloc_sans_engagement.marketing_plus')
                    </div>

                </div>

                <div role="tabpanel" class="tab-pane hidden-xs" id="browseTab">

                	<div class="row" style="width: 105%;margin-bottom: -1.4rem;">
                	    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 point5"></div>
                	    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 point5"></div>
                	    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 point5 bg-green">LE PLUS POPULAIRE</div>
                	    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 point5"></div>
                	    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-3 point5"></div>
                	</div>

                	<div class="row" style="width: 105%;">
                        @include('front.pages.mobile_tablet_pages.bloc_engagement_annuel.bloc_critere')
                        @include('front.pages.mobile_tablet_pages.bloc_engagement_annuel.gratuit')
                        @include('front.pages.mobile_tablet_pages.bloc_engagement_annuel.vendre')
                        @include('front.pages.mobile_tablet_pages.bloc_engagement_annuel.marketing')
                        @include('front.pages.mobile_tablet_pages.bloc_engagement_annuel.marketing_plus')
                    </div>
                	
                </div>
            </div>

            <div class="engagement_for_tablet_screen hidden">
                @include('front.pages.mobile_tablet_pages.tablet_engagement_menu')
            </div>
            <div class="engagement_for_mobile_screen hidden">
                @include('front.pages.mobile_tablet_pages.mobile_engagement_menu')
            </div>

    </div>

   
    @include('front.layout.section-avantage')
@endsection