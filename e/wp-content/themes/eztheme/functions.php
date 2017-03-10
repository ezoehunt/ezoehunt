<?php
/**
* eztheme functions and definitions
*
* @package eztheme
*
* // FOR REFERENCE - to see raw WP SQL
* //echo $GLOBALS['wp_query']->request;
*
*/

// UPDATES TO WORDPRESS DEFAULTS

add_theme_support( 'html5', array(
  'post-thumbnails',
  'comment-form',
  'comment-list',
  'gallery',
  'caption',
) );

/* --- Remove admin bar from site --- */
add_filter('show_admin_bar', '__return_false');

/* --- Add featured image to posts --- */


/* --- Update Admin CSS --- */
function admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/admin_eztheme.css');
}
add_action('admin_enqueue_scripts', 'admin_style');

/* --- Add Categories to bodyclass for Single Posts --- */
add_filter('body_class','add_category_to_single');
function add_category_to_single($classes) {
  if (is_single() ) {
    global $post;
    foreach((get_the_category($post->ID)) as $category) {
      // add category slug to the $classes array
      $classes[] = $category->category_nicename;
    }
  }
  // return the $classes array
  return $classes;
}

/* --- Filter image caption --- */




// INLCUDE NEW FIELDS FOR CUSTOM POST TYPE = PROJECT
include '_project_details.php';


// CREATE NEW CUSTOM POST TYPE = PROJECT
function create_project_post_type() {
  // post type name = name shown in URL, eg work/post-1
	register_post_type( 'work',
		array(
			'labels' => array(
				'name' => 'Portfolio',
				'singular_name' => 'Project',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Project',
				'edit_item' => 'Edit Project',
				'new_item' => 'New Project',
				'view_item' => 'View Project',
				'search_items' => 'Search Projects',
				'not_found' =>  'Nothing Found',
				'not_found_in_trash' => 'Nothing found in the Trash',
				'parent_item_colon' => ''
			),
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array('title','editor','thumbnail','author','thumbnail','excerpt','custom-fields'),
      'taxonomies'  => array( 'category' ),
		)
	);
}
add_action( 'init', 'create_project_post_type' );


// CREATE CUSTOM TAXONOMY FOR CUSTOM POST TYPE = PROJECT
register_taxonomy("project_tags", array("work"), array(
	"hierarchical" => false,
	"label" => "Project Tags",
	"singular_label" => "Project Tag",
	"rewrite" => true
));


// Misc Functions
function sluggify($string)
{
  # Prep string with some basic normalization
  $string = strtolower($string);
  $string = strip_tags($string);
  $string = stripslashes($string);
  $string = html_entity_decode($string);

  # Remove quotes (can't, etc.)
  $string = str_replace('\'', '', $string);

  # Replace non-alpha numeric with hyphens
  $match = '/[^a-z0-9]+/';
  $replace = '-';
  $string = preg_replace($match, $replace, $string);

  $string = trim($string, '-');

  return $string;
}


function mygetcatname($post_id) {
  $post_categories = wp_get_post_categories( $post_id );
  $cats = array();
  foreach ( $post_categories as $c ) {
    $cat = get_category( $c );
    $cat_name = $cat->name;
  }
  return $cat_name;
}


function mygetcatslug($post_id) {
  $post_categories = wp_get_post_categories( $post_id );
  $cats = array();
  foreach ( $post_categories as $c ) {
    $cat = get_category( $c );
    $cat_slug = $cat->slug;
  }
  return $cat_slug;
}


function mynextprevious( $post_id, $type ) {
  global $post;
  // Get the category
  $cat_name = mygetcatname($post_id);
  // Adjust output
  if ( $cat_name == 'Work' ) {
    $cat_alt = $type.' Porfolio project';
  }
  if ( $cat_name == 'Words' ) {
    $cat_alt = $type.' post in Words';
  }
  // Match type to icons + function
  if ( $type == 'previous' ) {
    $function = get_previous_post();
    $icon = '<i class="fa fa-arrow-circle-left" aria-hidden="true"></i>';
  }
  elseif ( $type == 'next' ) {
    $function = get_next_post();
    $icon = '<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>';
  }
  // If none, return false (empty)
  if( $function ) {
    return '<a class="noborder nohash" title="See '.$cat_alt.'" href="'.esc_url(get_post_permalink($function->ID)).'">'.$icon.'</a>';
  }
  else {
    return false;
  }
}


function mygetimageid($image_url) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
  return $attachment;
}



?>
