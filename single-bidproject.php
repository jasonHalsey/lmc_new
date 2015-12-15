<?php
/**
 * WP Post Template: Bid Room Single
 *
 * @package WordPress
 * @subpackage lmc
 * @since lmc 1.0
 */

get_header('interior'); ?>

<div class="single-contain Site-content">

<?php while ( have_posts() ) : the_post(); ?>

	<?php if ( is_single() ) : ?>

	 	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		    <h2><?php echo the_title(); ?></h2>


		    <h3>Address:</h3> <?php echo get_post_meta( $post->ID, '_cmb2_project_address', true ); ?><br />
		    <?php echo get_post_meta( $post->ID, '_cmb2_project_city', true ); ?>, <?php echo get_post_meta( $post->ID, '_cmb2_project_state', true ); ?> <?php echo get_post_meta( $post->ID, '_cmb2_project_zip', true ); ?>

			<h3>Bid Due</h3>



			<?php

				// Get unix date
				$some_date = get_post_meta( $post->ID, '_cmb2_project_datetime_timestamp', true );

				// Convert unix date
				$some_date = date( 'm/d/Y', $some_date );

				// Print converted date
				echo $some_date;

			?>

			<h3>Plans</h3>
				<?php $dropFolder = get_post_meta( $post->ID, '_cmb2_project_dropBox', true );
				echo do_shortcode("$dropFolder"); ?>
			
			<div id="maps">
		    	<?php

					if ( function_exists( 'pronamic_google_maps' ) ) {
					    pronamic_google_maps( array(
					        'width'  => 1200,
					        'height' => 300
					    ) );
					}

				?>
			</div>
			

		</article>

	<?php endif; // is_single() ?>

<?php endwhile; ?>
</div> <!-- End single-contain -->

<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>