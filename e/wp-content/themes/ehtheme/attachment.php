<?php
/**
* @package eztheme
*
* Template for Image Attachment Pages
*
*/
?>

<?php get_header(); ?>

<?php
$thispostid = $post->ID;
$parentid = $post->post_parent;
$images = get_post_meta($parentid,'project_details_images',true);
foreach ( $images as $image ) {
  $title = $image['project_details_image_title'];
  if ($title === $post->post_title ) {
    $image_title = $title;
  }
}
?>

<div id="leftcol" class="col col-sm-5 col-md-15 bg-work"></div>

<div id="maincol" class="col col-sm-90 col-md-70 bg-white">

  <div id="breadcrumb">
    <p class="page-breadcrumb">
      <a class="work" href="<?php echo get_permalink($parentid); ?>" title="Return to Project page"><span class="link-raquo">&laquo;</span> Return to Project page</a>
    </p>
  </div>

  <div id="page-title">

    <ul class="page-pagination">

      <li class="item-middle">
        <h1 class="page-headline"><?php echo $image_title; ?></h1>
      </li>

      <li class="item-left">
        <?php //previous_image_link('none', 'previous image' ); ?>
      </li>

      <li class="item-right">
        <?php //next_image_link('none', 'next image' ); ?>
      </li>

    </ul>

  </div>
<?php if ( wp_attachment_is_image( $post->id ) ) : $att_image = wp_get_attachment_image_src( $post->id, "full"); ?>

  <div class="image-attach">
      <img title="<?php echo $image_title; ?>" src="<?php echo $att_image[0];?>" />
  </div>
<?php endif; ?>

</div><!-- end #maincol -->


<div id="rightcol" class="col col-sm-5 col-md-15 bg-work"></div>

<?php get_footer(); ?>
