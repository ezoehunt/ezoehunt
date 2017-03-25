<?php
/**
 * For more information, please visit:
 * @link http://metabox.io/docs/registering-meta-boxes/
 */

function project_details_register_meta_boxes( $meta_boxes ) {
  $prefix = '_portfolio_';

  $meta_boxes[] = array(
    'title'  => __( 'Project Details' ),
    'post_types' => array( 'work' ),
    'context'    => 'normal',
    'priority'   => 'high',
    'fields'     => array(
      array(
        'id'   => $prefix.'keywords',
        'name' => __( 'Keywords', 'rwmb' ),
        'type' => 'text',
        'class'   => 'ez-admin-text'
      ),
      array(
        'id'   => $prefix.'website',
        'name' => esc_html__( 'Website', 'rwmb' ),
        'type' => 'url',
        'class'   => 'ez-admin-text'
      ),
      array(
        'id'   => $prefix.'headline',
        'name' => __( 'Headline', 'rwmb' ),
        'type' => 'text',
        'class'   => 'ez-admin-text'
      ),
      array(
        'id'   => $prefix.'challenge',
        'name' => __( 'Challenge', 'rwmb' ),
        'type' => 'textarea',
        'class'   => 'ez-admin-textarea'
      ),
      array(
        'id'   => $prefix.'solution',
        'name' => __( 'Solution', 'rwmb' ),
        'type' => 'textarea',
        'class'   => 'ez-admin-textarea'
      ),
      array(
        'id'   => $prefix.'role',
        'name' => __( 'Role', 'rwmb' ),
        'type' => 'text',
        'class'   => 'ez-admin-text'
      ),
      array(
        'id'   => $prefix.'employer',
        'name' => __( 'Employer', 'rwmb' ),
        'type' => 'text',
        'class'   => 'ez-admin-text'
      ),
      array(
        'id'   => $prefix.'employer_website',
        'name' => __( 'Employer Website', 'rwmb' ),
        'type' => 'url',
        'class'   => 'ez-admin-text'
      ),
      array(
        'id'   => $prefix.'client',
        'name' => __( 'Client', 'rwmb' ),
        'type' => 'text',
        'class'   => 'ez-admin-text'
      ),
      array(
				'id'     => $prefix.'images',
				// Group field
				'type'   => 'group',
				// Clone whole group?
				'clone'  => true,
				// Drag and drop clones to reorder them?
				'sort_clone' => true,
				// Sub-fields
				'fields' => array(
          /* Easier to deal with changes to Title or Alt in Portfolio Post context vs. Media Library context */
					array(
						'id'      => $prefix.'image_display',
            'name'    => __( 'Display Image ?', 'rwmb' ),
						'type'    => 'radio',
            'class'  => 'ez-admin-radio',
            'options' => array(
                'y' => __( 'Yes', 'rwmb' ),
                'n' => __( 'No', 'rwmb' ),
            ),
					),
          array(
						'id'      => $prefix.'image_title',
            'name'    => __( 'Image Title', 'rwmb' ),
						'type'    => 'text',
            'class'  => 'ez-admin-text'
					),
					array(
						'id'      => $prefix.'image_alt',
            'name'    => __( 'Image Alt Text', 'rwmb' ),
						'type'    => 'text',
            'class'  => 'ez-admin-text'
					),
					array(
						'id'      => $prefix.'image_description',
            'name'    => __( 'Image Description', 'rwmb' ),
						'type'    => 'textarea',
            'class'  => 'ez-admin-textarea'
					),
					array(
						'id'      => $prefix.'image_type',
            'name'    => __( 'Image Type', 'rwmb' ),
						'type'    => 'radio',
            'class'  => 'ez-admin-radio',
            'options' => array(
                'd' => __( 'Design', 'rwmb' ),
                'p' => __( 'Process', 'rwmb' ),
            ),
					),
          array(
    				'id'      => $prefix.'image_images',
            'name'    => esc_html__( 'Image', 'rwmb' ),
    				'type'    => 'image_advanced',
            'class'  => 'ez-admin-imginput',

    				// Delete image from Media Library when remove it from post meta? Note: it might affect other posts if you use same image for multiple posts
    				'force_delete'     => false,

    				// Maximum image uploads PER CLONED PART
    				'max_file_uploads' => 1,

    				// Display the "Uploaded 1/2 files" status
    				'max_status'       => true,
    			)
				)
			)
    )
  );
  return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'project_details_register_meta_boxes' );
