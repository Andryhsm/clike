@extends('front.layout.master')

@section('additional-css')

@stop

@section('content')

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item active">
    <a class="nav-link" id="1-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="home" aria-selected="true">Info perso</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="2-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="profile" aria-selected="false">Choix pack</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="3-tab" data-toggle="tab" href="#tab3" role="tab" aria-controls="contact" aria-selected="false">Payement</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="4-tab" data-toggle="tab" href="#tab4" role="tab" aria-controls="contact" aria-selected="false">Boutique</a>
  </li>
</ul>

<!-- Form en dessus de tout -->
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active in" id="tab1" role="tabpanel" aria-labelledby="1-tab">
        test 
  </div>
  <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="2-tab">
      
  </div>
  <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="3-tab">
      
  </div>
  <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="4-tab">
      @include('merchant.register')
  </div>
</div>

@endsection
