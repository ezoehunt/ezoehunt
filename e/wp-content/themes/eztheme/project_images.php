<?php
/**
 * For more information, please visit:
 * @link http://metabox.io/docs/registering-meta-boxes/
 */


add_filter( 'rwmb_meta_boxes', 'project_images_register_meta_boxes' );

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function project_images_register_meta_boxes( $meta_boxes ) {
  $prefix = 'project_images_';

  $meta_boxes[] = array(

    'title'  => __( 'Project Images' ),

    'post_types' => array( 'work' ),
    'context'    => 'normal',
    'priority'   => 'high',

    'fields' => array(
			array(
				'id'     => 'project_images',
				// Group field
				'type'   => 'group',
				// Clone whole group?
				'clone'  => true,
				// Drag and drop clones to reorder them?
				'sort_clone' => true,
				// Sub-fields
				'fields' => array(
					array(
						'name'    => __( 'Title', 'rwmb' ),
						'id'      => $prefix.'title',
						'type'    => 'text',
					),
					array(
						'name'    => __( 'Alt Text', 'rwmb' ),
						'id'      => $prefix.'alttext',
						'type'    => 'text',
					),
					array(
						'name'    => __( 'Description', 'rwmb' ),
						'id'      => $prefix.'description',
						'type'    => 'textarea',
					),
					array(
						'name'    => __( 'Type', 'rwmb' ),
						'id'      => $prefix.'type',
						'type'    => 'text',
					),
          array(
    				'name'    => esc_html__( 'Image', 'rwmb' ),
    				'id'      => $prefix.'image',
    				'type'    => 'image_advanced',

    				// Delete image from Media Library when remove it from post meta? Note: it might affect other posts if you use same image for multiple posts
    				'force_delete'     => false,

    				// Maximum image uploads
    				'max_file_uploads' => 20,

    				// Display the "Uploaded 1/2 files" status
    				'max_status'       => true,
    			),
				),
			),
		),
	);
	return $meta_boxes;
}
