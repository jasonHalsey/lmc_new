jQuery(document).ready(function() {
	// Single Page Navigation
	jQuery('.single-page-nav').singlePageNav({
    offset: jQuery('.single-page-nav').outerHeight(),
    filter: ':not(.external)',
    updateHash: false,
    beforeStart: function() {
        // console.log('begin scrolling');
    },
      onComplete: function() {
          // console.log('done scrolling');
      }
  });
}); //End document.ready();
