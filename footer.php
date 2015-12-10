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
		    <div class="footer-secondary-links">
		      <ul>
		        <li><a href="javascript:void(0)">Terms and Conditions</a></li>
		        <li><a href="javascript:void(0)">Privacy Policy</a></li>
		      </ul>
		    </div>
			</div>
		</footer><!-- #colophon -->
	
	<?php wp_footer(); ?>
</body>

</html>

