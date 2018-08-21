
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
                    @yield('sans_en gratuit')
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
                    @yield('sans_en vendeur')
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
                    @yield('sans_en marketing')
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
                <i class="fa fa-angle-down onclick = "showEngagement(this)""></i>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
                <div class="panel-body">
                    @yield('sans_en marketing plus')
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
                    @yield('gratuit')
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
                    @yield('vendeur')
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
                    @yield('marketing')
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
                    @yield('marketing plus')
                </div>
            </div>
        </div>
    </div>
</div>