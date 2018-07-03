// GLOBAL VARIABLE for the changeAttribute function
    FIRST_CLICKED_ATTRIBUTE = '';
    FIRST_CLICKED_ATTRIBUTE_OPTION = '';
    FIRST_CLICKED_HTML = '';
    
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
            url: base_url + language_code + '/submit-review',
            data: data,
            beforeSend: function() {
                $.LoadingOverlay("show", { 'size': "10%", 'zIndex': 9999 });
            },
            success: function(response, status) {
                if (response.success) {
                    $("#review-success").addClass('alert alert-success').html(response.message);
                    $('#comment').val('');
                }
                else {
                    $("#review-error").addClass('alert alert-danger').html(response.message);
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
                    // $("#add-to-cart").removeClass('hidden').show();
                    // $("#check-product, #zip-code-error").hide();
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
                    $(element).parent().append("<label class='error' style='font-size: 14px; font-weight:500 !important; text-transform: lowercase;'>Veuillez sélectionner s'il vous plait</label>");
                }
            }
        });
        if($('.containt-product-info').find('.invalid').length == 0) {
            $('#product_form').submit();
        }
    });
    $('.product-input-select').change(function(){
         if($(this).hasClass('invalid')){
            $(this).removeClass('invalid');
            $(this).parent().find('.error').remove();
        }
    });
    
    $('.product-input-select').val('default');
  
    $('[name="attrs[]"]').bind('change', function() {
        FIRST_CLICKED_ATTRIBUTE = $(this).attr('data-attribute');
        FIRST_CLICKED_ATTRIBUTE_OPTION = $(this).val();
        $(this).find('[value = ' + FIRST_CLICKED_ATTRIBUTE_OPTION + ']').attr('selected', 'selected');
        FIRST_CLICKED_HTML = $(this).html();
        changeAttribute($(this), $('[name="product_id"]').val());
        $('[name="attrs[]"]').unbind('change');
    });
})

function changeAttribute(box, product_id) {
    // console.log(FIRST_CLICKED_ATTRIBUTE);
    // console.log(FIRST_CLICKED_ATTRIBUTE_OPTION);
    // console.log(FIRST_CLICKED_HTML);
    
    $(box).find('option').removeAttr('selected');
    console.log('********' + $(box).html());
    var attribute_option = $(box).val();
    $(box).find('[value = ' + attribute_option + ']').attr('selected', 'selected');
    console.log('********' + $(box).html());
    var attribute_option_id = $(box).val();
    var url = $(box).attr('data-route');
    var parent = $(box).attr('data-attribute');
    var select_value = {};
    var key = '';
    $('[name="attrs[]"]').each(function( index ) {
        key = $(this).attr('data-attribute');
        select_value[key] = $(this).val();
    });
    
    var data = {'product_id': product_id, 'attribute_option_id': attribute_option_id};
    
    // Vérifie si c'est le dernier select key = last key
    var next_select = $(box).parent().next('.form-group').find('select');
    var last_empty = not_empty_except_last(select_value, key);
    if(next_select.length == 0 && last_empty) {
        // ne fait rien
        console.log('dernier select ');
    }
    else{
        $.ajax({
            dataType: 'json',
            type: 'POST',
            url: url,
            data: data,
            beforeSend: function() {
                $.LoadingOverlay("show", { 'size': "10%", 'zIndex': 9999 });
            },
            success: function(response, status) {
                console.log(response);
                $('[name="attrs[]"]').html('');
                $.each(response, function(key, value){
                    if($.inArray(value.attribute_id, select_value)) 
                        $('[data-attribute="'+ value.attribute_id +'"]').append('<option value="' + value.attribute_option_id + '" selected="selected">' + value.option_name + '</option>') 
                    else 
                        $('[data-attribute="'+ value.attribute_id +'"]').append('<option value="' + value.attribute_option_id + '" >' + value.option_name + '</option>')    
                })
                
                $('[data-attribute="'+ FIRST_CLICKED_ATTRIBUTE +'"]').html(FIRST_CLICKED_HTML);
                $.LoadingOverlay("hide");
                
            },
            error: function(xhr){
                console.log('Erreur' + xhr.responseText);
                $.LoadingOverlay("hide");
            }
        }); 
    }
    
}

function not_empty_except_last(tab, last_key){
    var resp = true;
    $.map( tab, function( val, i ) {
      if(!val && i!=last_key) resp = false;
    });
    return resp;
}