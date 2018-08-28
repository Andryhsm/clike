/***
** Règle la responsivité à l'aide des scripts js
***/

if (Modernizr.mq('(max-width: 767px)')) {
	$(function() {
		// Vendre avec Clickee
		$('.engagement-menu#uploadTab, #engagement-menu-content').removeClass('hidden')
		var url = $("#discovery").html();
		$('#content2').html(url);
		$('#tab-sale ul li').on('click', 'a', function() {
			$('.engagement-menu').addClass('hidden')
			var tab = $(this).attr('href')
			//console.log(tab + '******************')
			$('.engagement-menu' + tab + ', #engagement-menu-content').removeClass('hidden')
			var url = $(".engagement-menu" + tab + " a.active").attr('href');
			var urlcontent = $(url).html()
			$('#content2').html(urlcontent);
		})

		/** debut règle les hauteurs des menus dans le choix des pack dans les écrans tablettes **/
		var max = 1
		$(".engagement-menu .menu a").each(function() {
			max = Math.max(max, $(this).height());
		});
		max = (max == 1) ? 97 : max;
		$(".engagement-menu .menu a").css('height', max)
		/** fin règle les hauteurs des menus dans le choix des pack dans les écrans tablettes **/
		
	})
}
jQuery(document).ready(function(){
	$('.navbar-mobile button').click(function(e){
        e.preventDefault();
        $('.nav-menu').toggleClass('is-open');
        
    })

	/**** début règle les hauteurs des 3 blocs images, description, form dans current order ***/
	$('.order-content-item')
	var max_order_content_item_height = 1
	$(".order-content-item").each(function() {
		max_order_content_item_height = Math.max(max_order_content_item_height, $(this).height());
		console.log(max_order_content_item_height + '  *********$$$$$$$$$')
	});
	
	$(".order-content-item").css('height', max_order_content_item_height)
	/**** fin règle les hauteurs des 3 blocs images, description, form dans current order ***/


});


/** Affiche les pack engagement dans vendre avec clickee **/
function showEngagement(box) {
	var tab = $(box).attr('data-tab')
	$('.engagement-menu#' + tab + ' a').removeClass('active')
	$(box).addClass('active')
	url = $(box).attr('href')
	var urlcontent = $(url).html();
	//console.log(urlcontent)
	$('#content2').html(urlcontent);

	$($(box).parent().parent().find('.panel-collapse')).slideToggle();
		// .toggleClass('in');
}



