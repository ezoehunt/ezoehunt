<?php
/**
* @package eztheme
*
* Template for Image Attachment Pages
*
*/

get_header();

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

      if ( $single[$prefix.'attach_preview'] == 'y' ) {
        $tmpurl = $single[$prefix.'attach_preview_url'];
        $tmptitle = $single[$prefix.'attach_preview_title'];
      }

      $attach_id = $single[$prefix.'attach_'.$format][0];
      $attachids[] += $attach_id;
      $count = count($attachids);

      if ( $attach_id == $post->ID ) {
        $attach_title = $single[$prefix.'attach_title'];
        $attach_format = $single[$prefix.'attach_format'];
        if ( !empty( $tmpurl ) ) {
          $page_url = $tmpurl;
        }
        if ( !empty ( $tmptitle ) ) {
          $attach_link_title = $tmptitle;
        }
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
$myprev = eh_nextprev($post->ID, $cat_slug, 'attachment', 'previous', $count, $attachids);

$mynext = eh_nextprev($post->ID, $cat_slug, 'attachment', 'next', $count, $attachids);


?>
      <li class="item-left">
<?php
  if ( !empty( $myprev ) ) {
    echo $myprev;
  }
  else {
    echo '&nbsp;';
  }
?>
      </li>

      <li class="item-right">
<?php
  if ( !empty( $mynext ) ) {
    echo $mynext;
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
  $attach_src = wp_get_attachment_image_src( $post->id, "full");
  $attach_src = $attach_src[0];
}
if ( $attach_format == 'p' ) {
  // Find PDF preview image
  $pdf_image = get_the_title($post->id);
  $pdf_image = 'image-'.eh_sluggify($pdf_image);
  $tmp_post = get_page_by_title($pdf_image, '', 'attachment');
  $attach_src = $tmp_post->guid;
}
?>
  <div class="image-attach">
<?php if ( !empty( $page_url ) ) : ?>
      This is a preview image.<br/>
      <a class="work" title="<?php echo $attach_link_title;?>" target="_blank" href="<?php echo $page_url; ?>">
        <?php echo $attach_link_title;?> &raquo;
      </a><br/><br/>
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
