<?php
/**
* @package eztheme
*
* Template for Image Attachment Pages
*
*/

get_header();

//$attachids = [];
$attachids = array();

$parent_id = wp_get_post_parent_id( $post->ID );

$cat_slug = eh_get_cat_slug( $parent_id );
if ( $cat_slug == 'work' ) {
  $prefix = '_portfolio_';
}
elseif ( $cat_slug == 'words' ) {
  $prefix = '_blog_';
}

$attachments = get_post_meta($parent_id, $prefix.'attachments');

foreach ( $attachments as $attach ) {

  foreach ($attach as $single) {

    if ( $single[$prefix.'attach_display'] == 'y' ) {

      if ( $single[$prefix.'attach_format'] == 'i' ) {
        $format = 'images';
      }
      if ( $single[$prefix.'attach_format'] == 'p' ) {
        $format = 'pdf';
      }

      $attach_id = $single[$prefix.'attach_'.$format][0];
      $attachids[] += $attach_id;
      $count = count($attachids);

      if ( $attach_id == $post->ID ) {
        $attach_title = $single[$prefix.'attach_title'];
        $attach_format = $single[$prefix.'attach_format'];
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
          <?php echo $attach_title; ?>
        </h1>
      </li>

<?php
$previmg = eh_nextprev_img_link($post->ID, $attachids, 'previous', $cat_slug, $count);
$nextimg = eh_nextprev_img_link($post->ID, $attachids, 'next', $cat_slug, $count);
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
<?php
if ( $attach_format == 'i' ) {
  // Get image
  $tmp_image = wp_get_attachment_image_src( $post->id, "full");
  $attach_src = $tmp_image[0];
}
if ( $attach_format == 'p' ) {
  // Find image that represents the PDF
  $pdf_image = get_the_title($post->id);
  $pdf_image = eh_sluggify($pdf_image);
  $pdf_image = 'image-'.$pdf_image;
  $tmp_post = get_page_by_title($pdf_image, '', 'attachment');
  $attach_src = $tmp_post->guid;
  $page_url = wp_get_attachment_url( $post->id );
}
?>
  <div class="image-attach">
<?php if ( $attach_format == 'p' ) : ?>
      This is a preview image of a PDF file.<br/><a class="work" title="View PDF" target="_blank" href="<?php echo $page_url; ?>">View the complete PDF &raquo;</a><br/><br/>
<?php endif; ?>
      <img title="<?php echo $attach_title; ?>" src="<?php echo $attach_src;?>" />
  </div>

</div><!-- end #maincol -->

<div id="rightcol" class="col col-sm-5 col-md-15 bg-<?php echo $cat_slug;?>"></div>

<?php
endwhile;
endif;
get_footer();
?>
