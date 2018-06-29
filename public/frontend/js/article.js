
function checka(box) {
    var id = $(box).attr("id");
    
    $('#category_id').val(id);
    
    /*var last_val = $('#categories_id').val();
    var new_val = last_val + ',' + $(bloc).attr('id');
    $('#categories_id').val(new_val);
    
    if ($('#' + id + ' i').hasClass('fa-circle-o')) {*/
        $('.category_parent i').addClass('fa-circle-o').removeClass('fa-dot-circle-o');
        $('#' + id + ' i').removeClass('fa-circle-o');
        $('#' + id + ' i').addClass('fa-dot-circle-o');
    /*} */ 
    
    $.ajax({
            url: base_url + 'marchand/child-category',
            type: 'GET',
            dataType: 'json',
            data: { category_id: id },
        })
        .done(function(data) {
            /*console.log(data);*/
            if (data.length > 0) {
                $('#category_child').html('<option value="0">Onglets</option>')
                for (var i = data.length - 1; i >= 0; i--) {
                    var childs = data[i];
                    $('#category_child').append('<option value="' + splitDataId(childs) + '">' + splitDataName(childs) + '</option>')
                }
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
        $('promotional_price').val('');
    }else{
        $('.solde-content').addClass('hidden')
    }
    checkin(box);
}
function splitDataId($data) {
    var result = $data.split('$');
    return result[0];
}
function splitDataName($data) {
    var result = $data.split('$');
    return result[1];
}
$('#reduction').on('blur',function(){
   if($('#product_rate').val() != ''){
       var res = $('#original_price').val()-$('#reduction').val()*$('#original_price').val()/100;
       $('#promotional_price').val(res.toFixed(2));
   }
});

$('#add-img2').click(function(){
    var input_div = $('#add-img-input');
    var row_count = parseInt($('.input-img:last').attr('id'));
    var row_index = row_count + 1;
    input_div.append("<input type=\"file\" class=\"input-img\" id=\""+ row_index +"\" name=\"images["+ row_index +"]\" />");
    $('#' + row_index).trigger('click');
    load_left_img('.input-img#'+row_index);
});

function load_left_img(div){
    $(div).change(function() {
        var center = $('.center-img img');
        $('.nav-img').append('<img src=""></img>');
        var navimg = $('.nav-img img:last-child');
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
                console.log(data);
                $('.product-attribute').html(data.responseText);
            }
        });
    }
})

$('#add-decline').click(function(){
    var rep = $('.decline:last').attr('data-count');
    var row_count = parseInt(rep);
    var html_data = $(document).find('.decline:first').clone();
    $('.decline:last').append('<div class="line_separator"></div>')
    html_data.find('.product_inventory').val('');
    html_data.find('.attribute_id').attr('name','attribute_id['+ row_count +'][]');
    html_data.find('.attribute_option').attr('name','attributes['+ row_count +'][]');
    html_data.find('.product_stock_id').attr('value','');
    html_data.find('.product_stock_attribute_option_id').attr('value','').attr('name','product_stock_attribute_option_id['+ row_count +'][]');
    html_data.attr('data-count', row_count + 1);
    html_data.insertAfter('.decline:last');
})

$('.input-img#1').change(function(){
    var center = $('.center-img img');
    $('.nav-img').append('<img src=""></img>');
    var navimg = $('.nav-img img');
    $('.add-img1').addClass('hidden');
    $('.add-img2').removeClass('hidden');
    readURL(this, center);
    readURL(this, navimg);
});

function set_stock_type(stock)
{
    var type = $(stock).attr("data_type");
    $(stock).closest('.stock-types').find('.fa-dot-circle-o').addClass('fa-circle-o').removeClass('fa-dot-circle-o');
    $(stock).removeClass('fa-circle-o').addClass('fa-dot-circle-o');
    $(stock).closest('.stock-types').find('input').val(type);    
}

$('#add-article').click(function() {
    var form = $('#product');
    $('#attribute_set_').attr('disabled', false);
    form.validate({
       rules: {
           product_name: "required"
       } 
    });
    if(form.valid()){
        console.log("Notre form est bien valid");
    }else{
        console.log("Notre form n'est pas valid");
    }
});

$('.checkbox').click(function(e){
    e.preventDefault();
    var $icon = $(this).find('i');
    changeCircle($icon, $(this));
});

$('.check-all').click(function(e){
    e.preventDefault();
    var thisIcon = $(this).find('i');
    $('.checkbox').each(function(index, el) {
        var icon = $(el).find('i');
       // removeSelection(icon, $(this));
        changeCircle(icon, $(this));
        changeCircle(thisIcon, $(this));
    });
});

function changeCircle(icon, parent){
    if(icon.hasClass('fa-circle-o')){
        icon.removeClass('fa-circle-o');
        icon.addClass('fa-dot-circle-o');
        parent.addClass('checked');
    }else {
        icon.addClass('fa-circle-o');
        icon.removeClass('fa-dot-circle-o');
        parent.removeClass('checked');
    }
    if(parent.hasClass('check-all')){
        if(parent.hasClass('checked'))
            $('.buttons-selection .deletes').removeClass('hidden');
        else
            $('.buttons-selection .deletes').addClass('hidden');
    }
}

function removeSelection(icon, parent){
    if(parent.hasClass('checked')){   
        icon.addClass('fa-circle-o');
        icon.removeClass('fa-dot-circle-o');
        parent.removeClass('checked');
    }
}