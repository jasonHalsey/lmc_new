<?php
/**
 * Single Post Template: [Portfolio Project]
 *
 * @package WordPress
 * @subpackage lmc
 * @since lmc 1.0
 */

get_header(); ?>



<?php while ( have_posts() ) : the_post(); ?>
	<?php if ( is_single() ) : ?>

	 	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		    <h2><?php echo the_title(); ?></h2>
		    <p><?php echo get_post_meta( $post->ID, '_cmb2_portfolio_description', true ); ?></p>


		    <?php echo get_post_meta( $post->ID, '_cmb2_portfolio_checkbox', true ); ?>
		    
		    <div class="portfolio-bg">
		    	<?php
		    		foreach(get_images_src('large','false') as $k => $i){
					echo '<img src="'.$i[0].'" width="'.$i[1].'" height="'.$i[2].'" />';
					}



				?>

			</div>
			

		</article>

	<?php endif; // is_single() ?>

<?php endwhile; ?>





<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>