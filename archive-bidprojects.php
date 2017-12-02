<?php
/*
Template Name: Bid Projects
*/

  get_header('interior');
?>
<section class="dark-stripe">
    <h2>Join Our List Of Highly Qualified Subcontractors</h2>
    <div id="primary">
        <div id="content" role="main" class="all_projects">
        	<?php the_content() ?>
        	<div id="request-form-instructions">
        		<p>Thank you for your interest in LMC Construction. In order to develop a more complete knowledge of your Company and better match future Company opportunities to your Company’s capabilities please complete this form </p>

        		<p>LMC Construction uses BuildingConnected to manage and distribute all of our bid opprotunities. To learn more about BuildingConnected, you can visit their site <a href="https://www.buildingconnected.com/">here.</a></p>
        		
        		<p><a href="https://www.buildingconnected.com/"><img src="<?php echo bloginfo('url'); ?>/wp-content/themes/lmc_new/images/buildingconnected_logo.png" /></a></p>
        	</div>
        	<div id="request-form-contain">
        		<?php echo do_shortcode("[contact-form-7 id='7879' title='Bid List Request']"); ?>
        	</div>         
        </div><!-- end #content -->
    </div><!-- end #primary -->
</section>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>