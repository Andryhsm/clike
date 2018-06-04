
if (Modernizr.mq('(max-width: 767px)')){
	// Vendre avec Clickee
	$('.engagement-menu#uploadTab, #engagement-menu-content').removeClass('hidden')
	var url = $("#discovery").html();
	$('#content2').html(url);
	$('#tab-sale ul li').on('click', 'a', function(){
		$('.engagement-menu').addClass('hidden')
		var tab = $(this).attr('href')
		//console.log(tab + '******************')
		$('.engagement-menu' + tab + ', #engagement-menu-content').removeClass('hidden')
		var url = $(".engagement-menu" + tab + " a.active").attr('href');
		var urlcontent = $(url).html()
		$('#content2').html(urlcontent);
	})

	var max = 1
	$(".engagement-menu .menu a").each(function() {
	    max = Math.max(max, $(this).height());
	    console.log(max + '$$$$$$$$$$$')
	});
	$(".engagement-menu .menu a").css('height', max)
	console.log(max + '$$$$$$$$$$$')
	// if($('#tab2:visible')){
	// 	$(".engagement-menu .menu a").each(function() {
	// 	    max = Math.max(max, $(this).height());
	// 	    console.log(max + '$$$$$$$$$$$')
	// 	});
	// }
	$(function() {
	  var observer = new MutationObserver(function(mutations) {
	    alert('Attributes changed!');
	  });
	  var target = document.querySelector('#tab2');
	  observer.observe(target, {
	    attributes: true
	  });

	});
}

function showEngagement(box){
	var tab = $(box).attr('data-tab')
	$('.engagement-menu#'+ tab + ' a').removeClass('active')
	$(box).addClass('active')
	url = $(box).attr('href')
	var urlcontent = $(url).html();
	//console.log(urlcontent)
	$('#content2').html(urlcontent);
}