<div class="modal fade" id="search-product-modal" role="dialog" aria-hidden="true">
  <div class="modal-dialog search-product-modal" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="row">
            <form class="col-lg-12 col-md-12 col-sm-12 col-xs-12" method="GET" id="form-search" action="{!! route('search') !!}">   <!-- <div > -->
                  <input class="col-lg-11 col-md-11 col-sm-11 col-xs-11" type="text" id="search-product-input" name="q" placeholder="Chercher ..." name="search-product">
               <!-- </div> -->
               <!-- <div > -->
                 <button type="submit" class="col-lg-1 col-md-1 col-sm-1 col-xs-1 icon btn icon-search search-product btn-search"></button>
               <!-- </div> -->
            </form>
          </div>  
      </div>
    </div>
  </div>
</div>