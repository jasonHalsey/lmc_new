<?php
/**
 * Single Post Template: [Portfolio Project]
 *
 * @package WordPress
 * @subpackage lmc
 * @since lmc 1.0
 */

 get_header('interior'); ?>

<section class="dark-stripe">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php if ( is_single() ) : ?>

		 	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			    <h2><?php echo the_title(); ?></h2>
			    <div class="single-contain">			    
				    <div class="portfolio-bg">
				    	<?php cmb2_output_file_list( 'wiki_test_file_list', 'large' ); ?>
						<div class="cycle-pager"></div>
					</div>
					<p>
				    	<?php 
				    		echo wpautop(get_post_meta( $post->ID, '_cmb2_portfolio_description', true )); 
				    	?>
			    	</p>
				</div>

			</article>

		<?php endif; // is_single() ?>

	<?php endwhile; ?>

</section> <!-- End single-contain -->


<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>