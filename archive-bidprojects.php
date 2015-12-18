<?php
/*
Template Name: Bid Projects
*/

  get_header('interior');
?>

<div id="primary">
    <div id="content" role="main" class="all_projects">
        <h1>Projects For Bid</h1>
        <?php
            $bidgroup = array( 'post_type' => 'bidproject', );
            $bidgrouploop = new WP_Query( $bidgroup );
        ?>
        <?php while ( $bidgrouploop->have_posts() ) : $bidgrouploop->the_post();?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('project_container'); ?>>
                <div class="date-block">
                    <h3>Due</h3>
                    <h3><?php
                        // Get unix date
                        $some_date = get_post_meta( $post->ID, '_cmb2_project_datetime_timestamp', true );
                        // Convert unix date
                        $some_date = date( 'm/d', $some_date );
                        // Print converted date
                        echo $some_date;
                    ?></h3>
                </div>
                <div class="project_information">
        	    	<h2><a href="<?php the_permalink() ?>" ><?php the_title(); ?> </a></h2>
                    <h4>
                        <?php echo get_post_meta( $post->ID, '_cmb2_project_address', true ); ?><br />
                        <?php echo get_post_meta( $post->ID, '_cmb2_project_city', true ); ?>, <?php echo get_post_meta( $post->ID, '_cmb2_project_state', true ); ?> <?php echo get_post_meta( $post->ID, '_cmb2_project_zip', true );
                        ?>
                    </h4>
                </div><!-- end  project_information -->
      		</article>
        <?php endwhile; ?>
    </div><!-- end #content -->
</div><!-- end #primary -->
<?php wp_reset_query(); ?>
<?php get_footer(); ?>