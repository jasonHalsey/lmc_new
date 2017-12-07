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
				    	<?php 

							$images = get_field('portfolio_images');

							if( $images ): ?>
							        <?php foreach( $images as $image ): ?>
							                
							            <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
							             
							        <?php endforeach; ?>
						<?php endif; ?>
						<div class="cycle-pager"></div>
					</div>
					<section class="project_container">
						<div class="project_title_block"><h2><?php echo the_title(); ?></h2></div>
						<div class="project_content_block">
							<?php the_field('portfolio_description'); ?>
						</div>
					</section>
					
				</div>

			</article>

		<?php endif; // is_single() ?>

	<?php endwhile; ?>

</section> <!-- End single-contain -->


<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>