<?php
/**
* @package eztheme
*
* Template for Image Attachment Pages
*
*/

get_header();

if ( have_posts() ) :
  while ( have_posts() ) : the_post();

  $parent_id = wp_get_post_parent_id( $post->ID );
  $cat_slug = eh_get_cat_slug( $parent_id );
  if ( $cat_slug == 'work' ) {
    $prefix = 'project_details_';
  }
  elseif ( $cat_slug == 'words' ) {
    $prefix = 'eh_';
  }

  // Get count for next/prev function
  /* Subtract the featured image b/c it shouldn't be displayed as an attachment here */
  $countit = get_children( array( 'post_parent' => $parent_id ) );
  $count = count( $countit );
  $count = $count-1;
?>

<div id="leftcol" class="col col-sm-5 col-md-15 bg-<?php echo $cat_slug;?>"></div>


<div id="maincol" class="col col-sm-90 col-md-70 bg-white">

  <div id="breadcrumb">
    <p class="page-breadcrumb">
      <a class="<?php echo $cat_slug;?>" href="<?php echo get_permalink($parent_id); ?>" title="<?php echo ($cat_slug == 'work') ? 'Back to Project page' : 'Back to Article page' ?>"><span class="link-raquo">&laquo;</span> <?php echo ($cat_slug == 'work') ? 'Back to Project page' : 'Back to Article page' ?></a>
    </p>
  </div>


  <div id="page-title">

    <ul class="page-pagination">

      <li class="item-middle">
        <h1 class="page-headline">
<?php
if ( $cat_slug == 'words' ) {
  $image_title = get_the_title($post->ID);
  echo $image_title;
}
elseif ( $cat_slug == 'work' ) {
  $imgtitles = get_post_meta($parent_id,'project_details_images',true);
  foreach ( $imgtitles as $imgtitle ) {
    $image_title = $imgtitle['project_details_image_title'];
    if ($image_title === $post->post_title ) {
      echo $image_title;
    }
  }
}
?>
        </h1>
      </li>

<?php
$media = '';
$myattachments = get_post_meta($parent_id, $prefix.'images');
foreach ( $myattachments as $myattach ) {
  foreach ($myattach as $attach) {
    $media[] += $attach[$prefix.'image_images'][0];
  }
}
$previmg = eh_nextprev_img_link($post->ID, $media, 'previous', $cat_slug, $count);
$nextimg = eh_nextprev_img_link($post->ID, $media, 'next', $cat_slug, $count);
wp_reset_postdata();
?>
      <li class="item-left">
<?php
  if ( !empty( $previmg ) ) {
    echo $previmg;
  }
  else {
    echo '&nbsp;';
  }
?>
      </li>

      <li class="item-right">
<?php
  if ( !empty( $nextimg ) ) {
    echo $nextimg;
  }
  else {
    echo '&nbsp;';
  }
?>
      </li>

    </ul>

  </div>
<?php if ( wp_attachment_is_image( $post->id ) ) : $att_image = wp_get_attachment_image_src( $post->id, "full"); ?>

  <div class="image-attach">
      <img title="<?php echo $image_title; ?>" src="<?php echo $att_image[0];?>" />
  </div>
<?php endif; ?>

</div><!-- end #maincol -->

<div id="rightcol" class="col col-sm-5 col-md-15 bg-<?php echo $cat_slug;?>"></div>

<?php
endwhile;
endif;
get_footer();
?>
