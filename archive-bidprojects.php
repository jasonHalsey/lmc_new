<?php
/*
Template Name: Bid Projects
*/

get_header(); ?>
<h2>This is the archive-bidprojects</h2>
<div id="primary">
    <div id="content" role="main">
    <?php
    $bidgroup = array( 'post_type' => 'bidproject', );
    $bidgrouploop = new WP_Query( $bidgroup );
    ?>
    <?php while ( $bidgrouploop->have_posts() ) : $bidgrouploop->the_post();?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	    	<h2><a href="<?php the_permalink() ?>" ><?php the_title(); ?> </a></h2>
  		</article>
    <?php endwhile; ?>
    </div>
</div>
<?php wp_reset_query(); ?>
<?php get_footer(); ?>