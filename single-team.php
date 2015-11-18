<?php
/**
 * Single Post Template: [Team Member]
 *
 * @package WordPress
 * @subpackage lmc
 * @since lmc 1.0
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	<?php if ( is_single() ) : ?>

	 	<article id="post-<?php the_ID(); ?>"  class="individual-team-container">

	 		<div class="individual-team-image">
	 			<img src="<?php echo get_post_meta( $post->ID, '_cmb2_team_image', true ); ?>" >
	 		</div>
		    <h2><?php echo the_title(); ?></h2>
		    <h4><?php echo get_post_meta( $post->ID, '_cmb2_team_title', true ); ?></h4>

			<p><?php echo get_post_meta( $post->ID, '_cmb2_team_wysiwyg', true ); ?></p>
		</article>

	<?php endif; // is_single() ?>

<?php endwhile; ?>


<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>