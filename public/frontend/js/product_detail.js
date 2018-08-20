// Global variables
select_options = '';
$(document).ready(function() {

    var main_image = "";
    $('.more').children().css('font-size', '15px');
    //$('.more').find('span>span>span>span').css('font-size', '15px');

    $('.more').find('span').css('color', '#044651');
    //$('.more').find('p>span').css('font-size', '15px');

    //$('.more').find('h3>span').css('font-size', '15px');
    //$('.more').find('h3>span>span').css('font-size', '15px');
    // $('.more').find('h3>span>span>span').css('font-size', '15px');
    // $('.more').find('h3>span>span>span>span').css('font-size', '15px');
    // $('.more').find('h3>span>span>span>span>span').css('font-size', '15px');
    // $('.more').find('h3>span>span>strong>span').css('font-size', '15px');
    //$('.more').find('h3>span>span>strong>span>span').css('font-size', '15px');
    //$('.more').find('h3>span>span>strong>span>span>span').css('font-size', '15px');

    $('.more').find('td').css('background-color', '#ffffff');

    //$('.more').find('td>span').css('font-size', '15px');
    //$('.more').find('td>span>span').css('font-size', '15px');
    //$('.more').find('td>span>span>span').css('font-size', '15px');
    //$('.more').find('td>span>span>span>span').css('font-size', '15px');
    //$('.more').find('td>span>span>span>span>span').css('font-size', '15px');

    //$('.more').find('h1').css('font-size', '15px');
    //$('.more').find('h1>span').css('font-size', '15px');
    //$('.more').find('h1>span>span').css('font-size', '15px');
    //$('.more').find('h1>span>span>span').css('font-size', '15px');
    //$('.more').find('h1>span>span>span>span').css('font-size', '15px');
    //$('.more').find('h1>span>span>span>span>span').css('font-size', '15px');


    //$('.more').find('h2>span').css('font-size', '15px');
    //$('.more').find('h2>span>span').css('font-size', '15px');
    //$('.more').find('h2>span>span>strong>span').css('font-size', '15px');
    //$('.more').find('h2>span>span>strong>span>span').css('font-size', '15px');
    //$('.more').find('h2>span>span>span').css('font-size', '15px');
    //$('.more').find('h2>span>span>span>span').css('font-size', '15px');
    //$('.more').find('h2>span>span>span>span>span').css('font-size', '15 px');


    $('.more > ul').css('list-style-type', 'square');
    //$('.more').find('ul>li>span').css('font-size', '15px');

    $('.more').find('th').css({ "padding": "0px 10px 16px 10px", "border": "1px solid #212b52" });
    $('.more').find('td').css({ "padding": "0px 10px 16px 10px", "border": "1px solid #212b52" });
    //$('.more').find('td>p>span>span>strong>span').css("font-size", "15px");

/*************************Boutton More Details ********************************/
    var buttonTextM = "";
    var buttonTextL = "";
    if ($('#language').val() == "fr") {
        buttonTextM = "More details";
        buttonTextL = "Less details";
    }
    else {
        buttonTextM = "Plus de détails";
        buttonTextL = "Moins de détails";
    }



// More details pour le description
var description_length = $('#description').text().length ;

if (description_length > 1200) {
    $('#btn_details').show();
    $('#btn_details').click(function(e) {
        if ($('#productTabContent').hasClass('height-content')) {
            $('#productTabContent').removeClass('height-content');
            $('.tabs-limit').addClass('hidden');
            $("#btn_details").val(buttonTextL);
        }
        else {
            $('#productTabContent').addClass('height-content');
            $("#btn_details").val(buttonTextM);
            $('.tabs-limit').removeClass('hidden');
        }
    });
}else{
    $('#btn_details').hide();
}

/************************** End More Detail ******************************/

    $('.review-make').click(function(e) {
        $('.content-review-form').removeClass('hidden');
    });
    $('.description-toggle').click(function(e) {
        $('.tabs-details').removeClass('hidden');
        if ($('#btn_details').val() == "Plus de détails" || $('#btn_details').val() == "More details") {
            $('.tabs-limit').removeClass('hidden');
            $('#productTabContent').addClass('height-content');
        }
        else {
            $('.tabs-limit').addClass('hidden');
            $('#productTabContent').removeClass('height-content');
        }
        $('.tabs-details').removeClass('hidden');
        $('#productTabContent').removeClass('mr-sans-contenu-content');
    });
    $('.review-toggle').click(function(e) {

        if ($('#btn_details').val() == "Plus de détails" || $('#btn_details').val() == "More details") {
            $('.tabs-limit').removeClass('hidden');
            $('#productTabContent').addClass('height-content');
        }
        else {
            $('.tabs-limit').addClass('hidden');
            $('#productTabContent').removeClass('height-content');
        }
        if ($('.review-login').hasClass('mr-sans-contenu')) {
            $('#productTabContent').addClass('mr-sans-contenu-content');
            $('.tabs-details').addClass('hidden');
            $('.tabs-limit').addClass('hidden');
        }
        else {
            $('#productTabContent').removeClass('mr-sans-contenu-content');
            $('.tabs-details').removeClass('hidden');
            $('.tabs-limit').removeClass('hidden');
        }
    });

    var product_conatainer = $(".product-area");
    $(product_conatainer).find(".submit-review").on("click", function(e) {
        e.preventDefault();
        var data = $('#review_form').serialize() + '&rating=' + $(".rating-container").find(".fullStar").length;
        if (!$('#review_form').valid()) {
            return;
        }

        $.ajax({
            type: 'POST',
            url: base_url + '/submit-review',
            data: data,
            beforeSend: function() {
                $.LoadingOverlay("show", { 'size': "10%", 'zIndex': 9999 });
            },
            success: function(response, status) {
                if (response.success) {
                    var html = '<div class="alert alert-success">' + response.message + '</div>';
                    //console.log(response.average_rating);
                    $(".stars_review").html('');
                    for (var i = 1; i <= response.average_rating; i++) {
                        $(".stars_review").append('<a title="1" class="star fullStar"></a>');
                    }
                    for (var i = 4; i >= response.average_rating; i--) {
                        $(".stars_review").append('<a title="1" class="star"></a>');
                    }
                    $("#review-message").html(html);
                    $('#comment').val('');                    
                }
                else {
                    var html = '<div class="alert alert-danger">' + response.message + '</div>';
                    $("#review-message").html(html);
                }
                 $.LoadingOverlay("hide");
            },
            error: function(xhr){
                console.log(xhr.responseText);
                 $.LoadingOverlay("hide");
            }
        });
    });
    $("#twitter-sharing").click(function(e) {
        e.preventDefault();
        var twitter = $(this).find(".twitter-share-button");
        var loc = twitter.data('src');
        var title = twitter.data('text');
        window.open('http://twitter.com/share?url=' + loc + '&text=' + title + '&', 'twitterwindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 225) + ', left=' + $(window).width() / 2 + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
    });
    $(product_conatainer).find("#check-product").off();
    $(product_conatainer).find("#check-product").on("click", function(e) {
        var zip_code = $("#zip_code").val();
        var product_id = $('#product-id').val();
        var radius = $('#distance').val();
        // $("#zip-code-error").toggleClass('hidden',(zip_code == null));
        if ($.trim(zip_code) == "") {
            $("#zip_code").css('border-color', 'red');
            return false;
        }
        $("#zip_code").css('border-color', '#ccc');

        $.ajax({
            type: 'POST',
            url: base_url + language_code + '/get-distance',
            data: { 'zip_code': zip_code, 'requested_distance': radius, 'product_id': product_id },
            success: function(response, status) {
                $(".product-check-error").html('');
                if (response.success) {
                    $("#radius").val($("#distance").val());
                    $("#postal_code").val($("#zip_code").val());
                    $("#zip_code").val('');
                    $(product_conatainer).find('#buying_label,#buying_area,#product-not-avail').removeClass('hide').addClass('hide');
                    $(product_conatainer).find('#add-cart').removeClass('hide');
                    $(product_conatainer).find('#see_best_price').removeClass('hide');
                    $(product_conatainer).find('.affiliate-container').addClass('hide');
                    $(product_conatainer).find('.share-community').addClass('mr-l-15');

                }
                else {
                    $(product_conatainer).find('#buying_label,#buying_area,#add-cart').removeClass('hide').addClass('hide');
                    $(product_conatainer).find('#product-not-avail').removeClass('hide');
                    $(product_conatainer).find('#see_best_price').addClass('hide');
                    $(product_conatainer).find('.affiliate-container').removeClass('hide');
                    $(product_conatainer).find('.share-community').removeClass('mr-l-15');

                }
            }
        });
    });

    $(".add-your-review").click(function() {
        $('html, body').animate({
            scrollTop: $("#tab-container").offset().top - 50
        }, 1000);
    });

    product_conatainer.find('img.attr-element').on('click', function() {
        $element = $(this);
        product_conatainer.find("img.attr-element").removeClass('active');
        $element.parents("ul").find('li').removeClass('active');
        $element.parents('li').addClass('active');
        $element.addClass('active');
        product_conatainer.find('#color_attribute_id').val($element.data("product_attribute_option_id"));
    });

    $("#ask-local-product").click(function(e) {
        e.preventDefault();
        if (!$('#ask_product_form').valid()) {
            return;
        }
        var form = $(this).parents('form');
        var data = $('#ask_product_form').serialize() + '&radius=' + $(".ask-page-radius").val() + '&zip_code=' + $(".ask-page-zip-code").val();
        $.ajax({
            type: 'POST',
            url: base_url + language_code + '/product-available',
            data: data,
            success: function(response, status) {
                if (response.success === '1') {
                    $(".ask-order-page-success").removeClass('hide').find('span').text(response.message);
                    form.get(0).reset();
                }
                else if (response.success === '2') {
                    location.href = base_url + 'login';
                }
                else {
                    $(".ask-order-page-warning").removeClass('hide').find('span').text(response.message);
                }
            }
        });
    })
    /*$(document).ajaxStart(function() {
        $.LoadingOverlay("show", { 'size': "10%", 'zIndex': 9999 });
    });
    $(document).ajaxStop(function() {
        $.LoadingOverlay("hide");
    });*/
    $(".thumb-image").click(function(e) {
        e.preventDefault();
        $('.thumb-image').find('.active').removeClass('active');
        main_image = $(this).find('img').data('image');
        $(".main-image").attr('src', main_image).attr('data-zoom-image', main_image);
        $('.image-thumb').removeClass('hidden');
        $('.zoomWindow').css('border', '1px solid black !important');
        $(this).find('img').addClass('active');
        if ($('.enabled').length != 0) {
            $('.zoomContainer').hide();
        }
        $('#main_image').trigger('zoom.destroy');
        if (window.innerWidth < 768) {
            $('#image_main').zoom({ on: 'grab', url: main_image });
        }
        else if (window.innerWidth < 991) {
            $('#image_main').zoom({ on: 'grab', url: main_image });
        }
        else if (window.innerWidth < 1199) {
            $('#image_main').zoom({ on: 'grab', url: main_image });
        }
        else {
            $('#image_main').zoom({ on: 'click', url: main_image });
        }
    });
    if (window.innerWidth < 768) {
        $('#image_main').zoom({ on: 'grab' });
        console.log("On doit zoomer");
    }
    else if (window.innerWidth < 991) {
        $('#image_main').zoom({ on: 'grab' });
    }
    else if (window.innerWidth < 1199) {
        $('#image_main').zoom({ on: 'grab' });
    }
    else {
        $('#image_main').zoom({ on: 'click' });
    }

    $('.rating-container').rating();

    $(product_conatainer).find(".product-select").on("click", function(e) {
        var price = $(this).find(".price").data('price');
        var name = $(this).find(".product-name").text();
        var url = $(this).find(".product-name").attr('href');
        $("#product_name").val(name);
        $("#product_price").val(price);
        $("#product_url").val(url);
    });

    $(product_conatainer).on('click', '#buy_locally', function() {
        $(product_conatainer).find('#buying_area').toggleClass('hide');
        if ($(product_conatainer).find('#buying_area').hasClass('hide')) {
            $(product_conatainer).find('#buying_label').removeClass('hide');
        }
        else {
            $(product_conatainer).find('#buying_label').addClass('hide');
            $(product_conatainer).find('#see_best_price').removeClass('hide');
            $(product_conatainer).find('.affiliate-container').addClass('hide');
            $(product_conatainer).find('.share-community').addClass('mr-l-15');
        }
        $(product_conatainer).find('#add-cart').removeClass('hide').addClass('hide');
        $(product_conatainer).find('#product-not-avail').removeClass('hide').addClass('hide');
    });

    $(product_conatainer).on('click', '#see_best_price', function() {
        if ($(product_conatainer).find('.affiliate-container').hasClass('hide')) {
            $(product_conatainer).find('.affiliate-container').removeClass('hide');
            $(product_conatainer).find('.share-community').removeClass('mr-l-15');
        }
        else {
            $(product_conatainer).find('.affiliate-container').addClass('hide');
            $(product_conatainer).find('.share-community').addClass('mr-l-15');
        }
    });

    //$('.flex-viewport').css('position', 'absolute');
    $('.image-thumb').removeClass('hidden');
    if ($('.fixed-width').length <= 2 && ($('.fixed-width').length > 0)) {
        $('.image-thumb').css('margin-left', '-10%');
        $('.fixed-width').removeClass('fixed-width').addClass('width-fixed');
        $('.width-fixed').css('width', '150px !important');
        $('.product-big-image .previews-list li').css('margin-right', '30px');
        $('.product-big-image .flexslider-thumb').css('margin-top', '30%');
    }
    
    $('#add-to-cart').click(function(){

        $('.product-input-select').each(function(index, element){
            if($(element).val() == null){
                if(!$(this).hasClass('invalid')){
                    $(element).addClass('invalid');
                    $(element).parent().append("<label class='error' style='font-size: 14px; margin-left: 15px; font-weight:500 !important; text-transform: lowercase;'>Veuillez sélectionner s'il vous plait</label>");
                }
            }
        });
        var selected;
        if($('.product-input-select').length > 1){
            selected = $('select.has-product-stock-id.product-input-select').find('option:selected');
        } else {
            selected = $('select.product-input-select').find('option:selected');
        }
        var product_stock_id = selected.data('product_stock_id');
        var product_stock_status_id = selected.data('status');
        
        $('#product-stock-id').val(product_stock_id);
        if(product_stock_status_id == 3) {
            toastr.error("Désolé, ceci n'est plus disponible dans le stock!");
        } else {
            if($('.containt-product-info').find('.invalid').length == 0) {
                $('#product_form').submit();
            }    
        }
        
    });
  
    $('.product-input-select').change(function(){
        if($(this).hasClass('invalid')){
            $(this).removeClass('invalid');
            $(this).parent().find('.error').remove();
        }
    });

    $('.product-input-select').one('change', function(event) {
        $(this).addClass('first');
        $('.product-input-select').each(function(index, element){
            $(element).unbind();
        })
        
        $('.product-input-select').removeClass('invalid');
        $('.product-input-select').parent().find('.error').remove();
        // if($(this).hasClass('has-product-stock-id')){
        //     var selected = $(this).find('option:selected');
        //     var product_stock_id = selected.data('product_stock_id');
        //     console.log("product_stock_id : "+ product_stock_id);
        //     $('#product-stock-id').val(product_stock_id);
        // }
    });

    
    $( "#product_form" ).on( "submit", function( event ) {
        event.preventDefault();
        var load_url = $( "#product_form" ).attr('action');
        var img_src = $('.main-image').attr('src');
        var brand_name = $('.product_brand_name').html();
        var product_name = $('.product_translation_name').html();
        var price = $('.price-exact').html();
        var star_review = $('.stars_review').html();
        var cart_county = cart_count+1;
        var new_price = parseFloat($('#product_form .new-price').html());
        if(cart_count<10){
            var count = '0'+cart_county;
        }else{
            var count = cart_county;
        }


        var number = parseInt($('.number_item').html()) + 1;
        var total_price1 = parseFloat($('.cart_total_price').html());
        var total_price2 = parseFloat($('.price-exact-price').html());
        if (new_price) {
            total_price2 = new_price;
            price = new_price;
        }else {
            total_price2 =  parseFloat(price);
        }    
        var total_price = total_price1 + total_price2;
        var res_total = total_price.toFixed(2)+'<i class="fa fa-eur" aria-hidden="true"></i> ('+number+')';
        //console.log(res_total);
        $.ajax({
            type: "POST",
            url: load_url,
            data: $( this ).serialize(),
            beforeSend: function() {
                $.LoadingOverlay("show", { 'size': "10%", 'zIndex': 9999 });
            }, 
            success: function(data)
            {
                var selected;
                if($('.product-input-select').length > 1){
                    selected = $('select.has-product-stock-id.product-input-select').find('option:selected');
                } else {
                    selected = $('select.product-input-select').find('option:selected');
                }
                var product_stock_status_id = selected.data('status');
                if(product_stock_status_id == 2)
                    toastr.info("Le produit est bien ajouté dans le panier, cet article fait partie des derniers articles du stock!");
                else
                    toastr.success(data.message);
                var html_data = $(document).find('.cart-list:first').clone();
                html_data.removeClass('hidden');
                html_data.find('.cart-img img').attr('src',img_src);
                html_data.find('.cart_brand_name').html(brand_name);
                html_data.find('.cart_item_name').html(product_name);
                html_data.find('.content-new-price .new-price').attr('data-price',total_price2).html(price);
                html_data.find('.content-star').html(star_review);
                if(cart_count == 0){
                    $(document).find('.icon-panier').removeClass('icon-panier').addClass('icon-panier-not-empty');
                    $(document).find('.cart-none').remove();
                    $(document).find('#content-cart').removeClass('hidden');
                }
                $(document).find('.sell_pannier').html(count);
                $(document).find('.mini-cart-total .total-price').html(res_total);

                html_data.insertAfter('.cart-list:last');

                $.LoadingOverlay("hide");
            },
            error: function(xhr){
                console.log('Erreur' + xhr.responseText);
                $.LoadingOverlay("hide");
            }
        });

    });
})

function changeAttribute(box, product_id) { 
    var attribute_option_id = $(box).val();
    if(isLastChoosed() != 0 || $(box).hasClass('first')) {
        var url = $(box).attr('data-route');
        var i = 0; 
        var values = [];
        $('[name="attrs[]"]').each(function(index, element){
            values[i] = $(element).val();
            i++;            
        }) 
        var data = {'product_id': product_id, 'attribute_option_id': attribute_option_id};
        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: url,
            data: data,
            beforeSend: function() {
                $.LoadingOverlay("show", { 'size': "10%", 'zIndex': 9999 });
            },
            success: function(response, status) {
                $('[name="attrs[]"]:not(.first)').html('');                      
                $.each(response, function(key, value){
                    var element = $('[data-attribute='+ value.attribute_id +']');
                    var selected = ($.inArray(value.attribute_option_id, values)) ? 'selected = "selected"' : '';
                    if(!element.hasClass('first')){ 
                        element.append('<option data-product_stock_id="'+value.product_stock_id+'" data-status="'+value.product_stock_status_id+'" value="' + value.attribute_option_id + '" ' + selected + '>' + value.option_name + '</option>') 
                        element.addClass('has-product-stock-id');
                    }
                })
                 
                $.LoadingOverlay("hide");            
            },
            error: function(xhr){
                console.log('Erreur' + xhr.responseText);
                $.LoadingOverlay("hide");
            }
        });
    }    
}

function isLastChoosed() { 
    var i = 0;
    $('[name="attrs[]"]').each(function(index, element){
        if($(element).val() == null) i++;
    })
    return i;
}

function change_attribute(box, product_id) { 
    var attribute_option_id = $(box).val();
    if(isLastChoosed() != 0 || $(box).hasClass('first')) {
        var url = $(box).attr('data-route');
        var i = 0; 
        var values = [];
        $('[name="attrs[]"]').each(function(index, element){
            values[i] = $(element).val();
            i++;            
        }) 
        var data = {'product_id': product_id, 'attribute_option_id': attribute_option_id};
        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: url,
            data: data,
            beforeSend: function() {
                $.LoadingOverlay("show", { 'size': "10%", 'zIndex': 9999 });
            },
            success: function(response, status) {
                $('[name="attrs[]"]:not(.first)').html('');                      
                $.each(response, function(key, value){
                    var element = $('[data-attribute='+ value.attribute_id +']');
                    var selected = ($.inArray(value.attribute_option_id, values)) ? 'selected = "selected"' : '';
                    if(!element.hasClass('first')){ 
                        element.append('<option data-product_stock_id="'+value.product_stock_id+'" data-status="'+value.product_stock_status_id+'" value="' + value.attribute_option_id + '" ' + selected + '>' + value.option_name + '</option>') 
                        element.addClass('has-product-stock-id');
                    }
                })
                 
                $.LoadingOverlay("hide");            
            },
            error: function(xhr){
                console.log('Erreur' + xhr.responseText);
                $.LoadingOverlay("hide");
            }
        });
    }    
}
