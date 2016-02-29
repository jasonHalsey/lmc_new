jQuery(document).ready(function() {
	
	jQuery('#main_slider').show();

	jQuery('.portfolio-bg').cycle();

	jQuery('.hover-tile-hidden').on('click', function() {
		var url = jQuery(this).find('a').attr('href');
		window.location.href = url;
	});

	adjustSlider();
	// moveSlider();
}); //End document.ready();

jQuery(window).resize(function() {
	
	adjustSlider();
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

// function moveSlider() {
// 	if ((jQuery("body").hasClass("home")) && (Modernizr.mq('(max-width: 767px)'))) {
// 		console.log('Balls');
// 		var sliderBlock = jQuery('.holder, #main_slider').detach();
// 		jQuery('.mission').after(sliderBlock);
// 	} else if ((jQuery("body").hasClass("home")) && (Modernizr.mq('(min-width: 768px)'))) {
// 		console.log('Big Balls');
// 		var sliderBlock = jQuery('.holder, #main_slider').detach();
// 		jQuery('.holder').after(sliderBlock);
// 	};
// }



function adjustSlider() {
	if ((jQuery("body").hasClass("home")) && (Modernizr.mq('only all and (min-width: 768px)'))) {
	// if (jQuery("body").hasClass("home")) {
		console.log('ad slider fired');
	  var sliderheight = jQuery('#main_slider img').height();
		jQuery('#trans-bars').css( 'height', sliderheight + 110 );
		jQuery('.tag').css( 'height', sliderheight + 110 );
		
	}else {
		var sliderheight = jQuery('#main_slider img').height();
		jQuery('#trans-bars').css( 'height', sliderheight + 110 );
		console.log('smalls');
		console.log(sliderheight + 110);

	}
}


