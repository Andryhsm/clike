
<div class="engagement-menu text-center hidden" id="browseTab"> <!-- hidden -->
    <br><br><br>
        
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="row bg-white">  <!-- panel-heading -->
                <a data-parent="#accordion" class="active  text-center col-xs-10" href = "#discovery" data-tab="uploadTab">
                    <div class="pt-10">
                        <span>Découverte</span>
                    </div>
                    <div class="engagement-price mt-25">GRATUIT</div>
                </a>
                <i class="fa fa-angle-down" onclick = "showEngagement(this)"></i>
            </div>
            <div id="discovery" class="panel-collapse collapse">
                <div class="row panel-body">
                    @include('front.pages.mobile_tablet_pages.bloc_engagement_annuel.bloc_critere')
                    @include('front.pages.mobile_tablet_pages.bloc_sans_engagement.gratuit')
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="row bg-white">
                <a class="text-center col-xs-10" href = "#seller" data-tab="uploadTab">
                    <div class="pt-10">
                        <span>Vendeur</span>
                    </div>
                    <div class="engagement-price text-center"><span class="price-int">39</span><span class="price-unity">€</span>/mois</div>
                </a>
                <i class="fa fa-angle-down" onclick = "showEngagement(this)"></i>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse">
                <div class="panel-body">
                    @include('front.pages.mobile_tablet_pages.bloc_engagement_annuel.bloc_critere')
                    @include('front.pages.mobile_tablet_pages.bloc_sans_engagement.vendre')
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="row bg-white">
                <a class="text-center col-xs-10" href = "#marketing" data-tab="uploadTab">
                    <div class="pt-10">
                        <span>Marketing</span>
                    </div>
                    <div class="engagement-price text-center"><span class="price-int">59</span><span class="price-unity">€</span>/mois</div>
                </a>
                <i class="fa fa-angle-down" onclick = "showEngagement(this)"></i>
            </div>
            <div id="collapseThree" class="panel-collapse collapse">
                <div class="panel-body">
                    @include('front.pages.mobile_tablet_pages.bloc_engagement_annuel.bloc_critere')
                    @include('front.pages.mobile_tablet_pages.bloc_sans_engagement.marketing')
                </div>
            </div>
        </div>   

        <div class="panel panel-default">
            <div class="row bg-white">
                <a class="text-center col-xs-10" href = "#marketingp" data-tab="uploadTab">
                    <div class="pt-10">
                        <span>Marketing +</span>
                    </div>
                    <div class="engagement-price text-center"><span class="price-int">79</span><span class="price-unity">€</span>/mois</div>
                </a>
                <i class="fa fa-angle-down" onclick = "showEngagement(this)"></i>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
                <div class="panel-body">
                   @include('front.pages.mobile_tablet_pages.bloc_engagement_annuel.bloc_critere')
                     @include('front.pages.mobile_tablet_pages.bloc_sans_engagement.marketing_plus')
                </div>
            </div>
        </div>
    </div>
</div>


                                            {{-- ENGAGEMENT ANNUEL--}}



<div class="engagement-menu text-center" id="uploadTab"> <!-- hidden -->
    <br><br><br>

    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="row bg-white">  <!-- panel-heading -->
                <a class="active  text-center col-xs-10" href = "#discovery" data-tab="uploadTab">
                    <div class="pt-10">
                        <span>Découverte</span>
                    </div>
                    <div class="engagement-price mt-25">GRATUIT</div>
                </a>
                <i class="fa fa-angle-down" onclick = "showEngagement(this)"></i>
            </div>
            <div id="collapseFive" class="panel-collapse collapse">
                <div class="row panel-body">
                    @include('front.pages.mobile_tablet_pages.bloc_engagement_annuel.bloc_critere')
                    @include('front.pages.mobile_tablet_pages.bloc_engagement_annuel.gratuit')
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="row bg-white">
                <a class="text-center col-xs-10" href = "#seller" data-tab="uploadTab">
                    <div class="pt-10">
                        <span>Vendeur</span>
                    </div>
                    <div class="engagement-price text-center"><span class="price-int">30</span><span class="price-unity">€</span>/mois</div>
                </a>
                <i class="fa fa-angle-down" onclick = "showEngagement(this)"></i>
            </div>
            <div id="collapseSix" class="panel-collapse collapse">
                <div class="row panel-body">
                    @include('front.pages.mobile_tablet_pages.bloc_engagement_annuel.bloc_critere')
                    @include('front.pages.mobile_tablet_pages.bloc_engagement_annuel.vendre')
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="row bg-white">
                <a class="text-center col-xs-10" href = "#marketing" data-tab="uploadTab">
                    <div class="pt-10">
                        <span>Marketing</span>
                    </div>
                    <div class="engagement-price text-center"><span class="price-int">45</span><span class="price-unity">€</span>/mois</div>
                </a>
                <i class="fa fa-angle-down" onclick = "showEngagement(this)"></i>
            </div>
            <div id="collapseSeven" class="panel-collapse collapse">
                <div class="row panel-body">
                    @include('front.pages.mobile_tablet_pages.bloc_engagement_annuel.bloc_critere')
                    @include('front.pages.mobile_tablet_pages.bloc_engagement_annuel.marketing')
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="row bg-white">
                <a class="text-center col-xs-10" href = "#marketingp" data-tab="uploadTab">
                    <div class="pt-10">
                        <span>Marketing +</span>
                    </div>
                    <div class="engagement-price text-center"><span class="price-int">65</span><span class="price-unity">€</span>/mois</div>
                </a>
                <i class="fa fa-angle-down" onclick = "showEngagement(this)"></i>
            </div>
            <div id="collapseEight" class="panel-collapse collapse">
                <div class="row panel-body">
                    @include('front.pages.mobile_tablet_pages.bloc_engagement_annuel.bloc_critere')
                    @include('front.pages.mobile_tablet_pages.bloc_engagement_annuel.marketing_plus')
                </div>
            </div>
        </div>
    </div>
</div>