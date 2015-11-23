<?php
/*
Template Name: full-team
*/
  get_header('interior');
?>
<div id="primary" class="">
    <div id="content" class="individual-container " role="main">
    <?php
    $mypost = array( 'post_type' => 'team','orderby' => 'menu_order');
    $loop = new WP_Query( $mypost );
    ?>
    <?php while ( $loop->have_posts() ) : $loop->the_post();?>
        <article id="post-<?php the_ID(); ?>" class="individual-member" <?php post_class(); ?>>

	    	<a href="<?php the_permalink() ?>" >
                <div class="overlay"></div>
                <img src="<?php echo get_post_meta( $post->ID, '_cmb2_team_image', true ); ?>" >
                <div class="individual-information">
                    <h3><?php the_title(); ?></h3>
                    <h4><?php echo get_post_meta( $post->ID, '_cmb2_team_title', true ); ?></h4>    
                </div>
            </a>
  		</article>
    <?php endwhile; ?>
    </div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>