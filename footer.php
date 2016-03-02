<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage lmc
 */
?>

		<footer id="colophon" class="site-footer footer-2" role="contentinfo">
			<div id="footer-container">	
			  <div class="footer-logo">
			    <a href="<?php bloginfo('url');?>">
			    	<img src="<?php echo bloginfo('url'); ?>/wp-content/themes/lmc_new/images/LMC_shield.svg">
			    </a>
			  </div>
			 		 <?php wp_nav_menu( array( 'theme_location' => 'secondary-menu', 'menu_class' => 'nav-menu' ) ); ?>
		   
			</div>
			<a href="#0" class="cd-top icon-circle-up"></a>
		</footer><!-- #colophon -->
	  <?php
		  if ( is_page( 'contact' )) { ?>
		    <script src='https://api.tiles.mapbox.com/mapbox.js/v2.2.4/mapbox.js'></script>
		    <link href='https://api.tiles.mapbox.com/mapbox.js/v2.2.4/mapbox.css' rel='stylesheet' />
		  <?php
		  }
		?>
	<?php wp_footer(); ?>

</body>

</html>

