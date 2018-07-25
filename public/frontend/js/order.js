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
        var $this = $(this);
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
                 var product_count = $('.cart-product').length;
                 if(product_count < 10)
                    $('.sell_pannier').html('0'+product_count);
                 else
                    $('.sell_pannier').html(product_count);

                 toastr.success("L'article du panier a été retiré avec succès");
                if($('.cart-product').length == 0){
                    $('.content-cart-product').append("<tr> <td colspan=\"7\">Vous n'avez aucun article dans votre panier.</td></tr>");
                    $('.shopping-cart').html('<h4 class="ct mt-20 mb--10">VOTRE PANIER EST VIDE!</h4>'+
                                                '<span class="al">Continuez à shopper</span>  ').addClass('text-center');                 
                    $('.icon-panier-not-empty').removeClass('icon-panier-not-empty').addClass('icon-panier');
                    $('.sell_pannier').html('');
                }
                calcul_total_price();  
                restore_total_price_for_dropdown();
            }   
        })
        .fail(function() {
            console.log("error");
        });       
    });
})

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

function calcul_total_price() {
    total_amount = 0.00;

    $('.real-price').each(function(index, el) {
        var quantity = $(this).parents('.cart-product').find('.quantity').val();
        var price = $(this).data('price');
        var amount = parseFloat(price);
        var total_peer_product = amount * parseInt(quantity);
        total_amount += total_peer_product;
    });
    total_amount = total_amount.round(2);
    $('.total_original_amount').html(fixed_two_after_dot(total_amount) + '<i class="fa fa-eur"></i>');

}

function restore_total_price_for_dropdown() {
    var product_count = $('.cart-product').length;
    var str_product_count = (product_count < 10) ? '0'+product_count : product_count
    var total_amount = $('.total_original_amount').html();
    $('.shopping-cart').find('.total-price').html(total_amount + '('+str_product_count+')');
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
