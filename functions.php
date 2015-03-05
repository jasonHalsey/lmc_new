<?php

function register_my_menu() {
  register_nav_menu('primary',__( 'primary' ));
}
add_action( 'init', 'register_my_menu' );

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
   wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}


function wpb_adding_scripts() {
  wp_register_script('scripts', get_template_directory_uri() . '/js/scripts.js');
  wp_register_script('cycle', get_template_directory_uri() . '/js/cycle.js');
  wp_register_script( 'maximage', get_template_directory_uri() . '/js/maximage.js', true );
  wp_enqueue_script('cycle');
  wp_enqueue_script('maximage');
  wp_enqueue_script('scripts');
}
add_action( 'wp_footer', 'wpb_adding_scripts' );  



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

// ----------------- Creates Bid Project Post Type
add_action('init', 'post_type_bidproject');
function post_type_bidproject() 
{
  $labels = array(
    'name' => _x('Bid Projects', 'post type general name'),
    'singular_name' => _x('Bid Project', 'post type singular name'),
    'add_new' => _x('Add New Bid Project', 'bidproject'),
    'add_new_item' => __('Add New Bid Project')
  );
 
 $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => array( 'slug' => 'bidproject' ),
    'capability_type' => 'post',
    'hierarchical' => true,
    'menu_position' => null,
    'supports' => array('title')
    ); 
  register_post_type('bidproject',$args);
  flush_rewrite_rules();
};   

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
    'rewrite' => array( 'slug' => 'portfolio' ),
    'capability_type' => 'post',
    'hierarchical' => true,
    'menu_position' => null,	
    'supports' => array('title','thumbnail')
    ); 
  register_post_type('portfolio',$args);
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
				'name' => __( 'Profile Image', 'cmb2' ),
				'desc' => __( 'Upload an image or enter a URL.', 'cmb2' ),
				'id'   => $prefix . 'team_image',
				'type' => 'file',
			),
		),
	);

	
	/**
	 * Bid Projects Metabox Layout
	 */
	$meta_boxes['bidproject_metabox'] = array(
		'id'            => 'bidproject_metabox',
		'title'         => __( 'Project For Bid Room', 'cmb2' ),
		'object_types'  => array( 'bidproject' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'        => array(
			
			array(
				'name' => __( 'Street Address', 'cmb2' ),
				'desc' => __( ' ', 'cmb2' ),
				'id'   => $prefix . 'project_address',
				'type' => 'text',
				// 'repeatable' => true,
			),
			array(
				'name' => __( 'City', 'cmb2' ),
				'desc' => __( ' ', 'cmb2' ),
				'id'   => $prefix . 'project_city',
				'type' => 'text_small',
				// 'repeatable' => true,
			),
			array(
				'name' => __( 'State', 'cmb2' ),
				'desc' => __( ' ', 'cmb2' ),
				'id'   => $prefix . 'project_state',
				'type' => 'text_small',
				// 'repeatable' => true,
			),
			array(
				'name' => __( 'ZIP', 'cmb2' ),
				'desc' => __( ' ', 'cmb2' ),
				'id'   => $prefix . 'project_zip',
				'type' => 'text_small',
				// 'repeatable' => true,
			),
			array(
				'name' => __( 'Project  Contact', 'cmb2' ),
				'desc' => __( ' ', 'cmb2' ),
				'id'   => $prefix . 'project_contact',
				'type' => 'text_medium',
			),
			array(
				'name' => __( 'Bid Due', 'cmb2' ),
				'desc' => __( ' ', 'cmb2' ),
				'id'   => $prefix . 'project_datetime_timestamp',
				'type' => 'text_datetime_timestamp',
			),
			array(
				'name' => __( 'Summary Of Work', 'cmb2' ),
				'desc' => __( ' ', 'cmb2' ),
				'id'   => $prefix . 'project_work_summary',
				'type' => 'wysiwyg',
			),
			array(
				'name' => __( 'Plan Centers', 'cmb2' ),
				'desc' => __( ' ', 'cmb2' ),
				'id'   => $prefix . 'project_plan_centers',
				'type' => 'wysiwyg',
			),
			array(
				'name' => __( 'dropBox File', 'cmb2' ),
				'desc' => __( ' ', 'cmb2' ),
				'id'   => $prefix . 'project_dropBox',
				'type' => 'wysiwyg',
			),
		),
	);

	/**
	 * Portfolio Metabox Layout
	 */
	$meta_boxes['portfolio_metabox'] = array(
		'id'            => 'portfolio_metabox',
		'title'         => __( 'LMC Portfolio Project', 'cmb2' ),
		'object_types'  => array( 'portfolio' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
		// 'cmb_styles' => true, // Enqueue the CMB stylesheet on the frontend
		'fields'        => array(
			
			array(
				'name' => __( 'Featured Project', 'cmb2' ),
				'desc' => __( 'Only 3 Projects Be Displayed At One Time', 'cmb2' ),
				'id'   => $prefix . 'portfolio_checkbox',
				'type' => 'checkbox',
			),
			array(
				'name' => __( 'Project Excerpt', 'cmb2' ),
				'desc' => __( '100 Character Max', 'cmb2' ),
				'id'   => $prefix . 'portfolio_excerpt',
				'type' => 'wysiwyg',
				// 'repeatable' => true,
			),
			array(
				'name' => __( 'Full Project Description', 'cmb2' ),
				'desc' => __( ' ', 'cmb2' ),
				'id'   => $prefix . 'portfolio_description',
				'type' => 'wysiwyg',
				// 'repeatable' => true,
			),
			
		),
	);	

	return $meta_boxes;
}

// Image Uploader Plugin

    add_filter('images_cpt','my_image_cpt');
    function my_image_cpt(){
        $cpts = array('page','portfolio');
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
