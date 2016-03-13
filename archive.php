<?php
/*
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
*/

 get_header('interior'); ?>
<section class="dark-stripe">
    <h2 class="port_header">
      <?php
        if (is_category( )) {
          $cat = get_query_var('cat');
          $yourcat = get_category ($cat);
          echo $yourcat->slug . ' Projects';
         }
      ?>
    </h2>

    <div id="project-container">
  
      <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Top Sidebar')) : ?>
 
      <?php endif; ?>

        <?php 
          $args_r = array(
                'post_type'      => 'portfolio',
                'order'          => 'ASC',
                'posts_per_page' => 10,
            );
        ?>
          <?php $the_query_r = new WP_Query( $args_r ); ?>
          <?php if ( $the_query_r->have_posts() ) : ?>
            <?php
              // Start the Loop.
            while ( have_posts() ) : the_post(); ?>

            <?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 5600,1000 ), false, '' ); ?>
            <div class="single-project">
                <div class="hover-tile-outer"  style="background-image: url(<?php echo $src[0]; ?> ) !important; background-size: cover!important; background-position: 0 50%;">
                  <div class="hover-tile-container">
                    <div class="hover-tile hover-tile-visible">
                      <span><?php the_title(); ?> </span>
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

<?php wp_reset_query(); ?>

<?php get_footer(); ?>