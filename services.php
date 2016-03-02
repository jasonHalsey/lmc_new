<?php
/*
Template Name: services
*/
  get_header('interior');
?>

<div id="primary" class="">
    <div id="content" class=" " role="main">
    <section id="service_nav">

        <ul id="top_nav" class="single-page-nav">
            <?php
                $post_nav = array( 'post_type' => 'service','orderby' => 'menu_order');
                $nav_loop = new WP_Query( $post_nav );
            ?>  

            <?php while ( $nav_loop->have_posts() ) : $nav_loop->the_post();?>
                <li><a href="#<?php echo get_post_meta( $post->ID, '_cmb2_service_slug', true ); ?>"><?php the_title(); ?></a></li>
            <?php endwhile; ?>
        </ul>
    </section>

    <?php
    $mypost = array( 'post_type' => 'service','orderby' => 'menu_order');
    $loop = new WP_Query( $mypost );
    ?>
    <?php while ( $loop->have_posts() ) : $loop->the_post();?>
        <section id="<?php echo get_post_meta( $post->ID, '_cmb2_service_slug', true ); ?>" class="module_brand content_brand">

        <div class="container abbot_top ">
            <div class="brand-content-wrapper">
                <div class="brand-content">
                    <h1><?php the_title(); ?></h1>
                    <?php echo get_post_meta( $post->ID, '_cmb2_service_description', true ); ?>
                    </div>
                </div>
            </div>
        </section>

    <?php 
		foreach(get_images_src('large','false') as $k => $i){
			echo '<section class="module parallax_brand" style="background-image:url('.$i[0].');">';
			}
	?>
        <div class="empty_container">
          
        </div>
      </section>

    <?php endwhile; ?>
    </div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>