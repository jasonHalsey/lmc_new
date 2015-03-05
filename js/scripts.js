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


	// Maximage Homepage Slider //

	jQuery(function(){
	    jQuery('#maximage').maximage({
	        cycleOptions: {
	            fx:'scrollHorz',
	            speed: 800,
	            timeout: 10000,
	            prev: '#arrow_left',
	            next: '#arrow_right'
	        },
			fillElement: '#holder',
			backgroundSize: 'contain'
	    });
	});

	jQuery(function(){
	    jQuery('.portfolio-bg').maximage();
	});


	jQuery('.hover-tile-hidden').on('click', function() {
		var url = jQuery(this).find('a').attr('href');
		window.location.href = url;
	});


}); //End document.ready();


