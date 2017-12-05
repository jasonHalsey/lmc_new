<?php
/*
Template Name: Portfolio Archive
*/

 get_header('interior'); ?>
<section class="dark-stripe">
    <h2 class="port_header">
      Featured Projects
    </h2>

    <div id="project-container">
        <?php  
            $args = array(
                'post_type'      => 'portfolio',
                'order'          => 'ASC',
            );
        ?>

        <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Top Sidebar')) : ?><?php endif; ?> 

  
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
                      <p><?php the_field('portfolio_excerpt'); ?><span>Read More >></span></p>
                    </div>
                  </div>
                </div>
            </div><!-- End single-project -->
            <?php endwhile; ?>
         <?php endif ?>

    </div><!-- End projet-container -->
</section> <!-- End dark-stripe -->

<?php wp_reset_query(); ?>

<section class="dark-stripe">
  <h2>Project Collection</h2>
  <article class="col_list">
    <?php while ( have_posts() ) : the_post(); ?>
      <?php echo the_content(); ?>
    <?php endwhile; ?>
  </article>
</section>
<?php get_footer(); ?>