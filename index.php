<?php
/**
 * @package WordPress
 * @subpackage lmc
 */

  // get_header('interior');
	get_header();
?>


  <section id="trans-bars">

    <!--#########################################################################################################-->

    <div class="logo-cta">
      <div class="tag">       
        <span>
          We’re<br />Involved<br /> at <span>LMC Construction.</span>
        </span>
      </div>
    </div>

    <!--#########################################################################################################-->
    <div id="holder">
    	<?php echo do_shortcode("[rev_slider alias='lmc_home']"); ?>
    </div>
 
  </section>
<section class="light-stripe">
	<div class="home_content_top">
		<div class="home_content_top-title">
			<h2>Always Building</h2>
		</div>
		<div class="home_content_top-text">
			<p>At LMC Construction, we’re always building. We start well before we begin construction, front-loading each project with collaboration, clear communication and a can-do frame of mind. Some might say that’s a lot of “Cs.” Our clients find it’s a blueprint for success.</p>

		    <p>Based in Tualatin, Oregon, we’ve been told we’re a little different than other general contractors and construction management companies in the area. We like that.</p>
		</div>
	</div>
</section>

<section class="dark-stripe">


	<h2>
	  Featured Projects
	</h2>

	<div id="project-container_home">
		<?php  
			$args = array(
		        'post_type'      => 'portfolio',
		        'meta_key'       => '_cmb2_portfolio_checkbox',
		        'meta_value'	 => 'on',
		        'order'          => 'ASC',
		        'posts_per_page' => 3,
		    );
		?>

		<?php $the_query = new WP_Query( $args ); ?>
		<?php if ( $the_query->have_posts() ) : ?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' ); ?>
			<div class="single-project">
				<div class="hover-tile-outer"  style="background-image: url(<?php echo $src[0]; ?> ) !important; background-size: cover!important; background-position: 0 50%;">
				  <div class="hover-tile-container">
				    <div class="hover-tile hover-tile-visible">
				      <span><?php the_title(); ?></span>
				    </div>
				    <div class="hover-tile hover-tile-hidden">
				      <h4><?php the_title(); ?></h4>
				      <a href="<?php the_permalink() ?>" ></a>
				      <p><?php echo get_post_meta( $post->ID, '_cmb2_portfolio_excerpt', true ); ?>&nbsp;<span>Read More >></span></p>
				    </div>
				  </div>
				</div>
			</div><!-- End single-project -->
		    <?php endwhile; ?>
		 <?php endif ?>

	</div><!-- End projet-container -->
</section> <!-- End dark-stripe -->
<section class="light-stripe">
	<div class="home_content">
		<div class="home_content-text">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php echo the_content(); ?>
			<?php endwhile; ?>
		</div><!-- End home_content-text -->
		<div class="home_content-side">
			<img src="<?php echo bloginfo('url'); ?>/wp-content/themes/lmc_new/images/GHBotY2013-LowIncomeBuilder.png" />
		</div>
	</div>
</section><!-- End light-stripe -->


<?php get_footer(); ?>
