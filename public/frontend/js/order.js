Number.prototype.round = function(p) {
    p = p || 10;
    return parseFloat(this.toFixed(p));
};
$(function() {
    $.fn.orderDetail = function() {
        $(".coupon-code").toggle();
        var order_detail_container = $(".order-detail-container");
        $(order_detail_container).find(".order-item-container").on('click', '.row', function(event) {
            $(order_detail_container).find(".row").removeClass('active');
            $(this).addClass('active');
        });
        $(order_detail_container).find(".notification-btn").on('click', 'a', function(event) {
            event.preventDefault();
            var url = base_url + language_code + '/choose-seller/' + $(this).data('merchant');
            var item_id = $(this).data('item-id');
            var customer_id = $(this).data('customer');
            var merchant_id = $(this).data('merchant');
            var available_type = $(this).data('available_type');
            var available_time = $(this).data('available_time');
            var product_name = $(this).data('product_name');
            var product_link = $(this).data('product_link');
            $.ajax({
                type: 'POST',
                url: url,
                data: { 'item_id': item_id, 'merchant': merchant_id, 'customer': customer_id, 'available_type': available_type, 'available_time': available_time, 'product_name': product_name, 'product_link': product_link },
                beforeSend: function() {
                    $.LoadingOverlay("show", { 'size': "10%", 'zIndex': 9999 });
                },
                success: function(response, status) {
                    $.LoadingOverlay("hide");
                    window.location.reload();
                }
            });
        });

        $(".response-to-customer").click(function(e) {
            var form = $("#product_search_form_".$(this).data('index'));
            $(form).submit();
        });

        $(".cancel_order").on('click', function(e) {
            e.preventDefault();
            var form = $("#product_booking_" + $(this).data('index'));
            var form_url = form.attr('action');
            var new_url = form_url.replace('booking-request', 'cancel-request');
            form.attr('action', new_url);
            $(form).submit();
        });

        $(".booking-request").click(function(e) {
            var form = $("#product_booking_".$(this).data('index'));
            $(form).submit();
        });

        $(".coupon-code-btn").click(function() {
            $(this).next().toggle();
        });

    }
    calcul_total_price();

    $('.cart-product').on('change', '.quantity', function(event) {
        store_quantity_in_session($(this).data('url'));
        calcul_total_price();
    });

    $('.cart-remove').click(function(event) {
        event.preventDefault();
        delete_cart($(this));
    });
    $('.cart-paye[name="code_promo_name"]').keyup(function(){
        if($('.cart-paye[name="code_promo_name"]').val() == '') 
            $('.apply_codepromo i').attr('class','fa fa-circle-o');

    });

    $('.apply_codepromo').on('click', 'i', function(event){
        event.preventDefault();
        if($('.cart-paye[name="code_promo_name"]').val() != ''){
            if ($(this).hasClass('fa-circle-o')) {
                $(this).removeClass('fa-circle-o');
                $(this).addClass('fa-dot-circle-o');
                apply_codepromo();            
            } else {
                $(this).removeClass('fa-dot-circle-o');
                $(this).addClass('fa-circle-o');
                reset_codepromo();
            }
        }
    });

    $('#input-credit-card').keyup(function()
    {
        $(this).val(function(i, v)
        {
            var v = v.replace(/[^\d]/g, '').match(/.{1,4}/g);
            return v ? v.join(' ') : '';
        });
    });
});

function is_promed_item(category_list, response_category_list){
    var is_promed = false;
    $.each(category_list.split(','), function(i, val1) {
        $.each(response_category_list.split(','), function(j, val2) {
            if(val2 == val1)
                is_promed = true;
        })
    })
    console.log(is_promed + ' last')
    return is_promed;
}

function apply_codepromo() {    
    var product_ids = [];
    $('.item_product_id').each(function(i, el) {
        product_ids.push($(el).val());
    });
    var code_promo_name = $('.cart-paye[name="code_promo_name"]').val();
    var url = $('.apply_codepromo').attr('data-url');
    //console.log(url)
    var data = [];
    $('.article:not(:last-child)').each(function(i, el) {  
        console.log($(el).attr('id') + ' ' + $(el).find('.quantity').val());
        data.push({
            item_id: $(el).attr('id'), 
            quantity:  $(el).find('.quantity').val(),
            old_price:  $(el).find('.real-price').attr('data-real-price'),
            product_id : $(el).find('.product_id_item').attr('value')
        });
    });
    //console.log(JSON.stringify(data));
    $.ajax({
        url: url,
        type: 'POST',
        data: {'data' : data, 'code_promo_name' : code_promo_name},
        dataType: 'json',
        beforeSend: function() {
            $.LoadingOverlay("show", { 'size': "10%", 'zIndex': 9999 });
        },
        success: function(response, status) {
            if(response.error) toastr.error(response.error);
            else {
                if(response.data != '') {
                    $.each(response.data, function(id, item) {
                        var id = item.item_id;
                        var price = item['real_price'];

                        var price_item = $('#' + id).find('.product-price').children().length;
                        var original_price = item.original_price; 
                        if(price_item  > 3) {
                            $('#' + id).find('.discount').html('(-' + item.discount + '%)');
                            $('#' + id).find('.original_price del').html(fixed_two_after_dot(original_price) + '<i class="fa fa-eur" aria-hidden="true"></i>');
                            $('#' + id).find('.real-price').html( fixed_two_after_dot(price.round(2)) + '<i class="fa fa-eur" aria-hidden="true"></i>');
                            $('#' + id).find('.real-price').attr('data-price', '' + price);
                            $('#' + id).find('.real-price').data('price', '' + price);
                            $('#' + id).find('input.data-real-price').val(price);
                            $('#' + id).find('input.data-real-price').attr('value', price);
                        }
                        else {
                            var data_real_price = $('#' + id).find('.real-price').attr('data-real-price');
                            var product_id = $('#' + id).find('.product_id_item').attr('value');
                            var html = '<input class="hidden product_id_item" type="text" value="'+ product_id +'" autocomplete="off">';
                            html += '<span class="old-price discount" data-product-discount="0" style="color: rgb(67, 223, 230);">(-' + item.discount + '%)</span>';
                            html += '<span class="old-price original_price" style="color: rgb(67, 223, 230);" data-price="'+item.discount+'"><del>'+fixed_two_after_dot(original_price) +'<i class="fa fa-eur" aria-hidden="true"></i></del></span>';
                            html += '<span class="new-price real-price" data-price="'+price+'" data-real-price="' + data_real_price + '">'+fixed_two_after_dot(price.round(2)) +'<i class="fa fa-eur" aria-hidden="true"></i></span>';
                            html += '<input type="text" class="data-real-price hidden" name="real-price['+id+']" value="'+ price +'" autocomplete="off">';
                            $('#' + id).find('.product-price').html(html);
                        }

                    });
                    calcul_total_price(response.data, response.quantity_max); 
                    toastr.success('Code promo appliqué avec succès!');                   
                    if(response.exceed_quantity_item != '') 
                        toastr.warning("Les produits " + response.exceed_quantity_item + " ont dépassé la quantité maximale autorisée par le code promo. Si vous ne diminuez pas la quantité, seuls les " + response.quantity_max + " auront le prix rabaissé et le reste auront le prix original");
                    
                }
                else toastr.warning("Aucun produit assigné à ce code.");
            }
            $.LoadingOverlay("hide");
        },
        error: function(xhr, status, error){
            console.log(xhr.responseText);
            $.LoadingOverlay("hide");
        }
    }); 

}

function reset_codepromo() {
    $('.article:not(:last-child)').each(function(i, el) {
        var id = $(el).attr('id');
        var real_price = parseFloat($(el).find('.real-price').attr('data-real-price'));
        var div_item = $(el).clone();
        if($(el).find('.discount').attr('data-product-discount') == 0) { 
            var product_id = $(el).find('.product_id_item').attr('value');
            var html = '<input class="hidden product_id_item" type="text" value="'+ product_id +'" autocomplete="off">';                                                                 
            html += '<span class="old-price real-price original_price" data-price="'+real_price+'" data-real-price="'+real_price+'">'+fixed_two_after_dot(real_price.round(2)) + '<i class="fa fa-eur" aria-hidden="true"></i></span>';
            html += '<input type="text" class="data-real-price hidden" name="real-price['+id+']" value="'+real_price+'" autocomplete="off">';
            $(el).find('.product-price').html(html);
        }
        else {
            var original_price = $(el).find('.original_price').attr('data-price');
            var discount = $(el).find('.discount').attr('data-product-discount');
            $(el).find('.original_price del').html(fixed_two_after_dot(original_price) + '<i class="fa fa-eur" aria-hidden="true"></i>');
            $(el).find('.discount').html('(-'+discount+'%)')
            $(el).find('.real-price').html( fixed_two_after_dot(real_price.round(2)) + '<i class="fa fa-eur" aria-hidden="true"></i>');
            $(el).find('.real-price').attr('data-price', '' + real_price);
            $(el).find('.real-price').data('price', '' + real_price);
            $(el).find('input.data-real-price').val(real_price);  
        }
        
    });
    calcul_total_price();
    toastr.info("Code annulé avec succès!"); 
}

function delete_cart(box) {
    var $this = $(box);
    var url = $this.data('url');
    var attr_src = $this.parents('.cart-product').find('img').attr('src');
    var img_dropdown_cart = $('.shopping-cart').find('img[src="'+attr_src+'"]');
    img_dropdown_cart.parents('.cart-list').remove();

    $.ajax({
        url: url,
        type: 'GET',
    })
    .done(function(data) {
         if(data.response == "success"){
             $this.parents('.cart-product').remove();
             $this.parents('.cart-list').remove();
             var product_count = $('.cart-list').length;
             if(product_count < 10)
                $('.sell_pannier').html('0'+product_count);
             else
                $('.sell_pannier').html(product_count);

            //toastr.success("L'article du panier a été retiré avec succès");
            if($('.cart-product').length == 0){
                $('.content-cart-product').append("<tr> <td colspan=\"7\">Vous n'avez aucun article dans votre panier.</td></tr>");
            }
            if($('.cart-list').length == 0){
                $('.shopping-cart').html('<h4 class="ct mt-20 mb--10">VOTRE PANIER EST VIDE!</h4>'+
                                            '<span class="al">Continuez à shopper</span>  ').addClass('text-center');                 
                $('.icon-panier-not-empty').removeClass('icon-panier-not-empty').addClass('icon-panier');
                $('.sell_pannier').html('');
            }
            calcul_total_price();  
            restore_total_price_for_dropdown();
            if($this.hasClass('cart-dropdown')){
                calcul_total_price_dropdown();
            }
            if($this.hasClass('confirm-cart')){
                var title = "";
                var cart_count = $('.cart-list').length;
                if(cart_count < 2)
                    title = '<h2>'+cart_count+' ARTICLE</h2>';
                else
                    title = '<h2>'+cart_count+' ARTICLES</h2>';
                $('.cart-title').html(title);
                if(cart_count == 0){
                    var p = '';
                        p+=        '<div class="cart-title">';
                        p+=            '<h2>0 ARTICLE </h2>';
                        p+=        '</div>';
                        p+=            'Vous n\'avez aucun article dans votre panier.';
                    $('.content-cart-product').html(p);
                }
            }
        }   
    })
    .fail(function() {
        console.log("Erreur lors du suppression du produit dans le panier");
    }); 
}

function store_quantity_in_session(url) {
    $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            data: $('#cart_form').serialize()
        })
        .done(function(data) {
            console.log(data);
        })
        .fail(function(xhr) {
            console.log(xhr.responseText);
        });
}

function calcul_total_price(data, quantity_max) {
    console.log(JSON.stringify(data))
    console.log(quantity_max)
    total_amount = 0.00;
    $('.real-price').each(function(index, el) {
        var id = $(el).closest('.article').attr('id');
        var quantity = $(this).parents('.cart-product').find('.quantity').val();
        var price = 0;
        $.each(data, function(i, val) {
            var rest = parseInt(quantity) - parseInt(quantity_max);
            if(id == val.item_id && quantity > quantity_max) 
                price = (parseInt(quantity_max) * parseFloat(val.real_price) + rest * parseFloat(val.original_price))/parseInt(quantity);
        });
        
        if(price == 0) price = $(this).data('price');
        var amount = parseFloat(price);
        var total_peer_product = amount * parseInt(quantity);
        total_amount += total_peer_product;
    });
    total_amount = total_amount.round(2);
    $('.total_original_amount').html(fixed_two_after_dot(total_amount) + '<i class="fa fa-eur"></i>');
}

function restore_total_price_for_dropdown() {
    var product_count = $('.cart-list').length;
    var str_product_count = (product_count < 10) ? '0'+product_count : product_count
    var total_amount = $('.total_original_amount').html();
    $('.shopping-cart').find('.total-price').html(total_amount + '('+str_product_count+')');
}

function calcul_total_price_dropdown() {
    total_amount = 0.00;
    $('.cart-price .new-price').each(function(index, el) {
        //var quantity = $(this).parents('.cart-product').find('.quantity').val();
        var price = $(this).data('price');
        var amount = parseFloat(price);
        //var total_peer_product = amount * parseInt(quantity);
        total_peer_product = amount;
        total_amount += total_peer_product;

        console.log('price : '+price);
        console.log('total_peer_product :'+total_peer_product);
        console.log('total_amount :'+total_amount);
    });
    total_amount = total_amount.round(2);
    $('.total-price').html(fixed_two_after_dot(total_amount) + '<i class="fa fa-eur"></i> ('+$('.cart-list').length+')');
}

function fixed_two_after_dot(number) {
    var str = number.toString();
    tmp = str.split(".");
    if (tmp.length == 2) {
        if (tmp[1].length >= 2) {
            return str;
        }
        if (tmp[1].length == 1) {
            return tmp[0] + "." + tmp[1] + "0";
        }
        return tmp[0] + ".00";
    }
    return str + ".00";
}
