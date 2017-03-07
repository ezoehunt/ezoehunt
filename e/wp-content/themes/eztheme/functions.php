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

// REMOVE WP ADMIN BAR FROM SITE
add_filter('show_admin_bar', '__return_false');


// INLCUDE PROJECT IMAGES
include 'project_images.php';

// ADD SUPPORT FOR POST THUMBNAILS - APPLIES EVERYWHERE
add_theme_support( 'post-thumbnails' );


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


// ADD CUSTOM FIELDS TO CUSTOM POST TYPE = PROJECT
function add_project_meta_boxes() {
	add_meta_box("project_details_meta", "Project Details", "add_project_details_meta_box", "work", "normal", "high");
}

function add_project_details_meta_box()
{
	global $post;
	$custom = get_post_custom( $post->ID );

	?>
	<style>.width99 {width:99%;}</style>
	<p>
		<label><b>Keywords:</b></label><br />
		<input type="text" name="keywords" value="<?= @$custom["keywords"][0] ?>" class="width99" />
	</p>
  <p>
		<label><b>Website:</b></label><br />
		<input type="text" name="website" value="<?= @$custom["website"][0] ?>" class="width99" />
	</p>
  <p>
		<label><b>Headline:</b></label><br />
		<textarea rows="5" name="headline" class="width99"><?= @$custom["headline"][0] ?></textarea>
	</p>
  <p>
		<label><b>Challenge:</b></label><br />
		<textarea rows="5" name="challenge" class="width99"><?= @$custom["challenge"][0] ?></textarea>
	</p>
  <p>
		<label><b>Solution:</b></label><br />
		<textarea rows="5" name="solution" class="width99"><?= @$custom["solution"][0] ?></textarea>
	</p>
  <p>
		<label><b>Contribution:</b></label><br />
		<textarea rows="5" name="contribution" class="width99"><?= @$custom["contribution"][0] ?></textarea>
	</p>
	<?php
}


// SAVE CUSTOM FIELD DATA WHEN CREATING/UPDATING CUSTOM POST TYPE = PROJECT
function save_project_custom_fields(){
  global $post;

  if ( $post )
  {
    update_post_meta($post->ID, "keywords", @$_POST["keywords"]);
    update_post_meta($post->ID, "website", @$_POST["website"]);
    update_post_meta($post->ID, "headline", @$_POST["headline"]);
    update_post_meta($post->ID, "challenge", @$_POST["challenge"]);
    update_post_meta($post->ID, "solution", @$_POST["solution"]);
    update_post_meta($post->ID, "contribution", @$_POST["contribution"]);
  }
}
add_action( 'admin_init', 'add_project_meta_boxes' );
add_action( 'save_post', 'save_project_custom_fields' );

?>
