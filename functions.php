<?php

add_theme_support('post-thumbnails');

add_action( 'init', 'my_custom_menus' );
  function my_custom_menus() {
     register_nav_menus(
        array(
  		'primary-menu' => __( 'Primary Menu' ),
  		'secondary-menu' => __( 'Secondary Menu' )
                )
         );
  }
/*  Add Custom Top Sidebar 
  /* ------------------------------------ */ 
  if (function_exists('register_sidebar')) {

  register_sidebar(array(
    'name'=> 'Top Sidebar',
    'id' => 'top_sidebar',
    'before_widget' => '<div id="filter_block" >',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => ':</h3>',
  ));
}


/*  Breadcrumbs
/* ------------------------------------ */

function custom_breadcrumbs() {
       
    // Settings
    $separator          = '&gt;';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'Home';
      
    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';
       
    // Get the query & post information
    global $post,$wp_query;
       
    // Do not display on the homepage
    if ( !is_front_page() ) {
       
        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';
           
        // Home page
        echo '<li class="item-home"><a class="bread-link bread-home" href="' . get_home_url() . '" title="' . $home_title . '">' . $home_title . '</a></li>';
        echo '<li class="separator separator-home"> ' . $separator . ' </li>';
           
        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {
              
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . post_type_archive_title($prefix, false) . '</strong></li>';
              
        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            $custom_tax_name = get_queried_object()->name;
            echo '<li class="item-current item-archive"><strong class="bread-current bread-archive">' . $custom_tax_name . '</strong></li>';
              
        } else if ( is_single() ) {
              
            // If post is a custom post type
            $post_type = get_post_type();
              
            // If it is a custom post type display name and link
            if($post_type != 'post') {
                  
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              
                echo '<li class="item-cat item-custom-post-type-' . $post_type . '"><a class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '">' . $post_type_object->labels->name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
              
            }
              
            // Get post category info
            $category = get_the_category();
             
            if(!empty($category)) {
              
                // Get last category post is in
                $last_category = end(array_values($category));
                  
                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, true, ','),',');
                $cat_parents = explode(',',$get_cat_parents);
                  
                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {
                    $cat_display .= '<li class="item-cat">'.$parents.'</li>';
                    $cat_display .= '<li class="separator"> ' . $separator . ' </li>';
                }
             
            }
              
            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {
                   
                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;
               

            }
              
            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {
                  
                echo '<li class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '">' . $cat_name . '</a></li>';
                echo '<li class="separator"> ' . $separator . ' </li>';
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
              
            } else {
                  
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></li>';
                  
            }
              
        } else if ( is_category() ) {
               
            // Category page
            echo '<li class="item-current item-cat"><strong class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></li>';
               
        } else if ( is_page() ) {
               
            // Standard page
            if( $post->post_parent ){
                   
                // If child page, get parents 
                $anc = get_post_ancestors( $post->ID );
                   
                // Get parents in the right order
                $anc = array_reverse($anc);
                   
                // Parent page loop
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li class="item-parent item-parent-' . $ancestor . '"><a class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '">' . get_the_title($ancestor) . '</a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }
                   
                // Display parent pages
                echo $parents;
                   
                // Current page
                echo '<li class="item-current item-' . $post->ID . '"><strong title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';
                   
            } else {
                   
                // Just display current page if not parents
                echo '<li class="item-current item-' . $post->ID . '"><strong class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></li>';
                   
            }
               
        } else if ( is_tag() ) {
               
            // Tag page
               
            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;
               
            // Display the tag name
            echo '<li class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><strong class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></li>';
           
        } elseif ( is_day() ) {
               
            // Day archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month link
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><a class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';
               
            // Day display
            echo '<li class="item-current item-' . get_the_time('j') . '"><strong class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_month() ) {
               
            // Month Archive
               
            // Year link
            echo '<li class="item-year item-year-' . get_the_time('Y') . '"><a class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';
               
            // Month display
            echo '<li class="item-month item-month-' . get_the_time('m') . '"><strong class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Archives</strong></li>';
               
        } else if ( is_year() ) {
               
            // Display year archive
            echo '<li class="item-current item-current-' . get_the_time('Y') . '"><strong class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Archives</strong></li>';
               
        } else if ( is_author() ) {
               
            // Auhor archive
               
            // Get the author information
            global $author;
            $userdata = get_userdata( $author );
               
            // Display author name
            echo '<li class="item-current item-current-' . $userdata->user_nicename . '"><strong class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';
           
        } else if ( get_query_var('paged') ) {
               
            // Paginated archives
            echo '<li class="item-current item-current-' . get_query_var('paged') . '"><strong class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';
               
        } else if ( is_search() ) {
           
            // Search results page
            echo '<li class="item-current item-current-' . get_search_query() . '"><strong class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';
           
        } elseif ( is_404() ) {
               
            // 404 page
            echo '<li>' . 'Error 404' . '</li>';
        }
       
        echo '</ul>';
           
    }
       
}

/*  Add Portfolio to Categories filter results
/* ------------------------------------ */
function namespace_add_custom_types( $query ) {
  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
     'post', 'nav_menu_item', 'portfolio'
		));
	  return $query;
	}
}
add_filter( 'pre_get_posts', 'namespace_add_custom_types' );


/*  Remove Admin Bar
/* ------------------------------------ */ 
add_filter('show_admin_bar', '__return_false');

/*  Add Support For Thumbnails on Portfolio Projects
/* ------------------------------------ */ 
add_theme_support( 'post-thumbnails', array( 'portfolio' ) );   

/*  Enqueue css
/* ------------------------------------ */ 
function lmc_styles() 
{
    wp_enqueue_style( 'style', get_stylesheet_uri() );
}

add_action( 'wp_enqueue_scripts', 'lmc_styles' ); 

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}


function lmc_enqueue_stuff() {
  if ( is_page( 'contact' ) ) {
    wp_register_script('mapbox_lmc', get_template_directory_uri() . '/js/mapbox_lmc.js');
		wp_enqueue_script('mapbox_lmc');
		wp_register_script('scripts', get_template_directory_uri() . '/js/cust_scripts.js');
	  wp_register_script('cycle', 'http://malsup.github.com/jquery.cycle2.js');
	  wp_enqueue_script('cycle');
	  wp_enqueue_script('scripts');
	} elseif ( is_page( 'services' ) ){
		wp_register_script('modernizr', 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js');
    wp_register_script('scripts', get_template_directory_uri() . '/js/cust_scripts.js');
    wp_register_script('singlePageNav', get_template_directory_uri() . '/js/jquery.singlePageNav.js');
    wp_register_script('spn', get_template_directory_uri() . '/js/spn.js');
	  wp_register_script('cycle', 'http://malsup.github.com/jquery.cycle2.js');
	  wp_enqueue_script('modernizr');
	  wp_enqueue_script('cycle');
	  wp_enqueue_script('singlePageNav');
	  wp_enqueue_script('spn');
	  wp_enqueue_script('scripts');
  } else {
    wp_register_script('modernizr', 'https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js');
    wp_register_script('scripts', get_template_directory_uri() . '/js/cust_scripts.js');
	  wp_register_script('cycle', 'http://malsup.github.com/jquery.cycle2.js');
	  wp_enqueue_script('modernizr');
	  wp_enqueue_script('cycle');
	  wp_enqueue_script('scripts');
  }
}
add_action( 'wp_footer', 'lmc_enqueue_stuff' );


/* ################# Custom Post Types #################  */

// ----------------- Creates Team Post Type
add_action('init', 'post_type_team');
function post_type_team() 
{
  $labels = array(
    'name' => _x('Team', 'post type general name'),
    'singular_name' => _x('Team Member', 'post type singular name'),
    'add_new' => _x('Add New Team Member', 'team'),
    'add_new_item' => __('Add New Team Member')
  );
 
 $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'team' ),
    'capability_type' => 'post',
    'hierarchical' => true,
    'menu_position' => null,
    'supports' => array('title')
    ); 
  register_post_type('team',$args);
  flush_rewrite_rules();
};   

// // ----------------- Creates Bid Project Post Type
// add_action('init', 'post_type_bidproject');
// function post_type_bidproject() 
// {
//   $labels = array(
//     'name' => _x('Bid Projects', 'post type general name'),
//     'singular_name' => _x('Bid Project', 'post type singular name'),
//     'add_new' => _x('Add New Bid Project', 'bidproject'),
//     'add_new_item' => __('Add New Bid Project')
//   );
 
//  $args = array(
//     'labels' => $labels,
//     'public' => true,
//     'publicly_queryable' => true,
//     'show_ui' => true, 
//     'query_var' => true,
//     'rewrite' => array( 'slug' => 'bidproject' ),
//     'capability_type' => 'post',
//     'hierarchical' => true,
//     'menu_position' => null,
//     'supports' => array('title')
//     ); 
//   register_post_type('bidproject',$args);
//   flush_rewrite_rules();
// };   

// ----------------- Creates Portfolio Post Type
add_action('init', 'post_type_portfolio');
function post_type_portfolio() 
{
  $labels = array(
    'name' => _x('Portfolio', 'post type general name'),
    'singular_name' => _x('Portfolio', 'post type singular name'),
    'add_new' => _x('Add New Portfolio Project', 'portfolio'),
    'add_new_item' => __('Add New Portfolio Project')
  );
 
 $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'query_var' => true,
    'taxonomies' => array('category'), 
    'rewrite' => array( 'slug' => 'portfolio' ),
    'capability_type' => 'post',
    'hierarchical' => true,
    'menu_position' => null,	
    'supports' => array('title','thumbnail')
    ); 
  register_post_type('portfolio',$args);
  flush_rewrite_rules();
};  

// ----------------- Creates Services Post Type
add_action('init', 'post_type_services');
function post_type_services() 
{
  $labels = array(
    'name' => _x('LMC Services', 'post type general name'),
    'singular_name' => _x('Service', 'post type singular name'),
    'add_new' => _x('Add New Service', 'service'),
    'add_new_item' => __('Add New Service')
  );
 
 $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'service' ),
    'capability_type' => 'post',
    'hierarchical' => true,
    'menu_position' => null,	
    'supports' => array('title','thumbnail')
    ); 
  register_post_type('service',$args);
  flush_rewrite_rules();
};  

/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB directory)
 *
 * @category LMC
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */

/**
 * Get the bootstrap!
 */
require_once 'cmb/init.php';

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function cmb2_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

add_filter( 'cmb2_meta_boxes', 'cmb2_lmc_metaboxes' );
/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb2_lmc_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb2_';

	/**
	 * Team Member Metabox Layout
	 */
	$meta_boxes['team_metabox'] = array(
		'id'            => 'team_metabox',
		'title'         => __( 'LMC Team Member', 'cmb2' ),
		'object_types'  => array( 'team' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'        => array(
			
			array(
				'name' => __( 'Team Member Title', 'cmb2' ),
				'desc' => __( ' ', 'cmb2' ),
				'id'   => $prefix . 'team_title',
				'type' => 'text_medium',
				// 'repeatable' => true,
			),
			array(
				'name' => __( 'Team Member Email', 'cmb2' ),
				'desc' => __( ' ', 'cmb2' ),
				'id'   => $prefix . 'team_email',
				'type' => 'text_email',
				// 'repeatable' => true,
			),
			
			array(
				'name'    => __( 'Team Member Bio', 'cmb2' ),
				'id'      => $prefix . 'team_wysiwyg',
				'type'    => 'wysiwyg',
				'options' => array( 'textarea_rows' => 5, ),
			),
			array(
				'name' => __( 'Team Member Hobbies', 'cmb2' ),
				'desc' => __( ' ', 'cmb2' ),
				'id'   => $prefix . 'team_hobbies',
				'type' => 'text_medium',
				// 'repeatable' => true,
			),
            array(
                'name' => __( 'LMC Start Year', 'cmb2' ),
                'desc' => __( ' ', 'cmb2' ),
                'id'   => $prefix . 'team_lmc_year',
                'type' => 'text_medium',
            ),
            array(
                'name' => __( 'Industry Start Year', 'cmb2' ),
                'desc' => __( ' ', 'cmb2' ),
                'id'   => $prefix . 'team_start_year',
                'type' => 'text_medium',
            ),
			array(
				'name' => __( 'Profile Image', 'cmb2' ),
				'desc' => __( 'Upload an image or enter a URL.', 'cmb2' ),
				'id'   => $prefix . 'team_image',
				'type' => 'file',
			),
		),
	);

	
	// /**
	//  * Bid Projects Metabox Layout
	//  */
	// $meta_boxes['bidproject_metabox'] = array(
	// 	'id'            => 'bidproject_metabox',
	// 	'title'         => __( 'Project For Bid Room', 'cmb2' ),
	// 	'object_types'  => array( 'bidproject' ), // Post type
	// 	'context'       => 'normal',
	// 	'priority'      => 'high',
	// 	'show_names'    => true, // Show field names on the left
	// 	// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
	// 	'fields'        => array(
			
	// 		array(
	// 			'name' => __( 'Street Address', 'cmb2' ),
	// 			'desc' => __( ' ', 'cmb2' ),
	// 			'id'   => $prefix . 'project_address',
	// 			'type' => 'text',
	// 			// 'repeatable' => true,
	// 		),
	// 		array(
	// 			'name' => __( 'City', 'cmb2' ),
	// 			'desc' => __( ' ', 'cmb2' ),
	// 			'id'   => $prefix . 'project_city',
	// 			'type' => 'text_small',
	// 			// 'repeatable' => true,
	// 		),
	// 		array(
	// 			'name' => __( 'State', 'cmb2' ),
	// 			'desc' => __( ' ', 'cmb2' ),
	// 			'id'   => $prefix . 'project_state',
	// 			'type' => 'text_small',
	// 			// 'repeatable' => true,
	// 		),
	// 		array(
	// 			'name' => __( 'ZIP', 'cmb2' ),
	// 			'desc' => __( ' ', 'cmb2' ),
	// 			'id'   => $prefix . 'project_zip',
	// 			'type' => 'text_small',
	// 			// 'repeatable' => true,
	// 		),
	// 		array(
	// 			'name' => __( 'Project  Contact', 'cmb2' ),
	// 			'desc' => __( ' ', 'cmb2' ),
	// 			'id'   => $prefix . 'project_contact',
	// 			'type' => 'text_medium',
	// 		),
	// 		array(
	// 			'name' => __( 'Bid Due', 'cmb2' ),
	// 			'desc' => __( ' ', 'cmb2' ),
	// 			'id'   => $prefix . 'project_datetime_timestamp',
	// 			'type' => 'text_datetime_timestamp',
	// 		),
	// 		array(
	// 			'name' => __( 'Summary Of Work', 'cmb2' ),
	// 			'desc' => __( ' ', 'cmb2' ),
	// 			'id'   => $prefix . 'project_work_summary',
	// 			'type' => 'wysiwyg',
	// 		),
	// 		array(
	// 			'name' => __( 'Plan Centers', 'cmb2' ),
	// 			'desc' => __( ' ', 'cmb2' ),
	// 			'id'   => $prefix . 'project_plan_centers',
	// 			'type' => 'wysiwyg',
	// 		),
	// 		array(
	// 			'name' => __( 'dropBox File', 'cmb2' ),
	// 			'desc' => __( ' ', 'cmb2' ),
	// 			'id'   => $prefix . 'project_dropBox',
	// 			'type' => 'wysiwyg',
	// 		),
	// 	),
	// );

	/**
	 * Portfolio Metabox Layout
	 */
	// $meta_boxes['portfolio_metabox'] = array(
	// 	'id'            => 'portfolio_metabox',
	// 	'title'         => __( 'LMC Portfolio Project', 'cmb2' ),
	// 	'object_types'  => array( 'portfolio' ), // Post type
	// 	'context'       => 'normal',
	// 	'priority'      => 'high',
	// 	'show_names'    => true, // Show field names on the left
	// 	// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
	// 	'fields'        => array(
			
	// 		array(
	// 			'name' => __( 'Featured Project', 'cmb2' ),
	// 			'desc' => __( 'Only 3 Projects Be Displayed At One Time', 'cmb2' ),
	// 			'id'   => $prefix . 'portfolio_checkbox',
	// 			'type' => 'checkbox',
	// 		),
	// 		array(
	// 			'name' => __( 'Project Excerpt', 'cmb2' ),
	// 			'desc' => __( '100 Character Max', 'cmb2' ),
	// 			'id'   => $prefix . 'portfolio_excerpt',
	// 			'type' => 'wysiwyg',
	// 			// 'repeatable' => true,
	// 		),
	// 		array(
	// 			'name' => __( 'Full Project Description', 'cmb2' ),
	// 			'desc' => __( ' ', 'cmb2' ),
	// 			'id'   => $prefix . 'portfolio_description',
	// 			'type' => 'wysiwyg',
	// 			// 'repeatable' => true,
	// 		),



 //            array(
 //                'name' => 'Upload Project Images One At A Time',
 //                'desc' => '',
 //                'id'   => 'wiki_test_file_list',
 //                'type' => 'file_list',
 //                // 'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
 //                // 'query_args' => array( 'type' => 'image' ), // Only images attachment
 //                // Optional, override default text strings
 //                'text' => array(
 //                    'add_upload_files_text' => 'Replacement', // default: "Add or Upload Files"
 //                    'remove_image_text' => 'Replacement', // default: "Remove Image"
 //                    'file_text' => 'Replacement', // default: "File:"
 //                    'file_download_text' => 'Replacement', // default: "Download"
 //                    'remove_text' => 'Replacement', // default: "Remove"
 //                ),
 //            ),			
	// 	),
	// );	


	/**
	 * Services Metabox Layout
	 */
	$meta_boxes['services_metabox'] = array(
		'id'            => 'services_metabox',
		'title'         => __( 'LMC Services', 'cmb2' ),
		'object_types'  => array( 'service' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'        => array(
			
			array(
				'name' => __( 'LMC Service', 'cmb2' ),
				'desc' => __( ' ', 'cmb2' ),
				'id'   => $prefix . 'service_description',
				'type' => 'wysiwyg',
				// 'repeatable' => true,
			),
			array(
				'name' => __( 'Service Slug - (Single Word)', 'cmb2' ),
				'desc' => __( ' ', 'cmb2' ),
				'id'   => $prefix . 'service_slug',
				'type' => 'text_medium',
			),
			
		),
	);	

	return $meta_boxes;
}


// /**
//  * Sample template tag function for outputting a cmb2 file_list
//  *
//  * @param  string  $file_list_meta_key The field meta key. ('wiki_test_file_list')
//  * @param  string  $img_size           Size of image to show
//  */
// function cmb2_output_file_list( $file_list_meta_key, $img_size = 'medium' ) {

//     // Get the list of files
//     $files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );

//     // echo '<div class="file-list-wrap">';
//     // Loop through them and output an image
//     foreach ( (array) $files as $attachment_id => $attachment_url ) {
//         // echo '<div class="file-list-image">';
//         echo wp_get_attachment_image( $attachment_id, $img_size );
//         // echo '</div>';
//     }
//     // echo '</div>';
// }


// Image Uploader Plugin

    add_filter('images_cpt','my_image_cpt');
    function my_image_cpt(){
        $cpts = array('page','service');
        return $cpts;
    }

    add_filter('list_images','my_list_images',10,3);

function my_list_images($list_images, $cpt){
    global $typenow;
    if($typenow == "portfolio" || $cpt == "portfolio")
        $picts = array(
            'image1' => '_image1',
            'image2' => '_image2',
            'image3' => '_image3',
            'image4' => '_image4',
            'image5' => '_image5',
            'image6' => '_image6'
        );
    elseif ($typenow == 'service') 
    		$picts = array(
            'image1' => '_image1'
        );
    else
        $picts = array(
            'image1' => '_image1',
            'image2' => '_image2',
            'image3' => '_image3',
            'image4' => '_image4',
            'image5' => '_image5',
            'image6' => '_image6',
            'image7' => '_image7',
            'image8' => '_image8',
        );
    return $picts;
}




?>
