
if (Modernizr.mq('(max-width: 767px)')){
	// Vendre avec Clickee

	$('.engagement-menu#uploadTab, #engagement-menu-content').removeClass('hidden')
	var url = $("#discovery").html();
	$('#content2').html(url);
	$('#tab-sale ul li').on('click', 'a', function(){
		$('.engagement-menu').addClass('hidden')
		var tab = $(this).attr('href')
		console.log(tab + '******************')
		$('.engagement-menu' + tab + ', #engagement-menu-content').removeClass('hidden')
		console.log('.engagement-menu' + tab + ', #engagement-menu-content ######')
		var url = $(".engagement-menu" + tab + " a.active").addClass('shadow-engagement').attr('href');
		console.log(url)
		//url
		var urlcontent = $(url).html()
		console.log(urlcontent)
		$('#content2').html(urlcontent);
	})
}

function showEngagement(box){
	$('.engagement-menu a').removeClass('shadow-engagement')
	$(box).addClass('shadow-engagement')
	url = $(box).attr('href')
	var urlcontent = $(url).html();
	console.log(urlcontent)
	$('#content2').html(urlcontent);
	//console.log($('#tab-engagement'))
}
//$('#tab-engagement').contents().filter('' + url);