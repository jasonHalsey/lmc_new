jQuery(document).ready(function() {
	
	jQuery('#main_slider').show();

	jQuery('.portfolio-bg').cycle();

	jQuery('.hover-tile-hidden').on('click', function() {
		var url = jQuery(this).find('a').attr('href');
		window.location.href = url;
	});

	adjustSlider();

}); //End document.ready();

jQuery(window).resize(function() {
	adjustSlider();
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


function adjustSlider() {
	if (jQuery("body").hasClass("home")) {
	  var sliderheight = jQuery('#main_slider img').height();
		jQuery('#trans-bars').css( 'height', sliderheight + 110 );
		jQuery('.tag').css( 'height', sliderheight + 110 );
	}
}


