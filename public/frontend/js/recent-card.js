$( document ).ready(function() {
    footerCardFixed()
});

function footerCardFixed(){
    var contentCart = document.getElementById('content-cart');

    var callback = function(mutationsList) {
        for(var mutation of mutationsList) {
            if (mutation.attributeName === 'style') {
                var count = $('#content-cart .cart-list').length
                    childHeight = $('.cart-list')[0].clientHeight *2 + 17;

                if(count > 2){
                    $("#content-cart .content-cart").css({'height': childHeight, 'overflow-y': 'scroll'});
                    $("#content-cart .shopping-cart .cart-list").css('width', '99%');
                    $("#content-cart .content-cart").scrollTop(0);  
                    $('.cart-list legend').last().hide();               
                } 
            }
        }
    }
    
    var observer = new MutationObserver(callback);
    observer.observe(contentCart, { attributes: true});

    $(".content-cart").scroll(function() {
        var y = $("#content-cart .content-cart").scrollTop();
        var height = $("#content-cart .content-cart")[0].scrollHeight - $(".content-cart")[0].clientHeight;
        
        if(y == 0){
            $('.cart-list legend').first().show();
            $('.cart-list legend').last().hide();
        } 
        else{
            $('.cart-list legend').first().hide();
            $('.cart-list legend').last().hide();
            if(y == height){
                $('.cart-list legend').first().hide();
                $('.cart-list legend').last().show();
            } 
        }
    })
}