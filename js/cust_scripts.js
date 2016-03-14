jQuery(document).ready(function() {
	// adjustSlider();


	jQuery('#main_slider').show();

	jQuery('.portfolio-bg').cycle();

	jQuery('.hover-tile-hidden').on('click', function() {
		var url = jQuery(this).find('a').attr('href');
		window.location.href = url;
	});

	

	
// Adds "All" to category filetering in portfolio

	jQuery( "#filter_block > ul" ).prepend( "<li><a href='" + site_url + "/projects'>All</a></li>" );

	jQuery( "#filter_block").css('display','inline');

	jQuery( ".dark-stripe > h2.portheader").css('display','block');


	
	// moveSlider();
}); //End document.ready();

jQuery(window).resize(function() {
	
	// adjustSlider();
	// moveSlider();
});

jQuery(document).ready(function() {
  var menuToggle = jQuery('#js-mobile-menu').unbind();
  jQuery('#js-navigation-menu').removeClass("show");

  menuToggle.on('click', function(e) {
    e.preventDefault();
    jQuery('#js-navigation-menu').slideToggle(function(){
      if(jQuery('#js-navigation-menu').is(':hidden')) {
        jQuery('#js-navigation-menu').removeAttr('style');
      }
    });
  });
});

//Back To Top Scrolling
	// browser window scroll (in pixels) after which the "back to top" link is shown
	var offset = 300,
		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
		offset_opacity = 1200,
		//duration of the top scrolling animation (in ms)
		scroll_top_duration = 700,
		//grab the "back to top" link
		$back_to_top = $('.cd-top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('cd-fade-out');
		}
	});

//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});

// function adjustSlider() {
// 	if ((jQuery("body").hasClass("home")) && (Modernizr.mq('only all and (min-width: 768px)'))) {
// 	// if (jQuery("body").hasClass("home")) {
		
// 	  var sliderheight = jQuery('#main_slider img').height();
// 		jQuery('#trans-bars').css( 'height', sliderheight + 110 );
// 		jQuery('.tag').css( 'height', sliderheight + 110 );
// 		console.log('adjustSlider fired ');
// 	}else {
// 		var sliderheight = jQuery('#main_slider img').height();
// 		jQuery('#trans-bars').css( 'height', sliderheight + 110 );
// 		onsole.log('adjustSlider kind of fired ');
// 	}
// }


