<!--<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu">
            @if(check_merchant_access(['']))
            <li class="treeview {{ set_active(['fr/merchant/dashboard','fr/merchant/dashboard/*']) }}">
                <a href="{!! URL::to('/fr/merchant/dashboard') !!}">
                    <i class="fa fa-dashboard"></i> <span>Tableau de bord</span>
                </a>
            </li>
            @endif
            @if(check_merchant_access(['']))
            @foreach(Auth::user()->store as $index=>$stor)
            <li class="treeview {{ set_active(['fr/store','fr/store/*']) }}">
                <a href="{!! URL::to('/fr/store/'.$stor->store_id.'/edit') !!}">
                    <i class="fa fa-user"></i> <span>Mon compte</span>
                </a>
            </li>
            @endforeach
            @endif
            @if(check_merchant_access(['']))
            <li class="treeview {{ set_active(['fr/merchant/product', 'fr/merchant/product/*']) }}">
                <a href="{!! route('product_merchant') !!}">
                    <i class="fa fa-files-o"></i> <span>Mes produits</span>
                </a>
            </li>
            @endif
            @if(check_merchant_access(['']))
            <li class="treeview {{ set_active(['fr/merchant/orders', 'fr/merchant/orders/*']) }}">
                <a href="{!! URL::to('/fr/merchant/orders') !!}">
                    <i class="fa fa-files-o"></i> <span>Commandes</span>
                </a>
            </li>
            @endif
            @if(check_merchant_access(['']))
            <li class="treeview {{ set_active(['fr/merchant/code_promo', 'fr/merchant/code_promo/*']) }}">
                <a href="{!! URL::to('/fr/merchant/code_promo') !!}">
                    <i class="fa fa-qrcode"></i> <span>Codes promo</span>
                </a>
            </li>
            @endif
            @if(check_merchant_access(['']))
            <li class="treeview {{ set_active(['fr/merchant/promotion', 'fr/merchant/promotion/*']) }}">
                <a href="{!! URL::to('/fr/merchant/promotion') !!}">
                    <i class="fa fa-star-o"></i> <span>Promotion</span>
                </a>
            </li>
            @endif
            @if(check_merchant_access(['']))
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-bar-chart"></i> <span>Statistiques</span>
                </a>
            </li>
            @endif
            @if(check_merchant_access(['']))
            <li class="treeview {{ set_active(['fr/merchant/encasement', 'fr/merchant/customer/*', 'fr/merchant/customer']) }}">
                <a href="{!! route('encasement') !!}">
                    <i class="fa fa-money"></i> <span>Encaissement</span>
                </a>
            </li>
            @endif
            @if(check_merchant_access(['']))
            <li class="treeview">
                <a href="{!! url(LaravelLocalization::getCurrentLocale().'/logout') !!}">
                    <i class="fa fa-power-off"></i> <span>Déconnexion</span>
                </a>
            </li>
            @endif
        </ul>
    </section>
</aside>
-->
<div class="nav-menu content">
    <ul class="list-menu nav">
        <li class="nav-item active">
            <a class="nav-link {{ set_active(['fr/merchant/dashboard','fr/merchant/dashboard/*']) }}" href="{!! URL::to('/fr/merchant/dashboard') !!}">
                <img class="pull-left" src="{!! URL::to('/') !!}/images/icon/dashboard.svg"/><span>Tableau de bord</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ set_active(['fr/store','fr/store/*']) }}" href="{!! URL::to('/fr/store/'.$stor->store_id.'/edit') !!}">
                <img class="pull-left" src="{!! URL::to('/') !!}/images/icon/my_account.svg"/><span>Mon compte</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ set_active(['fr/merchant/product', 'fr/merchant/product/*']) }}" href="{!! route('product_merchant') !!}">
                <img class="pull-left" src="{!! URL::to('/') !!}/images/icon/my_product.svg"/><span>Mes produits</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ set_active(['fr/merchant/orders', 'fr/merchant/orders/*']) }}" href="{!! URL::to('/fr/merchant/orders') !!}">
                <img class="pull-left" src="{!! URL::to('/') !!}/images/icon/historique_de_mes_commandes.svg"/><span>Commandes</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ set_active(['fr/merchant/code_promo', 'fr/merchant/code_promo/*']) }}" href="{!! URL::to('/fr/merchant/code_promo') !!}">
                <img class="pull-left" src="{!! URL::to('/') !!}/images/icon/code_promo.svg"/><span>Codes promo</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ set_active(['fr/merchant/promotion', 'fr/merchant/promotion/*']) }}" href="{!! URL::to('/fr/merchant/promotion') !!}">
                <img class="pull-left" src="{!! URL::to('/') !!}/images/icon/communication.svg"/><span>Communication</span>
            </a>
        </li>
        <li class="nav-item"> 
            <a class="nav-link {{ set_active(['fr/merchant/encasement', 'fr/merchant/customer/*', 'fr/merchant/customer']) }}" href="{!! route('encasement') !!}">
                <img class="pull-left" src="{!! URL::to('/') !!}/images/icon/encasement.svg"/><span>Encaissement</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="#">
                <img class="pull-left" src="{!! URL::to('/') !!}/images/icon/conge.svg"/><span>Congés</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="lougout" href="{!! url(LaravelLocalization::getCurrentLocale().'/logout') !!}" >
                <img class="pull-left" src="{!! URL::to('/') !!}/images/icon/deconnexion.svg"/><span>Déconnexion</span>
            </a>
        </li>
    </ul>
</div>


