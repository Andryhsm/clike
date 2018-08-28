/**
 * draggable
 */
$( function() {
    $( "#sortable" ).sortable({
        update: function(event, uri){
            
           // var nav_img = $('.nav-img').find('.nav-img-item');
            $('.nav-img .nav-img-item').each( function(i,el){
                var index = $(el).index() + 1;
                var id = $(el).find('img ').attr('data-file');
                $('input#' + id).attr('name', 'images['+index+']');
            });     
        }
    });
    $( "#sortable" ).disableSelection();
  } );
/**
 * end draggable
 */
/**
 * Drag and drop Image
*/
////////////////////////////////////////Pour le 1er bouton image
// $(document).ready(function(){
//     $.event.props.push("dataTransfer");
//     // On pose les évènements nécessaires au drag'n'drop
//     $('#output').bind({
//         "dragenter dragexit dragover" : do_nothing, drop : drop
//     });
// });

// // Fonction stoppant toute évènement natif et leur propagation
// function do_nothing(evt){
//     evt.stopPropagation();
//     evt.preventDefault();
// }

// function drop(evt){
//     //console.log(evt.dataTransfer.files[0].name + '+++++');
//     do_nothing(evt);
//   // for ( var i=0 ; i<10 ; i++){
//     var file = evt.dataTransfer.files[0];
//      var reader = new FileReader();
//         reader.onload = function (evt) {
//             $('#1').remove();
//             //var tmppath = URL.createObjectURL(file); 
//             var url = evt.target.result; 
//             var center = $('.center-img img');
//             $('.nav-img').append('<div class="nav-img-item"><img src="" data-file="1"></img><a class="close-thik"></a></div>');
//             $('.center-img img').attr('src', url);
//             $('.nav-img div:last-child img').attr('src', url);
//             var navimg = $('.nav-img img');
//             $('.add-img1').addClass('hidden');
//             $('.add-img2').removeClass('hidden');

//             var input_div = $('#add-img-input');
//             var row_count = parseInt($('.input-img:last').attr('id'));
//             //console.log(last_row_index);
//             var row_index = row_count + 1;
//             input_div.append('<input type="file" class="input-img" id="'+ row_index +'" name="images['+row_count+']" value="'+url+'" />');
           
//         }
//         reader.readAsDataURL(file);
//     //console.log($('#'+row_index).val());
// }

/**
 * ENd Drag and Drop Image
 */
var $document = $(document);
$( document ).ready(function(){
    if($('.decline').length > 1) $('#remove-decline').removeClass('hidden');

    $document.on('keyup keypress change', "#product_name", function (e) {
        var clone_text = $("#product_name").val();
        clone_text = $.trim(clone_text);
        clone_text = normalize_string(clone_text);
        clone_text = clone_text.toLowerCase().replace(/[^\w ]+/g, '').replace(/ +/g, '-').replace(/\_/g, '');
        $("#product_url").val(clone_text);
    });
}) 


function checka(box) {
    var id = $(box).attr("id");
    
    $('#category_id').val(id);
    
    $('.category_parent i').addClass('fa-circle-o').removeClass('fa-dot-circle-o');
    $('#' + id + ' i').removeClass('fa-circle-o');
    $('#' + id + ' i').addClass('fa-dot-circle-o');     
    
    $.ajax({
            url: base_url + 'marchand/child-category',
            type: 'GET',
            dataType: 'json',
            data: { category_id: id },
        })
        .done(function(data) {
            var etat_gamme = data[data.length - 1];
            if (data.length > 0) {
                $('#category_child').html('<option value="">Onglets</option>')
                data.pop();
                for (var i = data.length - 1; i >= 0; i--) {
                    var childs = data[i];
                    //childs = childs.filter((obj) => obj);console.log(childs)
                    $('#category_child').append('<option value="' + splitDataId(childs) + '">' + splitDataName(childs) + '</option>')
                }
            }
            var gamme = $('#attribute_set_');
            var input_hidden = $('.attribute_id');
            var input_select = $(input_hidden.parent().find('input[type=text], select')[1]);
            if (etat_gamme == null) {
                gamme.parent().remove();
                $(input_select).parent().parent().hide();
                $(input_select).disabled;
                input_hidden.parent().hide();
            } else if(gamme[0] == undefined){
                $('<div class="form-group">\n' +
                    '                            <label for="attribute_set_">Gamme</label>\n' +
                    '                            <select data-msg="Veuillez sélectionner la gamme!" name="attribute_set_id" id="attribute_set_" class="form-control required">\n' +
                    '                                <option value="" selected="selected">Selectionner gamme</option>\n' +
                    '                                 \n' +
                    '                                        <option value="33">Chaussures</option>\n' +
                    '                                        <option value="32">Accessoires</option>\n' +
                    '                                        <option value="31">Vetements/Accessoires</option>\n' +
                    '                                        </select>\n' +
                    '                            \n' +
                    '                        </div>').insertAfter($('#brand_name').parent());
            }
        })
        .fail(function() {
            console.log("error du recuperation du code promo");
        });
        
}
function checkin(box)
{
     var id = $(box).attr("id");
    if ($('#' + id + ' i').hasClass('fa-circle-o')) {
            $('#' + id + ' i').removeClass('fa-circle-o');
            $('#' + id + ' i').addClass('fa-dot-circle-o');
        }
        else {
            $('#' + id + ' i').removeClass('fa-dot-circle-o');
            $('#' + id + ' i').addClass('fa-circle-o');
        }
}
function checked(box)
{
     var id = $(box).attr("id");
    if ($('#' + id + ' i').hasClass('fa-circle-o')) {
            $('#' + id + ' i').removeClass('fa-circle-o');
            $('#' + id + ' i').addClass('fa-dot-circle-o');
            $('#is_active').val('1');
        }
        else {
            $('#' + id + ' i').removeClass('fa-dot-circle-o');
            $('#' + id + ' i').addClass('fa-circle-o');
            $('#is_active').val('2');
        }
}

function solde(box)
{   
    if($('.solde-content').hasClass('hidden')){
        $('.solde-content').removeClass('hidden');
        $('#reduction').val('');
        $('#promotional_price').val('');
    }else{
        $('.solde-content').addClass('hidden')
    }
    checkin(box);
}
function splitDataId($data) {
    if ($data != null && $data != '1') {
        var result = $data.split('$');
        return result[0];
    }
}
function splitDataName($data) {
    if ($data != null  && $data != '1') {
        var result = $data.split('$');
        return result[1];
    }
}
$('#reduction').bind('keyup change', function () {
   if($('#original_price').val() != ''){
        if($('#reduction').val() < 0) {
            $('#reduction').addClass('invalid');
            toastr.error('Le rabais ne peut pas être négatif.');
        }
        else {
            $('#reduction').removeClass('invalid')
            var res = $('#original_price').val()-$('#reduction').val()*$('#original_price').val()/100;
            $('#promotional_price').val(res.toFixed(2));
        }
        
   }
});

$(document).on('click', '.add-bouton', function(event) {
    var input_div = $('#add-img-input');
    var row_count = parseInt($('.input-img:last').attr('id'));
    var row_index_last = $('.nav-img-item').last().find('img').attr('data-index');
    var last_row_index =parseInt(row_index_last) + 1;
    //console.log(last_row_index);
    var row_index = row_count + 1;
    input_div.append('<input type="file" class="input-img" id="'+ row_index +'" name="images['+last_row_index+']" />');
    $('#' + row_index).trigger('click');
    load_left_img('.input-img#'+row_index, row_index);
});

$(document).on('click', '.add-img1', function(event) {
    event.preventDefault();
    $('.input-img#1').trigger('click');
});

$('.input-img#1').change(function(){
    var center = $('.center-img img');
    $('.nav-img').append('<div class="nav-img-item"><img src="" data-file="1"></img><a class="close-thik"></a></div>');
    var navimg = $('.nav-img img');
    $('.add-img1').addClass('hidden');
    $('.add-img2').removeClass('hidden');
    readURL(this, center);
    readURL(this, navimg);
});

$(document).on('click', '.close-thik', function(event) {
    $(this).closest('.nav-img-item').remove();
    if($(this).siblings('img').attr('data-image-id')) {
        var id = $(this).siblings('img').attr('data-image-id');
        console.log(id + '***')
        console.log('++++' + id);
        var values = $('#remove_img').val();
        if($('#remove_img').val() == '') $('#remove_img').val(values + id);
        else $('#remove_img').val(values + ',' + id);
    }
    else{
        var file = $(this).siblings('img').attr('data-file');
        $('#' + file).remove();
    }
    var img_src = $('.nav-img-item:first img').attr('src');
    var src = '';
    if(img_src != null) {
        src = img_src;
        $('.center-img img').attr('src', src);
    }
    else {
        console.log('XXXXXXXXXXXXXXXXXXXXXXX')
        $('.add-img1').removeClass('hidden');
        $('.add-img2').addClass('hidden');
    }    
});

function load_left_img(div, row_index){
    $(div).change(function() {
        var center = $('.center-img img');
        $('.nav-img').append('<div class="nav-img-item"><img src="" data-file="' + row_index + '"></img><a class="close-thik"></a><input class="hidden" value="" name="product_image_ids[]"></div>');
        var navimg = $('.nav-img div:last-child img');
        readURL(this, center);
        readURL(this, navimg);
    });
}    

function readURL(input, div) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            div.attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$('#attribute_set_').change(function(){
    var selected_attribute_set_id = $('#attribute_set_ :selected').val();
    var product_id = $("input[name='product_id']").val();
    var url_get_attribute = $('#get_attributes').attr('href');
    /*console.log(selected_attribute_set_id+'-'+product_id);*/
    if(selected_attribute_set_id){
        $.ajax({
            type: "GET",
            url: url_get_attribute,
            data: "attribute_set_id=" + selected_attribute_set_id + "&product_id=" + product_id,
            complete: function (data) {
                $('.product-attribute').html(data.responseText);
            }
        });
    }
})

$('#add-decline').click(function(){
    var rep = $('.decline:last').attr('data-count');
    var row_count = parseInt(rep) + 1;
    var html_data = $(document).find('.decline:first').clone();
    html_data.find('.product_inventory').val('').attr('name', 'product_inventory['+row_count+']').attr('data-range', row_count);
    html_data.find('.attribute_id').attr('name','attribute_id['+ row_count +'][]');
    html_data.find('.attribute_option').attr('name','attributes['+ row_count +'][]');
    html_data.find('.product_stock_id').attr('value','').attr('name', 'product_stock_id['+row_count+']');
    html_data.find('.product_stock_attribute_option_id').attr('value','').attr('name','product_stock_attribute_option_id['+ row_count +'][]');
    html_data.attr('data-count', row_count);
    html_data.find('input[name*="stock-types"]').attr('name', 'stock-types['+row_count+']');
    html_data.insertAfter('.decline:last');
    
    if($('.decline').length > 1) $('#remove-decline').removeClass('hidden');
})
//product_stock_id['+row_count+']
$(document).on('click', '#remove-decline', function(event) {
   if($('.decline').length == 1) $('#remove-decline').addClass('hidden');

   if($('.decline:last').find('.product_stock_attribute_option_id').val()) {
        var product_stock_id = $('.decline:last').find('.product_stock_id').val();
        var product_stock_attribute_option_id = $('.decline:last').find('.product_stock_attribute_option_id').val();
        console.log(product_stock_attribute_option_id + ' ********');
        var product_stock_attribute_option_id_val = $('#remove_attribute_option').val();
        if($('#remove_attribute_option').val() == '') $('#remove_attribute_option').val(product_stock_attribute_option_id);
        else $('#remove_attribute_option').val(product_stock_attribute_option_id_val + ',' + product_stock_attribute_option_id);
    }
    else{
        var file = $(this).siblings('img').attr('data-file');
        $('#' + file).remove();
    }
    $('.decline:last').remove();
});

function set_stock_type(stock)
{
    var type = $(stock).attr("data_type");
    $(stock).closest('.stock-types').find('.fa-dot-circle-o').addClass('fa-circle-o').removeClass('fa-dot-circle-o');
    $(stock).removeClass('fa-circle-o').addClass('fa-dot-circle-o');
    $(stock).closest('.stock-types').find('input').val(type);    
}


$('form#product').on('click', '#add-article', function(e) {
    e.preventDefault();
    //$.validator.messages.required = '';
    var form = $('#product');
    $('#attribute_set_').attr('disabled', false);
    form.validate({
        rules: {
           product_name: "required",
        },
        ignore: []
    });
    $('.product_inventory').each(function (index, el) {
        $(this).rules("add", {
            required: true
        });
    });
    if(form.valid()){
        $('#product').submit();
    }else{
        toastr.error("Erreur! Valeur non valide détectée!");
    }
});

$('.checkbox').click(function(e){
    e.preventDefault();
    var $icon = $(this).find('i');
    changeCircle($icon, $(this));
    if($('.checked').length > 0){
        $('.buttons-selection .deletes').removeClass('hidden');
    }else{
        $('.buttons-selection .deletes').addClass('hidden');
        if($('.check-all').hasClass('checked-all')){
            var icon = $('.check-all').find('i');
            icon.addClass('fa-circle-o');
            icon.removeClass('fa-dot-circle-o');
            $('.check-all').removeClass('checked-all');    
        }   
    }
});

$('.check-all').click(function(e){
    e.preventDefault();
    var thisIcon = $(this).find('i');
    changeCircle(thisIcon, $(this));
    if($(this).hasClass('checked-all')){
        $('.buttons-selection .deletes').removeClass('hidden');
        $('.checkbox').each(function(index, el) {
            var icon = $(el).find('i');
            if(icon.hasClass('fa-circle-o')){
                icon.removeClass('fa-circle-o');
                icon.addClass('fa-dot-circle-o');
                $(el).addClass('checked');
            }
        });
    }else{
        $('.buttons-selection .deletes').addClass('hidden');
        $('.checkbox').each(function(index, el) {
            var icon = $(el).find('i');
            if(icon.hasClass('fa-dot-circle-o')){
                icon.addClass('fa-circle-o');
                icon.removeClass('fa-dot-circle-o');
                $(el).removeClass('checked');       
            }
        }); 
    }
});

jQuery('.deletes').on('click', function (e) {
    e.preventDefault();
    $('#confirm_delete_multiple').modal({backdrop: 'static', keyboard: false})
        .one('click', '#delete', function () {
            delete_selected_product();
        });
});

function delete_selected_product(){
    var product_ids = [];
    $('#article_list .checked').each(function(index, el) {
        product_ids.push($(el).data('product-id'));
    });
    $.ajax({
        url: url_deletes_product,
        type: 'GET',
        data: {product_ids: product_ids},
    })  
    .done(function(response) {
        console.log(response);
        var article_check = $('#article_list .checked');
        if(response == true){
            article_check.each(function(index, el) {
                $(el).parents('.content-product').remove();
            });
            console.log("Suppression du produit avec success ! ");
            if(article_check.length > 1 )
                toastr["success"]("Suppression des produits avec success !");
            else
                toastr["success"]("Suppression du produit avec success !");
        }else{
            if(article_check.length > 1 )
                toastr["success"]("Erreur de suppression des produits !");
            else
                toastr["success"]("Erreur de suppression du produit !");
        }
    })
    .fail(function(xhr) {
        console.log("Erreur dans la suppression multiple des produits : " + xhr.responseText);
    });
}

function changeCircle(icon, parent){
    if(icon.hasClass('fa-circle-o')){
        icon.removeClass('fa-circle-o');
        icon.addClass('fa-dot-circle-o');
        if(!parent.hasClass('check-all'))
            parent.addClass('checked');
        else
            parent.addClass('checked-all');
    } else {
        icon.addClass('fa-circle-o');
        icon.removeClass('fa-dot-circle-o');
        if(!parent.hasClass('check-all'))
            parent.removeClass('checked');
        else
            parent.removeClass('checked-all');
    }
}

function removeAllSelection(){
    $('.checkbox').each(function(index, el) {
        var icon = $(el).find('i');
        if($(el).hasClass('checked') && !$(el).hasClass('check-all')){ 
           icon.addClass('fa-circle-o');
           icon.removeClass('fa-dot-circle-o');
           $(el).removeClass('checked');
        }    
    });    
}

function checkBlank(){
    var required_inputs = $('.article-form').find('input.required');
    var i = 0;
    required_inputs.each(function(index, element){
        if($(element).val() == null) i++;
    })
    return i;
}
