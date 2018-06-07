<div class="nav-menu content">
    <ul class="list-menu nav">
        <li class="nav-item active">
            <a class="nav-link {{ set_active(['*/customer/current-order']) }}" data-url="{!! url(LaravelLocalization::getCurrentLocale().'/customer/current-order') !!}" href="#"><img class="pull-left" src="{!! URL::to('/') !!}/images/icon/mes_commandes_en_cours.svg"/><span>Mes commandes en cours</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ set_active(['*/customer/order-story']) }}" data-url="{!! url(LaravelLocalization::getCurrentLocale().'/customer/order-story') !!}" href="#"><img class="pull-left" src="{!! URL::to('/') !!}/images/icon/historique_de_mes_commandes.svg"/><span>Historique de mes commandes</span></a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link {{ set_active(['*/customer/customer-bills']) }}" data-url="{!! url(LaravelLocalization::getCurrentLocale().'/customer/customer-bills') !!}" href="#"><img class="pull-left" src="{!! URL::to('/') !!}/images/icon/mes_factures.svg"/><span>Mes factures</span></a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link {{ set_active(['*/customer/customer-informations']) }}" data-url="{!! url(LaravelLocalization::getCurrentLocale().'/customer/customer-informations') !!}"  href="#"><img class="pull-left" src="{!! URL::to('/') !!}/images/icon/mes_informations.svg"/><span>Mes informations</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ set_active(['*/customer/newsletters']) }}" data-url="{!! url(LaravelLocalization::getCurrentLocale().'/customer/newsletters') !!}" href="#"><img class="pull-left" src="{!! URL::to('/') !!}/images/icon/gestion_des_infolettres.svg"/><span>Gestion des Newsletters</span></a>
        </li>
        <li class="nav-item"> 
            <a class="nav-link {{ set_active(['*/customer/change-password']) }}" data-url="{!! url(LaravelLocalization::getCurrentLocale().'/customer/change-password') !!}" href="#"><img class="pull-left" src="{!! URL::to('/') !!}/images/icon/changer_le_mot_de_passe.svg"/><span>Changer le mot de passe</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ set_active(['*/customer/help-faq']) }}" data-url="{!! url(LaravelLocalization::getCurrentLocale().'/customer/help-faq') !!}" href="#"><img class="pull-left" src="{!! URL::to('/') !!}/images/icon/aide_et_faq.svg"/><span>Aide & FAQ</span></a>
        </li>
        <li class="nav-item">
            <a class="lougout" href="{!! url(LaravelLocalization::getCurrentLocale().'/logout') !!}" ><img class="pull-left" src="{!! URL::to('/') !!}/images/icon/deconnexion.svg"/><span>Déconnexion</span></a>
        </li>
    </ul>
</div>


