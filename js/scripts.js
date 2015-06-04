jQuery(document).ready(function() {
	
	// Refills Navigation Script //

	  var menu = jQuery('#menu-primary');
	  var menuToggle = jQuery('#js-mobile-menu');
	  var signUp = jQuery('.sign-up');

	  jQuery(menuToggle).on('click', function(e) {
	    e.preventDefault();
	    menu.slideToggle(function(){
	      if(menu.is(':hidden')) {
	        menu.removeAttr('style');
	      }
	    });
	  });

	  // underline under the active nav item
	  jQuery(".nav .nav-link").click(function() {
	    jQuery(".nav .nav-link").each(function() {
	      jQuery(this).removeClass("active-nav-item");
	    });
	    jQuery(this).addClass("active-nav-item");
	    jQuery(".nav .more").removeClass("active-nav-item");
	  });



	jQuery('.hover-tile-hidden').on('click', function() {
		var url = jQuery(this).find('a').attr('href');
		window.location.href = url;
	});


	adjustSlider();

}); //End document.ready();

jQuery(window).resize(function() {
	adjustSlider();
});


function adjustSlider() {
	var sliderheight = jQuery('#main_slider img').height();
	jQuery('#trans-bars').css( 'height', sliderheight + 120 );
	jQuery('.tag').css( 'height', sliderheight + 120 );
}






