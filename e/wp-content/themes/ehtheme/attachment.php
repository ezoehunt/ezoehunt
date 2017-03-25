<?php
/**
* @package eztheme
*
* Template for Image Attachment Pages
*
*/

get_header();

$mediaids = '';

$parent_id = wp_get_post_parent_id( $post->ID );

$cat_slug = eh_get_cat_slug( $parent_id );
if ( $cat_slug == 'work' ) {
  $prefix = '_portfolio_';
}
elseif ( $cat_slug == 'words' ) {
  $prefix = '_blog_';
}

$myimages = get_post_meta($parent_id, $prefix.'images');

foreach ( $myimages as $myimage ) {
  foreach ($myimage as $theimage) {
    if ( $theimage[$prefix.'image_display'] == 'y' ) {
      // For comparison purposes
      $image_id = $theimage[$prefix.'image_images'][0];

      // For use in next/previous function
      $mediaids[] += $theimage[$prefix.'image_images'][0];
      $count = count( $mediaids );

      /* For titles
      *  Get titles for regular Posts/Pages from the post's content area, i.e., "<img title="" ...>.
      *  For Portfolio items, get the title from the post's metabox input area, i.e., the "Image Title" input field.
      */
      if ( $cat_slug == 'words' && $image_id == $post->ID ) {
        $image_title = get_the_title($post->ID);
      }
      elseif ( $cat_slug == 'work'  && $image_id == $post->ID ) {
        $image_title = $theimage[$prefix.'image_title'];
      }
    }
  }
}

if ( have_posts() ) :
  while ( have_posts() ) : the_post();
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
          <?php echo $image_title; ?>
        </h1>
      </li>

<?php
$previmg = eh_nextprev_img_link($post->ID, $mediaids, 'previous', $cat_slug, $count);
$nextimg = eh_nextprev_img_link($post->ID, $mediaids, 'next', $cat_slug, $count);
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
