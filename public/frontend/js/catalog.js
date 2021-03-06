$(".select-tri").on('change', '.filter', function(event) {
    var url = get_filter_url();
    apply_filter(url);  
});

$(".dropdown > button").bind('click',function(){
    var icon = $(this).find("i");
   if(icon.hasClass('fa-angle-down')) 
        icon.removeClass('fa-angle-down').addClass('fa-angle-up');
    else icon.removeClass('fa-angle-up').addClass('fa-angle-down');
    $(this).parents('.dropdown').toggleClass('open');
});
// fonctionnement du dropdown
// $(".dropdown > button").click(function() {}, function() {
//     var $icon = $(this).find("i");
//         $icon.removeClass('fa-angle-down').addClass('fa-angle-up');
//         $(this).parents('.dropdown').addClass('open');
// });

// $('button.dropdown-filter').click(function(e) {
//     $(this).siblings('.dropdown-menu').slideToggle();
//     var icon = $(this).find("i");
//     if(icon.hasClass('fa-angle-down')) 
//         icon.removeClass('fa-angle-down').addClass('fa-angle-up');
//     else icon.removeClass('fa-angle-up').addClass('fa-angle-down');
// });

$(".dropdown-menu").mouseleave(function(){
    var $icon = $(this).prev().find("i");   
    $icon.removeClass('fa-angle-up').addClass('fa-angle-down');
    $(this).parents('.dropdown').removeClass('open');
});
//End fonctionnement du dropdown

$('body').on('click', function(e) {
    if (!$('li.dropdown').is(e.target) &&
        $('li.dropdown').has(e.target).length === 0 &&
        $('.open').has(e.target).length === 0
    ) {
        $('li.dropdown').removeClass('open');
    }
});

// fonctionnement des choix dans dropdown
$(".container-filter").on('click', '.filter', function(e) {
    e.preventDefault();
    var $icon = $(this).find("i");

    //supprimer le class selected dans TRIER
    if ($(this).data('type') == 'sort') {
        var $datacurrent= $(this).data('id');
        var $old_selected = $('.sort-filter').find('.selected');
        var $dataold = $old_selected.data('id');
        // console.log("data current"+$datacurrent);
        // console.log("data taloha"+$dataold);
        $old_selected.removeClass('selected');
        var $icon_old_selected = $old_selected.find('i');
        $icon_old_selected.removeClass('fa-dot-circle-o').addClass('fa-circle-o');

        if($datacurrent == $dataold){
            $icon.removeClass('fa-dot-circle-o').addClass('fa-circle-o');
            $(this).removeClass('selected');
        }else{
            $(this).addClass('selected');
            $icon.removeClass('fa-circle-o').addClass('fa-dot-circle-o');
        }
    }
    else{
        //mise en place du class selected dans TOUS filtre
        if ($(this).hasClass('selected')){
            $(this).removeClass('selected');
        }
        else{
            $(this).addClass('selected');
        }
   

    if ($icon.hasClass('fa-circle-o')) {
        $icon.removeClass('fa-circle-o').addClass('fa-dot-circle-o'); //icon en active
    }
    else {
        $icon.removeClass('fa-dot-circle-o').addClass('fa-circle-o'); //icon desactive
    }
}
    
    var filter_url = get_filter_url();
    console.log(filter_url);
    apply_filter(filter_url);

});

// END fonctionnement des choix dans dropdown

//Avoir le resultat du produit par page
function changeNumberProduct() {    
    if ($(".product-container").parents('.category-filter').find('.selected').length > 0) {
        $(".product-container").parents('.category-filter').find('a').removeClass('selected');
    }
    if ($(".product-container").hasClass('all-size')) {
        $(".product-container").parents('.size-filter').find('a').removeClass('selected');
    }
    else if ($(".product-container").parents().hasClass('size-filter')) {
        $(".all-size").removeClass('selected');
    }
    if ($(".product-container").parents('.discount-filter').find('.selected').length > 0) {
        $(".product-container").parents('.discount-filter').find('a').removeClass('selected');
    }
    if ($(".product-container").hasClass('selected')) {
        $(".product-container").removeClass('selected');
    }
    else {
        $(".product-container").addClass('selected');
    }
    $new_val = parseInt($("#nb").val()) + 24;
    $("#nb").val($new_val);

    var filter_url = get_filter_url();
    apply_filter(filter_url);
}


//Changer le visualisation du produit
function changeVisualisation() {
    if ($(".product-container").parents('.category-filter').find('.selected').length > 0) {
        $(".product-container").parents('.category-filter').find('a').removeClass('selected');
    }
    if ($(".product-container").hasClass('all-size')) {
        $(".product-container").parents('.size-filter').find('a').removeClass('selected');
    }
    else if ($(".product-container").parents().hasClass('size-filter')) {
        $(".all-size").removeClass('selected');
    }
    if ($(".product-container").parents('.discount-filter').find('.selected').length > 0) {
        $(".product-container").parents('.discount-filter').find('a').removeClass('selected');
    }
    if ($(".product-container").hasClass('selected')) {
        $(".product-container").removeClass('selected');
    }
    else {
        $(".product-container").addClass('selected');
    }
    var filter_url = get_filter_url();
    apply_filter(filter_url);
}

function apply_filter(url) {
    $.ajax({
        type: 'get',
        url: url,
        dataType: "html",
        beforeSend: function() {
            $.LoadingOverlay("show", { 'size': "10%", 'zIndex': 9999 });
        },
        success: function(response, status) {
            $(".product-container").html($(response).find(".product-container").html())
            history.pushState(null, null, url);
            $.LoadingOverlay("hide");
            $('#search-input').val("");
            progressbar();
        },
        error: function(xhr, status, error) {
            //console.log(xhr.responseText);
            $.LoadingOverlay("hide");
        }
    });
}

function get_filter_url() {
    var url = $(".category-url").data('url');
    var brands = [];
    var sorts = [];
    var color = [];
    var size = [];
    var category = [];
    size['attrs'] = [];

    $(".sort-filter").find(".selected").each(function() {
        sorts.push($.trim($(this).data('id')));
    });
    $(".brand-filter").find(".selected").each(function() {
        brands.push($.trim($(this).data('id')));
    });
    $(".color-filter").find(".selected").each(function() {
        color.push($.trim($(this).data('id')));
    });
    $(".category-filter").find(".selected").each(function() {
        category.push($.trim($(this).data('id')));
    });

    $(".size-filter").find(".selected").each(function() {
        var attribute_id = $.trim($(this).data('attribute_id'));
        var attribute_option_id = $.trim($(this).data('id'));
        if (typeof size['attrs'][attribute_id] === 'undefined') {
            size['attrs'][attribute_id] = [];
        }
        size['attrs'][attribute_id].push(attribute_option_id);
    });

    $(".size-filter").each(function() {
        var attribute_id = $.trim($(this).data('attribute_id'));
        var attribute_option_id = $.trim($(this).val());
        if (typeof size['attrs'][attribute_id] === 'undefined') {
            size['attrs'][attribute_id] = [];
        }
        size['attrs'][attribute_id].push(attribute_option_id);
    });

    var start_price = $(".start-price").val();
    var end_price = $(".end-price").val();
    if (start_price > 0 && end_price > 0) {
        url += "&start_price=" + start_price + '&end_price=' + end_price;
    }

    if (sorts.length > 0) {
        url += "&vp=" + sorts.toString();
    }
    if (category.length > 0) {
        url += "&category=" + category.toString();
    }
    if (brands.length > 0) {
        url += "&brand=" + brands.toString();
    }
    if (color.length > 0) {
        url += "&color=" + color.toString();
    }

    var attrs = [];
    var query_string = '';

    if (size.attrs.length > 0) {
        $.each(size['attrs'], function(key, val) {
            if (typeof val != 'undefined') {
                attrs[key] = val.toString();
                query_string += '&attrs[' + key + ']=' + val.toString();
            }
        });
    }
    url += query_string;
    if (typeof $("#nb").val() != "undefined")
        url += "&nb=" + $("#nb").val();
    else
        url += "&nb=24";
    if (typeof $("#vp").val() != "undefined")
        url += "&vp=" + $("#vp").val();

    return url;
}
add_product_types();

function add_product_types() {
    var $product_type = $('#product_types');
    var $product_types_option = $('#product_types_copie').html();
    if (typeof $product_types_option != 'undefined')
        $product_type.html($product_types_option);
    else
        $product_type.parent().css('display', 'none');
}

function price_filter(start_price, end_price) {
    $(".start-price").val(start_price);
    $(".end-price").val(end_price);
    $('.price-start').append('<span>' + start_price + '</span>');
    $('.price-end').append('<span>' + end_price + '</span>');
    var filter_url = get_filter_url();
    console.log(filter_url);
    apply_filter(filter_url);
}
