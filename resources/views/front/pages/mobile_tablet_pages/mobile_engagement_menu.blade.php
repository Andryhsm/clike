
<div class="engagement-menu text-center" id="browseTab"> <!-- hidden -->
    <br><br><br>
        
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="row bg-white">  <!-- panel-heading -->
                <a data-parent="#accordion" class="active  text-center col-xs-10" href = "#discovery" data-tab="uploadTab" onclick = "showEngagement(this)">
                    <div class="pt-10">
                        <span>Découverte</span>
                    </div>
                    <div class="engagement-price mt-25">GRATUIT</div>
                </a>
                <i class="fa fa-angle-down"></i>
            </div>
            <div id="discovery" class="panel-collapse collapse">
                <div class="row panel-body">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-5 point5 left-header  border-green" id="left-header" style="margin-top: 30rem;">
                        <p><b>Compte employés</b></p>
                        <div class="row bg-white p-0"><p><b>Nombre d’articles</b></p></div>
                        <p><b>Base de données clients</b></p>
                        <div class="row bg-white p-0"><p><b>Visibilité des produits</b></p></div>
                        <p><b>Frais de transaction</b></p>
                        <div class="row bg-white p-0"><p><b>Codes promo</b></p></div>
                        <p><b>Encaissement physique</b></p>
                        <div class="row bg-white p-0"><p><b>Rapport d’activité</b></p></div>
                        <p><b>Fiche boutique</b></p>
                        <div class="row bg-white p-0"><p><b>Newsletters</b></p></div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-7 point5 border-green">
                        <div class="row bg-white header-engagement-height">
                            <div class="title pb-20 pt-10">
                                <img class="engagement-logo" src="{!! URL::to('/') !!}/images/icon/logo_dans_page.svg" alt="logo"/>
                                <span>Découverte</span>
                            </div>
                            <div class="engagement-price mt-25 text-uppercase">{!! showPackByValue($packs,'Découverte','Engagement annuel','price') !!}</div>
                            <a href="#" class="btn btn-clickee-info-plein mtb-10">CHOISIR</a>

                            <span>
                                    Souscrivez au Pack Découverte pour découvrir toutes les fonctionnalités de Clickee sans dépenser un euro.
                            </span>
                        </div>
                        <p>illimité</p>
                        <div class="row bg-white p-0"><p>illimité</p></div>
                        <p>illimité</p>
                        <div class="row bg-white p-0">
                            <p><i class="fa fa-times"></i></p>
                        </div>
                        <p><i class="fa fa-times"></i></p>
                        <div class="row bg-white p-0">
                            <p><i class="fa fa-check"></i></p>
                        </div>
                        <p><i class="fa fa-check"></i></p>
                        <div class="row bg-white p-0">
                            <p><i class="fa fa-check"></i></p>
                        </div>
                        <p><i class="fa fa-check"></i></p>
                        <div class="row bg-white p-0">
                            <p><i class="fa fa-times"></i></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="row bg-white shadow-engagement">
                <a class="text-center col-xs-10" href = "#seller" data-tab="uploadTab" onclick = "showEngagement(this)">
                    <div class="pt-10">
                        <span>Vendeur</span>
                    </div>
                    <div class="engagement-price text-center"><span class="price-int">30</span><span class="price-unity">€</span>/mois</div>
                </a>
                <i class="fa fa-angle-down"></i>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-7 point5 border-green shadow-engagement" id="seller" >
                        <div class="row bg-white header-engagement-height">
                            <div class="title pb-20 pt-10">
                                <img class="engagement-logo" src="{!! URL::to('/') !!}/images/icon/logo_dans_page.svg" alt="logo"/>
                                <span>Vendeur</span>
                            </div>
                            <div class="engagement-price mb--10"><span class="price-int">{!! showPackByValue($packs,'Vendeur','Engagement annuel','price') !!}</span><span class="price-unity">€</span>/mois</div>
                            <a href="#" class="btn btn-clickee-info-plein mtb-10">CHOISIR</a>

                            <span>
                                    Souscrivez au Pack Vendeur pour commencer à booster vos ventes en local.
                                </span>
                        </div>
                        <p>illimité</p>
                        <div class="row bg-white p-0"><p>illimité</p></div>
                        <p>illimité</p>
                        <div class="row bg-white p-0">
                            <p><i class="fa fa-check"></i></p>
                        </div>
                        <p>3,5%</p>
                        <div class="row bg-white p-0">
                            <p><i class="fa fa-check"></i></p>
                        </div>
                        <p><i class="fa fa-check"></i></p>
                        <div class="row bg-white p-0">
                            <p><i class="fa fa-check"></i></p>
                        </div>
                        <p><i class="fa fa-check"></i></p>
                        <div class="row bg-white p-0">
                            <p><i class="fa fa-times"></i></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="row bg-white">
                <a class="text-center col-xs-10" href = "#marketing" data-tab="uploadTab" onclick = "showEngagement(this)">
                    <div class="pt-10">
                        <span>Marketing</span>
                    </div>
                    <div class="engagement-price text-center"><span class="price-int">45</span><span class="price-unity">€</span>/mois</div>
                </a>
                <i class="fa fa-angle-down"></i>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-7 point5 border-green" id="marketing">
                        <div class="row bg-white header-engagement-height">
                            <div class="title pb-20 pt-10">
                                <img class="engagement-logo" src="{!! URL::to('/') !!}/images/icon/logo_dans_page.svg" alt="logo"/>
                                <span>Marketing</span>
                            </div>
                            <div class="engagement-price mb--10"><span class="price-int">{!! showPackByValue($packs,'Marketing','Engagement annuel','price') !!}</span><span class="price-unity">€</span>/mois</div>
                            <a href="#" class="btn btn-clickee-info-plein mtb-10">CHOISIR</a>

                            <span>
                                    Souscrivez au Pack Marketing si vous souhaitez fidéliser vos clients en les tenant informés en live.
                                </span>
                        </div>
                        <p>illimité</p>
                        <div class="row bg-white p-0"><p>illimité</p></div>
                        <p>illimité</p>
                        <div class="row bg-white p-0">
                            <p><i class="fa fa-check"></i></p>
                        </div>
                        <p>3,5%</p>
                        <div class="row bg-white p-0">
                            <p><i class="fa fa-check"></i></p>
                        </div>
                        <p><i class="fa fa-check"></i></p>
                        <div class="row bg-white p-0">
                            <p><i class="fa fa-check"></i></p>
                        </div>
                        <p><i class="fa fa-check"></i></p>
                        <div class="row bg-white p-0">
                            <p>de 0 à 500 clients</p>
                        </div>
                    </div>                </div>
            </div>
        </div>   

        <div class="panel panel-default">
            <div class="row bg-white">
                <a class="text-center col-xs-10" href = "#marketingp" data-tab="uploadTab" onclick = "showEngagement(this)">
                    <div class="pt-10">
                        <span>Marketing +</span>
                    </div>
                    <div class="engagement-price text-center"><span class="price-int">65</span><span class="price-unity">€</span>/mois</div>
                </a>
                <i class="fa fa-angle-down"></i>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
                <div class="panel-body">
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-7 point5 border-green"  id="marketingp">
                        <div class="row bg-white header-engagement-height">
                            <div class="title pb-20 pt-10">
                                <img class="engagement-logo" src="{!! URL::to('/') !!}/images/icon/logo_dans_page.svg" alt="logo clickee"/>
                                <span>Marketing +</span>
                            </div>
                            <div class="engagement-price mb--10"><span class="price-int">{!! showPackByValue($packs,'Marketing +','Engagement annuel','price') !!}</span><span class="price-unity">€</span>/mois</div>
                            <a href="#" class="btn btn-clickee-info-plein mtb-10">CHOISIR</a>

                            <span>
                                    Souscrivez au Pack Marketing + quand votre base de données clients grandie.
                                </span>
                        </div>
                        <p>illimité</p>
                        <div class="row bg-white p-0"><p>illimité</p></div>
                        <p>illimité</p>
                        <div class="row bg-white p-0">
                            <p><i class="fa fa-check"></i></p>
                        </div>
                        <p>3,5%</p>
                        <div class="row bg-white p-0">
                            <p><i class="fa fa-check"></i></p>
                        </div>
                        <p><i class="fa fa-check"></i></p>
                        <div class="row bg-white p-0">
                            <p><i class="fa fa-check"></i></p>
                        </div>
                        <p><i class="fa fa-check"></i></p>
                        <div class="row bg-white p-0">
                            <p>de 500 à 2 000 clients</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>