<?php
/**
 * Single Post Template: [Team Member]
 *
 * @package WordPress
 * @subpackage lmc
 * @since lmc 1.0
 */

get_header('interior'); ?>

<div class="single-contain Site-content">
<?php while ( have_posts() ) : the_post(); ?>
	<?php if ( is_single() ) : ?>

	 	<article id="post-<?php the_ID(); ?>"  class="individual-team-container">

	 		<div class="individual-team-image">
	 			<img src="<?php echo get_post_meta( $post->ID, '_cmb2_team_image', true ); ?>" >
	 		</div>
		    <h2><?php echo the_title(); ?></h2>
		    <h4><?php echo get_post_meta( $post->ID, '_cmb2_team_title', true ); ?></h4>
		    <p><?php echo get_post_meta( $post->ID, '_cmb2_team_wysiwyg', true ); ?></p>
		    <p style="float:left;">Years in the industry: <div class="startYear"><?php echo get_post_meta( $post->ID, '_cmb2_team_start_year', true ); ?></div>&nbsp;<span class="startYears"></span>
		    </p>
		    <p>Years at LMC: <?php echo get_post_meta( $post->ID, '_cmb2_team_lmc_year', true ); ?></p>
				<h4>Hobbies: </h4><p><?php echo get_post_meta( $post->ID, '_cmb2_team_hobbies', true ); ?></p>
		</article>

	<?php endif; // is_single() ?>

<?php endwhile; ?>

</div> <!-- End single-contain -->
<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>