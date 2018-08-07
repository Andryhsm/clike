@extends('merchant.layout.master')

@section('additional-styles')
    {!! Html::style('backend/plugins/datatables/dataTables.bootstrap.css') !!}
    {!! Html::style('frontend/css/font-awesome.min.css') !!}
    {!! Html::style('backend/bootstrap/css/bootstrap.min.css') !!}
    {!! Html::style('backend/plugins/select2/select2.css') !!}
    {!! Html::style('backend/dist/css/AdminLTE.min.css') !!}
    {!! Html::style('backend/dist/css/skins/skin-black-light.css') !!}
    {!! Html::style('backend/css/style.css') !!}

    {!! Html::style('frontend/css/style-clickee.css') !!}
@stop

@section('page_title')
    <div class="section-title col-mm-8  col-lg-8 col-md-8 col-sm-12 col-xs-12">
        <div class="header-item">  
            <div class="title title-active col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="title-icon">
                    <img class="" src="{!! URL::to('/') !!}/images/icon/my_product.svg"/>
                </div> 
                <div class="title-title">
                    <span class="text-title-active">Mes produits</span>
                </div>
            </div>
        </div>
    </div>
@stop
@section('content')
    <section class="content">
        <div class="bottle">
            <section class="list-article-header">
                <div class="pull-left buttons-selection ptb-20">
                    <a class="delete-selected" href="#"><i class="fa fa-trash deletes hidden"></i></a>
                </div>
                <div class="pull-right ptb-20">
                    <a href="{!! route('article.create') !!}" class="btn btn-block btn-merchant-filled">
                        <i class="fa fa-plus"></i>
                        Nouvel article
                    </a>
                </div>
                <div class="blocs-3 pb-10">
                    <div class="" style="line-height: 5rem; width:160px;">
                        <a href="#" class="check-all"><i class="fa fa-circle-o mr-10"></i> <span>Tout sélectionner</span></a>
                    </div>
                    <div class="bloc">
                        <select id="product_sold" name="">
                            <option value="all_article">Tous les articles</option>
                            <option value="discount_product">Produits soldés</option>
                            <option value="attribut_set">Par gamme</option>
                        </select>
                    </div>
                    <div class="bloc">
                        <select id="stock_manage" name="">
                            <option value="all_stock">Voir tout</option>
                            <option value="exist_stock">En stock</option>
                            <option value="empty_stock">En partie en rupture de stock</option>
                        </select>
                    </div>
                </div>             
            </section>
            @include('admin.layout.notification')
            <div class="notification">
                
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <table id="article_list" class="article">
                        <thead class="text-uppercase">
                            <tr>
                                <th>ARTICLE</th>
                                <th>PRIX</th>
                                <th>INVENTAIRE</th>
                                <th class="no-sort"></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
@stop
@section('additional-script')
    <script>
        var url_deletes_product =   "{!! route('delete_products') !!}";
    </script>
    {!! Html::script('backend/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('backend/plugins/datatables/dataTables.bootstrap.min.js') !!}
    {{ HTML::script('frontend/js/article.js') }}
@stop
@section('footer-scripts')
    <script>
        var $document = $(document);
        var url_get_data_product = "{!! route('merchant-article-data') !!}";
        if (jQuery('#article_list').length > 0) {
            table = jQuery('#article_list').on('preXhr.dt', function ( e, settings, data) {
                    var article_filter = $('#product_sold').val();
                    //console.log(article_filter);
                    //var stock_manage = $('#stock_manage').val();

                    if(article_filter != null)    
                        data.article_filter = article_filter;
                    /*if(stock_manage != null)    
                        data.stock_manage = stock_manage;*/
                })
                .DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {   
                    "url": url_get_data_product,
                    "type": "POST"
                },
                "responsive": true,
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": false,
                "bInfo": true,
                "bAutoWidth": false,
                "order": [[2, "desc"]],
                "lengthMenu": [20, 40, 60, 80, 100],
                "pageLength": 20,
                language: {
                        paginate: {
                            first:    'Premier',
                            previous: 'Précédent',
                            next:      'Suivant',
                            last:     'Dernier'
                        },
                        "lengthMenu": "Afficher _MENU_ entrées",
                        "search": "Chercher:",
                        "processing": "En traitement ...",
                        "infoEmpty": "Aucune entrée à afficher",
                        "info": "Afficher la page _PAGE_ de _PAGES_"
                },
                columns: [
                    {data: 'check', name:'check',searchable: false, sortable: false},
                    {data: 'product_image', name:'product_image',searchable: false, sortable: false},
                    {data: 'product_name', name:'product_name',searchable: false, sortable: false},
                    {data: 'product_price', name:'product_rice',searchable: false, sortable: false},
                    {data: 'inventory', name:'inventory',searchable: false, sortable: false},
                    {data: 'action', name:'action',searchable: false, sortable: false}
                ],
                fnDrawCallback: function () {
                    var $paginate = this.siblings('.dataTables_paginate');

                    if (this.api().data().length <= this.fnSettings()._iDisplayLength) {
                        $paginate.hide();
                    }
                    else {
                        $paginate.show();
                    }
                }
            });
        }

        if (jQuery('.dataTables_filter').length > 0) {
            jQuery('.dataTables_filter').find('input').addClass('form-control')
        }
        $document.on('change', '#product_sold', function(event) {
            event.preventDefault();
            table.ajax.url(url_get_data_product).load();
        });
       
    </script>
    <script type="text/javascript">
        function delete_article(product_id){
            $('.delete-btn'+product_id).trigger('click'); 
        }
    </script>
@stop
