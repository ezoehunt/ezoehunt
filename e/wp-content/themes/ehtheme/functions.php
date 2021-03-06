<?php
/**
* @package ehtheme
*
* Based on Twentyseventeen Wordpress theme
*
* Theme Functions
*
*/

function ehtheme_setup() {
	//add_theme_support( 'automatic-feed-links' );
  /* --- Add featured image to posts --- */
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'post-formats', array( 'aside' ) );
  add_post_type_support( 'post', 'post-formats' );
  add_post_type_support( 'page', 'post-formats' );
  /* --- No idea --- */
	add_image_size( 'ehtheme-featured-image', 2000, 1200, true );
	add_image_size( 'ehtheme-thumbnail-avatar', 100, 100, true );

	/* --- No idea --- */
  add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
}
add_action( 'after_setup_theme', 'ehtheme_setup' );


/* --- Remove empty Paragraphs in the_content that are auto generated by Wordpress --- */
remove_filter( 'the_content', 'wpautop' );


/* --- Remove admin bar from front-end site --- */
add_filter('show_admin_bar', '__return_false');


/* --- Update Admin CSS --- */
function admin_style() {
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/admin_eztheme.css');
}
add_action('admin_enqueue_scripts', 'admin_style');


/* --- Add Excerpt to Pages --- */
add_action( 'init', 'eh_add_excerpts_to_pages' );
function eh_add_excerpts_to_pages() {
  add_post_type_support( 'page', 'excerpt' );
}


/* --- Remove Asides from Search --- */
function eh_search_filter( $query ) {
  if ( ! $query->is_admin && $query->is_search && $query->is_main_query() ) {
    $query->set( 'post__not_in', array( 1 ) );
  }
}
add_action( 'pre_get_posts', 'eh_search_filter' );


/*
* Removing action below b/c of the following error for single_work.php on production server --
* "Notice: ob_end_flush(): failed to send buffer of zlib output compression (0) in /home/rkxgktjc/public_html/e/wp-includes/functions.php on line 3719"
*/
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );


// CREATE MAILTO SHORTCODE = [myemail]
/*
* Use as: [myemail]eh@ezoehunt.com[/myemail]
*/
function eh_email_encode_function( $atts, $content ) {
  return antispambot($content);
}
add_shortcode( 'myemail', 'eh_email_encode_function' );


// CREATE IMAGE ALT SHORTCODE = [myimagealt]
/*
* Only used for Posts + Pages (not CPTs)
* Use as: [myimagealt attach_id="ID" type="value"]
* where "value" = "alt" for images and "title" for hrefs
*/
function eh_image_alt_function( $attr ) {
  extract(shortcode_atts(array(
    'attach_id' => 'something more',
    'type'      => 'something else'
  ), $attr ));
  $parent_id = get_post_ancestors( $attr['attach_id'] );

  $getattach = get_post_meta($parent_id[0], '_blog_attachments');
  $attachments = $getattach[0];

  foreach ( $attachments as $image ) {
    $newID = $image['_blog_attach_images'][0];
    if ( $newID == $attr['attach_id'] ) {
      if (!empty ( $image['_blog_attach_alt'] ) ) {
        $image_alt = $image['_blog_attach_alt'];
      }
      if (!empty ( $image['_blog_attach_title'] ) ) {
        $image_title = $image['_blog_attach_title'];
      }
    }
  }
  if ( $attr['type'] == 'title' ) {
    return 'title="'.$image_title.'"';
  }
  if ( $attr['type'] == 'alt' ) {
    return 'alt="'.$image_alt.'"';
  }
}
add_shortcode( 'myimagealt', 'eh_image_alt_function' );



// CREATE CUSTOM CAPTION SHORTCODE FOR POSTS + PAGES
/*
* Only used for Posts + Pages (not CPTs)
* Use as: [mycaption id="attachment_XXX" align="alignright" caption="yes" class="col col-xs-100 col-sm-60"]...[/mycaption]
* where "id" is the attachment ID
* where "align" can be alignright, alignleft, or aligncenter
* where "caption" is "yes" or "no"
* where "class" is width used for the column
*/
function eh_caption($attr, $content = NUll ) {

  extract(shortcode_atts(array(
    'id'	    => '',
    'align'	  => '',
    'caption' => '',
    'class'   => ''
  ), $attr));

  // Set up
  preg_match('/\d+/', $id, $att_id);
  if ( $id ) {
    $id = 'id="' . esc_attr($id) . '" ';
  }

  if ( !empty( $attr['caption'] ) && $attr['caption'] == 'no' ) {
    return '<div ' . $id . 'class="wp-caption '. esc_attr($class) . ' ' . esc_attr($align) . '">' . do_shortcode( $content ) . '</div>';
  }

  if ( !empty( $attr['caption'] ) && $attr['caption'] == 'yes') {
    $parent_id = get_post_ancestors( $att_id[0] );
    $parent_cat_slug = eh_get_cat_slug($parent_id[0]);
    $href_class = $parent_cat_slug;

    $getattach = get_post_meta($parent_id[0], '_blog_attachments');
    $attachments = $getattach[0];

    foreach ( $attachments as $image ) {
      $newID = $image['_blog_attach_images'][0];

      if ( $newID == $att_id[0] ) {
        /*if (!empty ( $image['_blog_attach_title'] ) ) {
          $image_title = $image['_blog_attach_title'];
        }
        if (!empty ( $image['_blog_attach_alt'] ) ) {
          $image_alt = $image['_blog_attach_alt'];
        }*/
        if (!empty ( $image['_blog_attach_caption'] ) ) {
          $image_caption = $image['_blog_attach_caption'];
          $image_caption = str_replace('|', '<br/>', $image_caption);
        }
        if (!empty ( $image['_blog_attach_attr_name'] ) ) {
          $image_attr_name = $image['_blog_attach_attr_name'];
        }
        if (!empty ( $image['_blog_attach_attr_url'] ) ) {
          $image_attr_url = $image['_blog_attach_attr_url'];
        }
        if ( is_numeric($att_id[0]) && !empty( $image_attr_url ) ) {
      		$image_caption .= '<br/>(attr: <a class="'.$href_class.'" title="View orginal image" target="_blank" href="'.$image_attr_url.'">'.$image_attr_name.'</a>)';
      	}
        elseif ( is_numeric($att_id[0]) && empty( $image_attr_url ) && !empty( $image_attr_name) ) {
          $image_caption .= '<br/>(attr: '.$image_attr_name.')';
        }

        return '<div ' . $id . 'class="wp-caption '. esc_attr($class) . ' ' . esc_attr($align) . '">' . do_shortcode( $content ) . '<p class="wp-caption-text">' . $image_caption . '</p></div>';
      }
    }
  }
}
add_shortcode('mycaption', 'eh_caption');



// ADD CATEGORIES TO BODYCLASS ARRAY FOR SINGLE POSTS
/*
* Needed to use bodyclass to indicate "active" state in nav for all posts. By default Wordpress doesn't include category name for Single Posts in bodyclass
*/
function eh_add_category_to_single($classes) {
  if (is_single() ) {
    global $post;
    foreach((get_the_category($post->ID)) as $category) {
      $classes[] = $category->category_nicename;
    }
  }
  return $classes;
}
add_filter('body_class','eh_add_category_to_single');



// CREATE NEW CUSTOM POST TYPE = PROJECT
function eh_create_project_post_type() {
  // post type name shown in URL, eg /work/post-1
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
      'has_archive' => true,
      'publicly_queryable' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => true,
			'capability_type' => 'post',
			'hierarchical' => false,
			'menu_position' => null,
			'supports' => array('title','editor','thumbnail','author','thumbnail','excerpt','custom-fields', 'aside'),
      'taxonomies'  => array( 'category' ),
		)
	);
}
add_action( 'init', 'eh_create_project_post_type' );



// INLCUDE REGISTER METABOXES FOR CUSTOM POST TYPE = PROJECT
include '_portfolio-details.php';



// INCLUDE DISPLAY ORDER AS A COLUMN IN PORTFOLIO ADMIN
add_filter( 'manage_edit-work_columns', 'eh_manage_work_custom_columns' );
function eh_manage_work_custom_columns($columns) {
  $columns['display_order'] = __( 'Display Order' );
  return $columns;
}

add_action( 'manage_work_posts_custom_column' , 'eh_custom_work_column', 10, 2 );
function eh_custom_work_column( $column, $post_id ) {
  switch ( $column ) {
    case 'display_order' :
    $order = get_post_meta( $post_id, '_portfolio_display_order', true );
    if ( !empty( $order ) )
      echo $order;
    else
        _e( 'No display order' );
    break;
  }
}

// MAKE DISPLAY ORDER SORTABLE
add_filter( 'manage_edit-work_sortable_columns', 'eh_work_manage_sortable_columns' );
function eh_work_manage_sortable_columns($columns) {
  $columns['display_order'] = 'display_order';
  return $columns;
}

add_filter( 'pre_get_posts', 'eh_work_admin_sort_columns_by');
function eh_work_admin_sort_columns_by( $query ) {
  if( ! is_admin() ) {
    return;
  }
  $orderby = $query->get( 'orderby');
  if( 'display_order' == $orderby ) {
    $query->set('meta_key', '_portfolio_display_order');
    $query->set('orderby','meta_value_num');
  }
}



// INCLUDE DISPLAY ORDER IN THE PORFOLIO QUICK EDIT
add_action( 'quick_edit_custom_box', 'eh_display_custom_quickedit_work', 10, 2 );
function eh_display_custom_quickedit_work( $column_name, $post_type ) {
  static $printNonce = TRUE;
  if ( $printNonce ) {
    $printNonce = FALSE;
    wp_nonce_field( plugin_basename( __FILE__ ), 'work_edit_nonce' );
  }

  ?>
  <fieldset class="inline-edit-col-right inline-edit-work">
    <div class="inline-edit-col column-<?php echo $column_name; ?>">
      <label class="inline-edit-group">
      <?php
       switch ( $column_name ) {
       case 'display_order':
           ?><span class="title">Display Order</span><input name="display_order" /><?php
           break;
       }
      ?>
      </label>
    </div>
  </fieldset>
  <?php
}

add_action( 'save_post', 'eh_save_work_meta' );
function eh_save_work_meta( $post_id ) {
  /* in production code, $slug should be set only once in the plugin,
     preferably as a class property, rather than in each function that needs it.
   */
  $slug = 'work';
  if ( !empty($_POST['post_type']) && $slug !== $_POST['post_type'] ) {
    return;
  }
  if ( !current_user_can( 'edit_post', $post_id ) ) {
    return;
  }
  $_POST += array("{$slug}_edit_nonce" => '');
  if ( !wp_verify_nonce( $_POST["{$slug}_edit_nonce"], plugin_basename( __FILE__ ) ) ) {
    return;
  }
  if ( isset( $_REQUEST['display_order'] ) ) {
    update_post_meta( $post_id, '_portfolio_display_order', $_REQUEST['display_order'] );
  }
}

/* load script in admin footer */
if ( ! function_exists('wp_my_admin_enqueue_scripts') ):
  function wp_my_admin_enqueue_scripts( $hook ) {
  	if ( 'edit.php' === $hook && isset( $_GET['post_type'] ) && 'work' === $_GET['post_type'] ) {
  		wp_enqueue_script( 'my_custom_script', plugins_url('admin_eztheme.js'), false, null, true );
  	}
  }
endif;
add_action( 'admin_enqueue_scripts', 'wp_my_admin_enqueue_scripts' );



// CREATE CUSTOM TAXONOMY FOR PORTFOLIO CPT
register_taxonomy("project_tags", array("work"), array(
	"hierarchical" => false,
	"label" => "Project Tags",
	"singular_label" => "Project Tag",
	"rewrite" => true,
  'show_admin_column' => true,
  'query_var' => true,
));



// CREATE CUSTOM TAXONOMY FOR IMAGES
register_taxonomy("image_tags", array("attachment"), array(
	"hierarchical" => false,
	"label" => "Image Tags",
	"singular_label" => "Image Tag",
	"rewrite" => true,
  'show_admin_column' => true,
  'query_var' => true,
));



// ADD META BOXES TO REGULAR POSTS + PAGES
function eh_register_meta_boxes_posts( $meta_boxes ) {
  $prefix = '_blog_';
  $meta_boxes[] = array(
    'title'      => __( 'Post Details', 'textdomain' ),
    'post_types' => array( 'post', 'page' ),
    'context'    => 'normal',
    'priority'   => 'high',
    'fields' => array(
      array(
          'name'  => __( 'Post Headline', 'textdomain' ),
          'desc'  => 'The Post Headline appears in magazine header area.',
          'id'    => $prefix . 'headline',
          'type'  => 'text',
          'clone' => false,
      ),
      array(
          'name'  => __( 'Post Subhead', 'textdomain' ),
          'desc'  => 'The Post Subhead appears in the body copy area.',
          'id'    => $prefix . 'subhead',
          'type'  => 'text',
          'clone' => false,
      ),
      array(
          'name'  => __( 'Post Keywords', 'textdomain' ),
          'desc'  => 'The Post Keywords appears in the metadata.',
          'id'    => $prefix . 'keywords',
          'type'  => 'text',
          'clone' => false,
      )
    )
  );
  $meta_boxes[] = array(
    'title'      => __( 'Attachment Details', 'textdomain' ),
    'post_types' => array( 'post', 'page' ),
    'context'    => 'normal',
    'priority'   => 'high',
    'fields' => array(
      array(
				'id'     => $prefix.'attachments',
				// Group field
				'type'   => 'group',
				// Clone whole group?
				'clone'  => true,
				// Drag and drop clones to reorder them?
				'sort_clone' => true,
				// Sub-fields
				'fields' => array(
          array(
						'id'      => $prefix.'attach_title',
            'name'    => __( 'Attachment Title', 'rwmb' ),
						'type'    => 'text',
            'class'  => 'ez-admin-text'
					),
          array(
						'id'      => $prefix.'attach_alt',
            'name'    => __( 'Attachment Alt Text', 'rwmb' ),
						'type'    => 'text',
            'class'  => 'ez-admin-text'
					),
          array(
						'id'      => $prefix.'attach_caption',
            'name'    => __( 'Attachment Caption', 'rwmb' ),
						'type'    => 'textarea',
            'class'  => 'ez-admin-textarea'
					),
          array(
            'id'    => $prefix . 'attach_attr_name',
            'name'  => __( 'Attribution Name', 'textdomain' ),
            'type'  => 'text',
            'class' => 'ez-admin-text'
          ),
          array(
            'id'    => $prefix . 'attach_attr_url',
            'name'  => __( 'Attribution URL', 'textdomain' ),
            'type'  => 'text',
            'class' => 'ez-admin-text'
          ),
          array(
						'id'      => $prefix.'attach_display',
            'name'    => __( 'Display Attachment ?', 'rwmb' ),
						'type'    => 'radio',
            'class'  => 'ez-admin-radio',
            'options' => array(
                'y' => __( 'Yes', 'rwmb' ),
                'n' => __( 'No', 'rwmb' ),
            ),
            // Set the default value here
            'std'         => 'y',
					),
          array(
            'id'      => $prefix.'attach_format',
            'name'    => __( 'Image or PDF ?', 'rwmb' ),
            'type'    => 'radio',
            'class'  => 'ez-admin-radio',
            'options' => array(
                'i' => __( 'Image', 'rwmb' ),
                'p' => __( 'PDF', 'rwmb' ),
            ),
            // Set the default value here
            'std'         => 'i'
          ),
          array(
            'id'      => $prefix.'attach_preview',
            'name'    => __( 'Has thumbnail?', 'rwmb' ),
            'desc'  => esc_html__( 'If yes, the thumbnail is a preview of something else, e.g., a very large image, a web page, or a pdf file. Remember to upload the thumbnail image!', 'rwmb' ),
            'type'    => 'radio',
            'class'  => 'ez-admin-radio',
            'options' => array(
                'y' => __( 'Yes', 'rwmb' ),
                'n' => __( 'No', 'rwmb' ),
            ),
            // Set the default value here
            'std'         => 'n'
          ),
          // Displays only if attach_format = i
          array(
    				'id'      => $prefix.'attach_images',
            'name'    => esc_html__( 'Image', 'rwmb' ),
    				'type'    => 'image_advanced',
            'class'  => 'ez-admin-imginput',

    				// Delete image from Media Library when remove it from post meta? Note: it might affect other posts if you use same image for multiple posts
    				'force_delete'     => false,

    				// Maximum image uploads PER CLONED PART
    				'max_file_uploads' => 1,

    				// Display the "Uploaded 1/2 files" status
    				'max_status'       => true,
            'hidden' => array( 'attach_format', '!=', 'i' )
    			),
          // Displays only if attach_format = p
          array(
            'id'               => $prefix.'attach_pdf',
            'name'             => esc_html__( 'PDF', 'rwmb' ),
            'type'             => 'file_advanced',
            'max_file_uploads' => 1,
            // Leave blank for all file types
            'mime_type'        => '',
            'hidden' => array( 'attach_format', '!=', 'p' )
          ),
          // Display only if attach_preview = y
          array(
            'id'      => $prefix.'attach_preview_url',
            'name'    => __( 'Link for Preview Item', 'rwmb' ),
            'desc'  => esc_html__( 'Only provide URL if thumbnail should link to external file or web page.', 'rwmb' ),
            'type'    => 'text',
            'class'  => 'ez-admin-text',
            'visible'  => [
              ['attach_preview', '=', 'y']
            ]
          ),
          // Display only if attach_preview = y
          array(
            'id'      => $prefix.'attach_preview_title',
            'name'    => __( 'Preview Item Link Text', 'rwmb' ),
            'desc'  => esc_html__( 'Only provide Link Text if thumbnail should link to external file or web page. Appears in both "title" and "href" contexts. E.g., "View PDF".', 'rwmb' ),
            'type'    => 'text',
            'class'  => 'ez-admin-text',
            'visible'  => [
              ['attach_preview', '=', 'y']
            ]
          )
				)
			)
    )
  );
  return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'eh_register_meta_boxes_posts' );



// REMOVE EXCLUDED TAGS FROM TAGLIST
function eh_exclude_from_taglist( $post_id, $taxonomy, $exclude ) {

  $terms = get_the_terms( $post_id, $taxonomy );
  $countExclude = count($exclude);
  $countTerms = count($terms);
  $array = array();

  for ( $i = 0; $i<$countTerms; $i++ ) {
    for ( $j = 0; $j<$countExclude; $j++ ) {
      // Replace excluded tags with NULL
      if ( $terms[$i]->slug == $exclude[$j] ) {
        $terms[$i]->name = NULL;
      }
    }
    // Remove "none" string from the array
    if ( $terms[$i]->name != NULL ) {
      $array[] .= $terms[$i]->name;
    }
    $newterms = array_unique($array);
    $newterms = join( '&nbsp;&nbsp;/&nbsp;&nbsp;', $array );
  }

  if ( !empty( $newterms ) ) {
    return $newterms;
  }
  else {
    return false;
  }
}



// REMOVE ITEMS FROM SEARCH QUERY
/* Excludes published Portfolio items with display_order = NULL */
function eh_remove_from_search( $query ) {
  if( ! is_admin() && $query->is_search() ) {
    // Get orig query
    $meta_query = $query->get('meta_query');

    // Include items without the key AND items where key != NULL
    //$meta_query[] = array( 
    $meta_query = array(
      'relation' => 'OR',
      array(
    		'key' => '_portfolio_display_order',
    		'compare' => 'NOT EXISTS'
    	),
  		array(
    		'key'	=> '_portfolio_display_order',
    		'value' => 'NULL',
    		'compare' => '!='
    	)
    );
    $query->set('meta_query',$meta_query);
  }
}
add_action('pre_get_posts','eh_remove_from_search');



// FOR NEXT PREVIOUS NAVIGATION
function eh_nextprev( $post_id, $cat_slug, $format, $type, $count, $array ) {
  if ( $type == 'previous' ) {
    $arrow = 'left';
  }
  elseif ( $type == 'next' ) {
    $arrow = 'right';
  }

  // BLOG
  if ( $format == 'blog' ) {
    if ( $type == 'previous' ) {
      $link = get_previous_post(true,'');
    }
    elseif ( $type == 'next' ) {
      $link = get_next_post(true,'');
    }
    if ( !empty( $link ) ) {
      $url = esc_url(get_permalink($link->ID));
    }
  }

  // WORK + ATTACHMENT
  if ( $format == 'work' OR $format == 'attachment') {
    if ( $count === 1 ) {
      return false;
    }
    // Zero index $count to match array keys
    $count = $count-1;
    $currentkey = array_search($post_id, $array);
    if ( $currentkey != 0 ) {
      $prevID = $array[$currentkey-1];
    }
    if ( $currentkey != $count ) {
      $nextID = $array[$currentkey+1];
    }
    // WORK
    if ( $format == 'work' && $type == 'previous' && !empty($prevID) ) {
      $link = get_permalink($prevID);
    }
    elseif ($format == 'work' && $type == 'next'  && !empty($nextID) ) {
      $link = get_permalink($nextID);
    }
    if ( $format == 'attachment' && $type == 'previous'  && !empty($prevID) ) {
      $link = get_attachment_link($prevID);
    }
    elseif ($format == 'attachment' && $type == 'next'  && !empty($nextID) ) {
      $link = get_attachment_link($nextID);
    }
    if ( !empty($link) ) {
      $url = esc_url( $link );
    }
  }

  // Final setup
  if ( $format == 'work' ) {
    $cat_alt = $type.' project';
  }
  elseif ( $format == 'attachment' ) {
    $cat_alt = $type.' image';
  }
  elseif ( $format == 'blog' ) {
    $cat_alt = $type.' post in Words';
  }

  $icon = '<span class="fa fa-stack"><i class="fa fa-circle fa-stack-1x icon-a icon-bg-'.$cat_slug.'" aria-hidden="true"></i><i class="fa fa-arrow-'.$arrow.' fa-stack-1x icon-b icon-color-inverse" aria-hidden="true"></i></span>';

  if ( !empty( $url ) ) {
    return '<a class="'.$cat_slug.'" title="See '.$cat_alt.'" href="'.$url.'">'.$icon.'</a>';
  }
  else {
    return false;
  }
}



// MISC FUNCTIONS

function eh_sluggify($string) {
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


function eh_get_cat_name($post_id) {
  $post_categories = wp_get_post_categories( $post_id );
  $cats = array();
  foreach ( $post_categories as $c ) {
    $cat = get_category( $c );
    $cat_name = $cat->name;
  }
  return $cat_name;
}


function eh_get_cat_slug($post_id) {
  $post_categories = wp_get_post_categories( $post_id );
  $cats = array();
  foreach ( $post_categories as $c ) {
    $cat = get_category( $c );
    $cat_slug = $cat->slug;
  }
  return $cat_slug;
}


function eh_image_id_from_url($image_url) {
	global $wpdb;
	$attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url ));
  return $attachment;
}


function eh_paginate($query) {
  $big = 999999999;
  $translated = __( 'Page', 'mytextdomain' );

  return paginate_links( array (
  	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
  	'format'    => '?paged=%#%',
    'end_size'  => 1,
    'mid_size'  => 1,
    'prev_next' => true,
  	'prev_text' => __('&laquo;'),
  	'next_text' => __('&raquo;'),
  	'current'   => max( 1, get_query_var('paged') ),
  	'total'     => $query->max_num_pages,
    'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
    ) );
    echo '<pre>';
    var_dump($query);
    echo '</pre>';
}


// NOT USING
function eh_break_text($text){
    $length = 500;
    //don't cut if too short
    if(strlen($text)<$length+10) return $text;
    //find next space after desired length
    $break_pos = strpos($text, ' ', $length);
    $visible = substr($text, 0, $break_pos);
    return balanceTags($visible) . " […]";
}
