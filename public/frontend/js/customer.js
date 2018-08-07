Number.prototype.round = function(p) {
    p = p || 10;
    return parseFloat(this.toFixed(p));
};

var promos_quantity_max = {};
var product_quantity = {};

jQuery(document).ready(function() {

    var $document = jQuery(document);

    $('#product_name1').select2({
        data: product_is_active
    });

    $("#customer_form").validate();

    $('.select2-container').css('width', '100%');

    $document.on('click', '.add_size_input', function() {
        var row_count = parseInt($('.product_input_row:last').attr('id'));
        var row_index = row_count + 1;
        var input_type = $document.find('#input_type :selected').val();

        var html_data = $document.find('.master-input-size-container').clone();
        html_data.removeClass('master-input-size-container hidden').prop('id', row_index).addClass('product-content');

        html_data.find('.product_name select').attr('name', 'product_name[' + row_index + ']').attr('id', 'product_name' + row_index).attr('data-content-range', row_index).addClass('select-product-name');
        html_data.find('.product_name label').attr('for', 'product_name' + row_index);
        html_data.find('.product_reference input').attr('name', 'product_reference[' + row_index + ']').addClass('input-product-reference');
        html_data.find('.parent_category select').attr('name', 'parent_category[' + row_index + ']').attr('id', 'parent_category' + row_index).addClass('select-parent-category').attr('data-content-range', row_index);
        html_data.find('.sub_category select').attr('name', 'sub_category[' + row_index + ']').attr('id', 'sub_category' + row_index).addClass('select-sub-category');
        html_data.find('.product_size select').attr('name', 'product_size[' + row_index + ']').attr('id', 'product_size' + row_index).addClass('select-product-size');
        html_data.find('.product_color select').attr('name', 'product_color[' + row_index + ']').attr('id', 'product_color' + row_index).addClass('select-product-color');
        html_data.find('.discount input').attr('name', 'discount[' + row_index + ']').attr('id', 'discount' + row_index).addClass('input-discount');
        html_data.find('.promo_code input').attr('name', 'promo_code[' + row_index + ']').attr('id', 'promo_code' + row_index).addClass('input-code-promo');
        html_data.find('.product_price input').attr('name', 'product_price[' + row_index + ']').attr('id', 'product_price' + row_index).addClass('input-product-price');
        html_data.find('.product_quantity input').attr('name', 'product_quantity[' + row_index + ']').attr('id', 'product_quantity' + row_index).addClass('input-product-quantity');
        html_data.find('.product_stock_id input').attr('name', 'product_stock_id[' + row_index + ']').attr('id', 'product_stock_id' + row_index).addClass('input-product-stock-id');
        html_data.find('.promo_quantity_max input').attr('name', 'promo_quantity_max[' + row_index + ']').attr('id', 'promo_quantity_max' + row_index).addClass('input-promo-quantity-max');
       
        html_data.find('.size_input_quantity input').attr('name', 'quantities_size[' + row_index + ']').attr('placeholder', 'quantité pour taille ' + row_index);

        html_data.find('.button :button').removeClass('btn-primary add_size_input').addClass('btn-danger remove_size_input').text('Annuler ce produit');

        html_data.find('.product_name select').select2({
            data: product_is_active
        });

        $(html_data).hide().appendTo("#size_list_input").animate({ height: 'toggle' }, 500);
        $('.select2-container').css('width', '100%');
    });

    $document.on('click', '.remove_size_input', function() {
        $(this).parents('.product-content').remove();
    });

    $document.on('change.select2', '.product_name select', function(e) {
        var product_id = $(this).val();
        var content_range = $(this).data('content-range');
        get_product_data($(this), product_id, content_range);

    });

    $(document).on('change', '.input-select-attribute', function(event) {
        var parent_element = $(this).parents('.product-content');
        var box = $(this);
        
        var attribute_option_id = $(box).val();
        var product_id = parent_element.find('.select-product-name').val();
        var first_product_stock_id;
        var url = $(box).attr('data-route');
        var data = {'product_id': product_id, 'attribute_option_id': attribute_option_id};
        
        if(parent_element.find('.input-select-attribute').length > 1){
            if(!parent_element.hasClass('selected-input')){
                parent_element.addClass('selected-input');
                $(this).addClass('first');
            }
            if($(box).hasClass('first')) {
                var i = 0; 
                var values = [];
                parent_element.find('[name="attrs[]"]').each(function(index, element){
                    values[i] = $(element).val();
                    i++;            
                });
                $.ajax({
                    dataType: 'json',
                    type: 'POST',
                    url: url,
                    data: data,
                    beforeSend: function() {
                        $.LoadingOverlay("show", { 'size': "10%", 'zIndex': 9999 });
                    },
                    success: function(response, status) {
                        parent_element.find('[name*="attrs"]:not(.first)').html('');                      
                        $.each(response, function(key, value){
                            var element = parent_element.find('[data-attribute='+ value.attribute_id +']');
                            //var selected = ($.inArray(value.attribute_option_id, values)) ? 'selected = "selected"' : '';
                            var selected = (key==1) ? 'selected' : '';
                            if(key==1){
                                first_product_stock_id = value.product_stock_id;
                            }
                            if(!element.hasClass('first')){ 
                                element.append('<option data-product_stock_id="'+value.product_stock_id+'" value="' + value.attribute_option_id + '" ' + selected + '>' + value.option_name + '</option>') 
                                element.addClass('has-product-stock-id');
                            }
                        })
                        element_not_first = parent_element.find('[name*="attrs"]:not(.first)');
                        var product_stock_id = element_not_first.find('option:selected').data('product_stock_id');;
                        product_stock_id = (typeof product_stock_id == "undefined") ? first_product_stock_id : product_stock_id;
                        parent_element.find('[name*="product_stock_id"]').val(product_stock_id); 
                        parent_element.find('.input-product-quantity').attr('data-product-stock-id', product_stock_id);
                        parent_element.find('.input-product-quantity').removeAttr('disabled');
                        parent_element.find('.input-product-quantity').val('1');
                        $.LoadingOverlay("hide");            
                    },
                    error: function(xhr){
                        console.log('Erreur' + xhr.responseText);
                        $.LoadingOverlay("hide");
                    }
                });
            }

            element_not_first = parent_element.find('[name*="attrs"]:not(.first)');
            var product_stock_id = element_not_first.find('option:selected').data('product_stock_id');;
            product_stock_id = (typeof product_stock_id == "undefined") ? first_product_stock_id : product_stock_id;
            parent_element.find('[name*="product_stock_id"]').val(product_stock_id); 
            parent_element.find('.input-product-quantity').attr('data-product-stock-id', product_stock_id);
            parent_element.find('.input-product-quantity').removeAttr('disabled');
            parent_element.find('.input-product-quantity').val('1');
        } else {
            $.ajax({
                url: url,
                type: 'POST',
                data: data,
            })
            .done(function(data) {
                var product_stock_id = data[0].product_stock_id;
                parent_element.find('[name*="product_stock_id"]').val(product_stock_id);
                parent_element.find('.input-product-quantity').attr('data-product-stock-id', product_stock_id);
                parent_element.find('.input-product-quantity').removeAttr('disabled');
                parent_element.find('.input-product-quantity').val('1');
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });
            
        }
    });

    $document.on('change', '.select-parent-category', function(event) {
        /*console.log("Bonjour tous le monde");*/
        var index = $(this).data('content-range');
        $.ajax({
                url: base_url + 'marchand/produit/get-code-promo-by-category',
                type: 'GET',
                dataType: 'json',
                data: { category_id: $(this).val() },
            })
            .done(function(data) {
                if (data.code_promos.length > 0) {
                    $('#promo_code' + index).html('<option value="0">Séléctionner une code</option>')
                    for (var i = data.code_promos.length - 1; i >= 0; i--) {
                        var code_promo = data.code_promos[i];
                        /*console.log("index : " + index);*/
                        $('#promo_code' + index).append('<option value="' + code_promo.code_promo_id + '">' + code_promo.code_promo_name + '</option>')
                    }
                }
            })
            .fail(function() {
                console.log("error du recuperation du code promo");
            });

    }); 

    $document.on('keyup', '.input-product-quantity', function(event) {
        var url = $(this).data('url');
        var product_stock_id = $(this).data('product-stock-id');
        var product_quantity = parseInt($(this).val());
        var $product_quantity = $(this).parents('.product-content').find('.product_quantity');
        console.log(product_stock_id);
        $.ajax({
            url: url,
            type: 'GET',
            data: {product_stock_id: product_stock_id}
        })
        .done(function(data) {
            console.log(data);
            var quantity_in_stock = parseInt(data.quantity);
            console.log("quantity_in_stock "+ quantity_in_stock + " product_quantity "+ product_quantity);
            if(quantity_in_stock < product_quantity) {
                $product_quantity.find('.error_').remove();
                $product_quantity.append('<label class="error_">Le stock est insuffisant!</label>')
            } else {
                $product_quantity.find('.error_').remove();
            }
        })
        .fail(function() {
            console.log("error");
        })
        .always(function() {
            console.log("complete");
        });
        
    });
    $document.on('change', '.input-code-promo', function(event) {
        $parent_element = $(this).parents('.product-content');
        var url = $(this).data('url');
        var code_promo_name = $(this).val();
        var product_id = $parent_element.find('.select-product-name').val();
        var parent_category_id = $parent_element.find('.select-parent-category').val();
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            data: {'code_promo_name': code_promo_name, 'product_id': product_id, 'parent_category_id': parent_category_id},
        })
        .done(function(response) {
            var $input_product_price = $parent_element.find('.input-product-price');
            var $input_discount = $parent_element.find('.input-discount');
            var $input_promo_quantity_max = $parent_element.find('.input-promo-quantity-max')
            if(response.status == "found"){
                toastr["success"](response.message);
                if(!$input_product_price.hasClass('apply-discount-promo')) {    
                    var price = parseInt($input_product_price.data('price'));
                    var price_rabais = price - (price*parseInt(response.discount))/100;
                    $input_product_price.val(price_rabais);
                    $input_product_price.addClass('apply-discount-promo');
                    $input_discount.val(response.discount);
                    $input_promo_quantity_max.val(response.quantity_max);
                }
                if(promos_quantity_max.hasOwnProperty(product_id) == false) {    
                    promos_quantity_max[product_id] = response.quantity_max;
                }
            } else {
                if($input_product_price.hasClass('apply-discount-promo')) { 
                    $input_product_price.val($input_product_price.data('price'));
                    $input_product_price.removeClass('apply-discount-promo');
                    $input_discount.val("");
                    $input_promo_quantity_max.val("");
                }
                toastr.error(response.message);
            }
        })
        .fail(function() {
        });
        
    });


    $('#paiement').click(function(event) {
        var form = $("#customer_form");
        validate_customer_info();
        validate_product_name();
        if (form.valid()) {
                if($('.error_').length == 0 && $('.invalid_').length == 0){
                    $('#next-in-paiement').trigger('click');
                    var info_product_customer = $('#customer_form').serializeArray();
                    var total_price_product = 0;
                    var total_price_product_ttc = 0;
                    var total_discount_price = 0;
                    var total_original_price = 0;
                    var tab_tr = {};
                    $('.table-content-paiement').html('');
                    $('.select-product-name').each(function(index, el) {
                        $('.table-content-paiement').append("<tr class='tr" + index + "'><th>" + $(this).find('option:selected').text() + "</th><tr/>");
                    });
                    $('.input-product-reference').each(function(index, el) {
                        $('.table-content-paiement').find('.tr' + index).append('<th>' + $(this).val() + '</th>');
                    });

                    $('.input-product-quantity').each(function(index, el) {
                        $('.table-content-paiement').find('.tr' + (index-1)).append('<th>' + $(this).val() + '</th>');
                    });
                    $('.input-product-price').each(function(index, el) {
                        var product_quantity = parseInt($(this).parents('.product-content').find('.input-product-quantity').val());
                        var price = parseInt($(this).val()) * product_quantity;
                        $('.table-content-paiement').find('.tr' + index).append('<th>' + fixed_two_after_dot(price) + ' <i class="fa fa-eur" aria-hidden="true"></i></th>');
                        total_price_product += price;
                        total_original_price += parseInt($(this).data('price'));
                    });
                    $('.select-parent-category').each(function(index, el) {
                        /*console.log($(this).find('option:selected').text());*/
                    });
                    $('.input-discount').each(function(index, el) {
                        var parent = $(this).parents('.product-content');
                        var percent = ($(this).val() != '') ? $(this).val() : 0;
                        var price = parent.find('.input-product-price').val();
                        price = (price != '') ? price : 0;
                        var discount_price = parseFloat(price) * (parseInt(percent) / 100);
                        total_discount_price += discount_price;
                    });
                    $('.input-code-promo').each(function(index, el) {
                        /*console.log($(this).val());*/
                    });

                    total_price_product_ttc = total_price_product - total_discount_price;
                    var discount_total = (total_discount_price * 100) / total_original_price;
                    discount_total = discount_total.round(2);
                    total_price_product_ttc = total_price_product_ttc.round(2);
                    $('.table-content-paiement').append('<tr class="total"><th></th><th></th><th>Montant total HT</th><th>' + fixed_two_after_dot(total_price_product) + ' <i class="fa fa-eur" aria-hidden="true"></i></th></tr>');
                    $('.table-content-paiement').append('<tr class="total"><th></th><th></th><th>Remise</th><th>' + discount_total + '%</th></tr>');
                    $('.table-content-paiement').append('<tr class="total"><th></th><th></th><th>TVA</th><th>0%</th></tr>');
                    $('.table-content-paiement').append('<tr class="total"><th></th><th></th><th>Montant total TTC</th><th>' + fixed_two_after_dot(total_price_product_ttc) + ' <i class="fa fa-eur" aria-hidden="true"></i></th></tr>');
                    $('#total_ht').val(total_price_product);
                    $('#total_ttc').val(total_price_product_ttc);
                }
        }
        
  
    });
    autocomplete_list_customer();
});

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


function get_product_data(box, product_id, content_range) {
    var options_size = [];
    var options_color = [];
    var select_option_size = [];
    var select_option_color = [];

    $('#product_size' + content_range).html("<option></option>");
    $('#product_color' + content_range).html("<option></option>");
    $('#parent_category' + content_range).html("<option></option>");
    $('#sub_category' + content_range).html("<option></option>");

    var $current_element = $('#product_name' + content_range);
    $parent_element = $current_element.parents('.product_name');
    $parent = $current_element.parents('.product-content');
    $input_code_promo = $parent.find('.input-code-promo');

    if($current_element.val() == 0){
        if(!$current_element.hasClass('invalid_')){
            $current_element.addClass('invalid_');
            $parent_element.append("<label class='error_'>Veuillez sélectionner un produit</label>");
        }
        $input_code_promo.attr("disabled", "disabled");
        $input_code_promo.val("");
    } else {
        if($current_element.hasClass('invalid_')){
            $current_element.removeClass('invalid_');
            $parent_element.find('.error_').remove();
        }
        $input_code_promo.removeAttr('disabled');
    }

    $.ajax({
            url: base_url + 'marchand/produit/get-product-for-encasement',
            type: 'GET',
            dataType: 'json',
            data: { product_id: product_id },
        })
        .done(function(data) {
            var attribute_values = data.attribute.attribute_values;
            var product = data.product;
            var code_promo_arr = data.code_promo_arr;
            var attributes = data.attribute_set.attributes;
            paste_select_html(box, data.select_html, content_range);
            add_option_select_category(data, content_range);
            
            $('#product_price' + content_range).val(product.original_price).attr('data-price', product.original_price);
            $('#product_quantity' + content_range).val("1");
        })
        .fail(function(xhr, options) {
            console.log(xhr.responseText);
        });
}

function paste_select_html(box, select_html_data, content_range) {
    var html_data = $.parseHTML(select_html_data);
    box.parents('.product-content').find('.content-attribute').html(html_data);
    box.parents('.product-content').find('.input-select-attribute').attr('name', 'attrs['+content_range+'][]');
}

function add_option_select_category(data, content_range) {
    var category_arr = data.category_arr;
    var parent_categorie = data.parent_categorie;
    if (Object.keys(category_arr).length > 0) {
        //$('#parent_category' + content_range).html("<option name='0'>Séléctionner une catégorie</option>");
    }
    if(Object.keys(parent_categorie).length > 0){
        //$('#sub_category' + content_range).html("<option value='0'>Séléctionner une catégorie</option>");
        var index_parent_category = 0;
        for (var category_id in parent_categorie) {
            var selected = ""
            if(index_parent_category == 0)
                selected = "selected";
            $('#parent_category' + content_range).append('<option value="' + category_id + '" '+selected+'>' + data.parent_categorie[category_id] + '</option>');
            index_parent_category++;
        }
    }           
    var index_sub_category = 0;
    for (var category_id in category_arr) {
        var selected = "";
        if(index_sub_category == 0)
            selected = "selected";
        $('#sub_category' + content_range).append('<option value="' + category_id + '" '+selected+'>' + data.category_arr[category_id] + '</option>');
    }
}

function validate_customer_info() {
    var form = $("#customer_form");
    form.validate({
        rules: {
            last_name: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            }
        }
    });
    if (form.valid()) {
        $('#add-customer').trigger('click');
    }
}

function validate_product_name() {
        $('.select-product-name').each(function(index, element) {
            $element_parent = $(element).parents('.product_name');
            console.log($(element).val());
            if ($(element).val() == 0) {
                if(!$(element).hasClass('invalid_')){
                    $(element).addClass('invalid_');
                    $element_parent.append("<label class='error_'>Veuillez sélectionner un produit</label>");
                }
            }
            else {
                $(element).removeClass('invalid_');
                $element_parent.find('.error_').remove();
            }
        });
        if($('#size_list_input').find('.invalid').length == 0){
            if($('.error').length == 0)    
                $('#next-in-paiement').trigger('click');
        }
}

function autocomplete_list_customer() {
    users = [];
    $.ajax({
            url: base_url + 'marchand/get-customers',
            type: 'GET',
            dataType: 'json'
        })
        .done(function(data) {
            var user_list = data[0];
            for (var i = user_list.length - 1; i >= 0; i--) {
                var user = {};
                user = user_list[i];
                users.push(user);
            }
            var options = {
                data: users,
                getValue: function(value) {
                    return value.last_name + " " + value.first_name;
                },
                list: {
                    onSelectItemEvent: function() {
                        console.log($('#last_name').getSelectedItemData());
                        $('#user_id').val($('#last_name').getSelectedItemData().user_id);
                        $('#first_name').val($('#last_name').getSelectedItemData().first_name);
                        $('#phone_number').val($('#last_name').getSelectedItemData().phone_number);
                        $('#birthday').val($('#last_name').getSelectedItemData().birthday);
                        $('#email').val($('#last_name').getSelectedItemData().email);
                        $('#last_name').val($('#last_name').getSelectedItemData().last_name);
                        var address = $('#last_name').getSelectedItemData().address;
                        if(address != null){
                            $('#postal_code').val($('#last_name').getSelectedItemData().address.zip);
                            $('#address').val($('#last_name').getSelectedItemData().address.address1);
                            $('#country').val($('#last_name').getSelectedItemData().address.city);
                        }
                    },
                    onChooseEvent: function() {
                        $('#type_customer').val(1);
                    }
                }
            };

            $("#last_name").easyAutocomplete(options);

        }) 
        .fail(function() {})
        .always(function() {});
}