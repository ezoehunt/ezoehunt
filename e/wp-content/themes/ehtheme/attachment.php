<?php
/**
* @package eztheme
*
* Template for Image Attachment Pages
*
*/
?>

<?php

get_header();

if ( have_posts() ) :
  while ( have_posts() ) : the_post();

  $parent_id = wp_get_post_parent_id( $post->ID );
  $parent_cat_slug = eh_get_cat_slug( $parent_id );
  //$type = $parent_cat_slug;

  // Get count for next/prev img links
  /* Subtract the featured image b/c it shouldn't be displayed as an attachment here */
  $countit = get_children( array( 'post_parent' => $parent_id ) );
  $count = count( $countit );
  $count = $count-1;
?>

<?php if ( $parent_cat_slug == 'work' ) : ?>
<div id="leftcol" class="col col-sm-5 col-md-15 bg-work"></div>
<?php elseif ( $parent_cat_slug == 'words' ) : ?>
<div id="leftcol" class="col col-sm-5 col-md-15 bg-words"></div>
<?php endif; ?>


<div id="maincol" class="col col-sm-90 col-md-70 bg-white">

  <div id="breadcrumb">
    <p class="page-breadcrumb">
<?php if ( $parent_cat_slug == 'work' ) : ?>
      <a class="work" href="<?php echo get_permalink($parent_id); ?>" title="Back to Project page"><span class="link-raquo">&laquo;</span> Back to project page</a>
<?php elseif ( $parent_cat_slug == 'words' ) : ?>
      <a class="words" href="<?php echo get_permalink($parent_id); ?>" title="Back to Words article"><span class="link-raquo">&laquo;</span> Back to article</a>
<?php endif; ?>
    </p>
  </div>


  <div id="page-title">

    <ul class="page-pagination">

      <li class="item-middle">
        <h1 class="page-headline">
<?php
if ( $parent_cat_slug == 'words' ) {
  $image_title = get_the_title($post->ID);
  echo $image_title;
}
elseif ( $parent_cat_slug == 'work' ) {
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
$newmedia = '';
$myattachments = get_post_meta($parent_id,'eh_images');
foreach ( $myattachments as $myattach ) {
  foreach ($myattach as $attach) {
    $newmedia[] += $attach['eh_image_images'][0];
  }
}
$previmg = eh_nextprev_img_link($post->ID, $newmedia, 'previous', $parent_cat_slug, $count);
$nextimg = eh_nextprev_img_link($post->ID, $newmedia, 'next', $parent_cat_slug, $count);
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


<?php if ( $parent_cat_slug == 'work' ) : ?>
<div id="rightcol" class="col col-sm-5 col-md-15 bg-work"></div>
<?php elseif ( $parent_cat_slug == 'words' ) : ?>
<div id="rightcol" class="col col-sm-5 col-md-15 bg-words"></div>
<?php endif; ?>

<?php
endwhile;
endif;
get_footer();
?>
