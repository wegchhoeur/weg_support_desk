$(function (){
	'use strict';

	/* =============================================== */
	/* ============== Links [href="#"] =============== */
	$('a[href="#"]').on('click', function(e){
		e.preventDefault();
	});
	/* =============================================== */
	/* =============================================== */

	/* =============================================== */
	/* ================== Preloader ================== */
	window.onload = setTimeout(function(){
		$('body').removeClass('loading');
	}, 400);
	/* =============================================== */
	/* =============================================== */

	/* =============================================== */
	/* =============== Animation WOW ================= */
	new WOW({
		boxClass:     'wow',      // default
		animateClass: 'animated', // default
		offset:       160,          // default
		mobile:       false,       // default
		live:         true        // default
	}).init();
	/* =============================================== */
	/* =============================================== */

	/* =============================================== */
	/* ================= Main menu =================== */
	$('.menu__burger, .menu__close a').on('click', function(e){
		$('body').toggleClass('menuShow');
		e.preventDefault();
	});

	$(document).on('keyup', function(e) {
		if (e.keyCode == 27) {
			$('body.menuShow').removeClass('menuShow');
		}
	});
	/* =============================================== */
	/* =============================================== */

	/* =============================================== */
	/* ================= FAQ Accordeon =============== */
	var faqTitle = $('.faq__item-title'),
		faqBody = faqTitle.siblings('.faq__item-body');

	faqTitle.on('click', function(e) {
		$(this).parent('.faq__item').toggleClass('active');
		e.preventDefault();
	});
	/* =============================================== */
	/* =============================================== */

	/* =============================================== */
	/* ============ Article Helpful Vote ============= */
	var start = $('#article-vote__start'),
		thankYou = $('#article-vote__thankYou'),
		tellMeWhy = $('#article-vote__tellMeWhy');

	start.find('a').on('click', function(){
		start.hide();
		if ($(this).is(':first-child') == true) {
			thankYou.fadeIn(200);
		} else {
			tellMeWhy.fadeIn(200);
		}
		event.preventDefault();
	});

	$('#article-vote__tellMeWhy a').on('click', function(){
		tellMeWhy.hide();
		start.fadeIn(200);
		event.preventDefault();
	});
	/* =============================================== */
	/* =============================================== */


	/* =============================================== */
	/* ================ Video Pop-up ================= */
	$('[data-fancybox]').fancybox({
		youtube : {
			controls : 0,
			showinfo : 0
		},
		vimeo : {
			color : '39f'
		}
	});
	/* =============================================== */
	/* =============================================== */


	/* =============================================== */
	/* ================= Google map ================== */
	if($('#map').length) {
		google.maps.event.addDomListener(window, 'load', init);

		function init() {
			var mapOptions = {
				zoom: 12,
				// draggable: false,
				center: new google.maps.LatLng(51.5, 0),
				styles: [{featureType:"landscape",stylers:[{saturation:-100},{lightness:65},{visibility:"on"}]},{featureType:"poi",stylers:[{saturation:-100},{lightness:50},{visibility:"simplified"}]},{featureType:"road.highway",stylers:[{saturation:-100},{visibility:"simplified"}]},{featureType:"road.arterial",stylers:[{saturation:-100},{lightness:30},{visibility:"on"}]},{featureType:"road.local",stylers:[{saturation:-100},{lightness:40},{visibility:"on"}]},{featureType:"transit",stylers:[{saturation:-100},{visibility:"simplified"}]},{featureType:"administrative.province",stylers:[{visibility:"off"}]/**/},{featureType:"administrative.locality",stylers:[{visibility:"off"}]},{featureType:"administrative.neighborhood",stylers:[{visibility:"on"}]/**/},{featureType:"water",elementType:"labels",stylers:[{visibility:"on"},{lightness:-25},{saturation:-100}]},{featureType:"water",elementType:"geometry",stylers:[{hue:"#29cccc"},{lightness:-25},{saturation:-95}]}]
			}

			var mapElement = document.getElementById('map');
			var map = new google.maps.Map(mapElement, mapOptions);
			var marker = new google.maps.Marker({
				position: new google.maps.LatLng(51.5, 0),
				map: map,
				title:"My Busines Point"
			});
		}
	}
	/* =============================================== */
	/* =============================================== */
});