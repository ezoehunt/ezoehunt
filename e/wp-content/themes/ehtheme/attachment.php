<!--
[caption id="attachment_35" align="alignright" width="876" class="col col-xs-100 col-sm-60"]<a href="http://localhost/words/a-love-letter-to-cities/attachment/mission-creek-houseboats/" rel="attachment wp-att-35"><img src="http://localhost/e/wp-content/uploads/2017/03/Mission-Creek-Houseboats.jpg" alt="Mission Creek Houseboats" class="wp-image-35" style="width:auto;" /></a> Mission Creek Houseboats[/caption]
-->


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
//$thispostid = $post->ID;
//$parent_id = $post->post_parent;
$parent_id = wp_get_post_parent_id( $post->ID );

//$parentcat = get_the_category($parent_id);
//$parentcatslug = $parentcat[0]->slug;
$parent_cat_slug = mygetcatslug( $parent_id );

if ( $parent_cat_slug == 'words' ) {
  $image_title = get_the_title();
}
elseif ( $parent_cat_slug == 'work' ) {
  $images = get_post_meta($parentid,'project_details_images',true);
  foreach ( $images as $image ) {
    $title = $image['project_details_image_title'];
    if ($title === $post->post_title ) {
      $image_title = $title;
    }
  }
}
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


<?php if ( $parent_cat_slug == 'work' ) : ?>
<div id="rightcol" class="col col-sm-5 col-md-15 bg-work"></div>
<?php elseif ( $parent_cat_slug == 'words' ) : ?>
<div id="rightcol" class="col col-sm-5 col-md-15 bg-words"></div>
<?php endif; ?>

<?php get_footer(); ?>
