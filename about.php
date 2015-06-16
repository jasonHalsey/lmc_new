<?php
/*
Template Name: About Page
*/

get_header(); ?>
<h2>This is the About Template</h2>
<div id="primary">
    <div id="content" role="main">
    <?php
    $portgroup = array( 'post_type' => 'portfolio', );
    $portgrouploop = new WP_Query( $portgroup );
    ?>
    <?php while ( $portgrouploop->have_posts() ) : $portgrouploop->the_post();?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	    	<h2><a href="<?php the_permalink() ?>" ><?php the_title(); ?> </a></h2>
  		</article>
    <?php endwhile; ?>
    </div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>