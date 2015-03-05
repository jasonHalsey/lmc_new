<?php

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
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => true,
    'menu_position' => null,
    'supports' => array('title')
    ); 
  register_post_type('team',$args);
};

//Add Meta Box for Team Member Title

$meta_box_teamtitle = array(
  'id' => 'teamTitle',
  'title' => 'Title',
  'pages' => array('team'),
  'context' => 'normal',
  'priority' => 'high',
  'fields' => array(
    array(
      'name' => 'teamTitle',
      'id' => 'teamTitle',
      'type' => 'text',
      'std' => ''
    ),
  )
);

//Add Meta Box for Team Member Bio

$meta_box_teambio = array(
  'id' => 'teamBio',
  'title' => 'Team Member Bio',
  'pages' => array('team'),
  'context' => 'normal',
  'priority' => 'high',
  'fields' => array(
    array(
      'name' => 'teamBio',
      'id' => 'teamBio',
      'type' => 'textarea',
      'std' => ''
    ),
  )
);



add_action('admin_menu', 'teamtitle_add_box');
add_action('admin_menu', 'teambio_add_box');


// Add Team Member Title meta box

function teamtitle_add_box() {
   
    global $meta_box_teamtitle;

    foreach ($meta_box_teamtitle['pages'] as $page) {
        add_meta_box($meta_box_teamtitle['id'], $meta_box_teamtitle['title'], 'teamtitle_show_box', $page, $meta_box_teamtitle['context'], $meta_box_teamtitle['priority']);
    }
}


// Add Team Member Bio meta box

function teambio_add_box() {
   
    global $meta_box_teambio;

    foreach ($meta_box_teambio['pages'] as $page) {
        add_meta_box($meta_box_teambio['id'], $meta_box_teambio['title'], 'teambio_show_box', $page, $meta_box_teambio['context'], $meta_box_teambio['priority']);
    }
}



// Callback function to show fields in Team Member Title meta box
function teamtitle_show_box() {
  global $meta_box_teamtitle, $post;
  
   
  // Use nonce for verification
  echo '<input type="hidden" name="teamtitle_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
  echo '<table class="form-table">';
  foreach ($meta_box_teamtitle['fields'] as $field) {
    // get current post meta data
    $meta = get_post_meta($post->ID, $field['id'], true);
 
    echo '<tr>',
        '<td>';
    switch ($field['type']) {
 
 
 
 
//If Text   
      case 'text':
        echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : $field['std'], '" size="30" style="width:100%" />',
          '<br />', $field['desc'];
        break;
 
 
//If Text Area      
      case 'textarea':
        echo '<textarea class="theEditor" name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>',
          '<br />', $field['desc'];
        break;
 
 
//If Button 
 
        case 'button':
        echo '<input type="button" name="', $field['id'], '" id="', $field['id'], '"value="', $meta ? $meta : $field['std'], '" />';
        break;
    }
    echo  '<td>',
      '</tr>';
  }
 
  echo '</table>';
}
 
add_action('save_post', 'teamtitle_save_data');


// Callback function to show fields in Team Member Name meta box
function teambio_show_box() {
  global $meta_box_teambio, $post;
  
   
  // Use nonce for verification
  echo '<input type="hidden" name="teambio_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';
 
  echo '<table class="form-table">';
  foreach ($meta_box_teambio['fields'] as $field) {
    // get current post meta data
    $meta = get_post_meta($post->ID, $field['id'], true);
 
    echo '<tr>',
        '<td>';
    switch ($field['type']) {
 
 
//If Text Area      
      case 'textarea':
        echo '<textarea class="theEditor" name="', $field['id'], '" id="', $field['id'], '" cols="60" rows="4" style="width:97%">', $meta ? $meta : $field['std'], '</textarea>',
          '<br />', $field['desc'];
          break;


    }
    echo  '<td>',
      '</tr>';
  }
 
  echo '</table>';
}
 
add_action('save_post', 'teambio_save_data');




// Save data from Team Member Bio meta box
function teambio_save_data($post_id) {
  global $meta_box_teambio;
 
  // verify nonce
  if (!wp_verify_nonce($_POST['teambio_meta_box_nonce'], basename(__FILE__))) {
    return $post_id;
  }
 
  // check autosave
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return $post_id;
  }
 
  // check permissions
  if ('page' == $_POST['post_type']) {
    if (!current_user_can('edit_page', $post_id)) {
      return $post_id;
    }
  } elseif (!current_user_can('edit_post', $post_id)) {
    return $post_id;
  }
 
  foreach ($meta_box_teambio['fields'] as $field) {
    $old = get_post_meta($post_id, $field['id'], true);
    $new = $_POST[$field['id']];
 
    if ($new && $new != $old) {
      update_post_meta($post_id, $field['id'], $new);
    } elseif ('' == $new && $old) {
      delete_post_meta($post_id, $field['id'], $old);
    }
  }
}

// Save data from Team Member Title meta box
function teamtitle_save_data($post_id) {
  global $meta_box_teamtitle;
 
  // verify nonce
  if (!wp_verify_nonce($_POST['teamtitle_meta_box_nonce'], basename(__FILE__))) {
    return $post_id;
  }
 
  // check autosave
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return $post_id;
  }
 
  // check permissions
  if ('page' == $_POST['post_type']) {
    if (!current_user_can('edit_page', $post_id)) {
      return $post_id;
    }
  } elseif (!current_user_can('edit_post', $post_id)) {
    return $post_id;
  }
 
  foreach ($meta_box_teamtitle['fields'] as $field) {
    $old = get_post_meta($post_id, $field['id'], true);
    $new = $_POST[$field['id']];
 
    if ($new && $new != $old) {
      update_post_meta($post_id, $field['id'], $new);
    } elseif ('' == $new && $old) {
      delete_post_meta($post_id, $field['id'], $old);
    }
  }
}


//----------------------------------------------------------


// Image Uploader Plugin

    add_filter('images_cpt','my_image_cpt');
    function my_image_cpt(){
        $cpts = array('page','team');
        return $cpts;
    }

    add_filter('list_images','my_list_images',10,2);

function my_list_images($list_images, $cpt){
    global $typenow;
    if($typenow == "team" || $cpt == "team")
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





