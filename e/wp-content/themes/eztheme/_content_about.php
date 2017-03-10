<?php
/**
* @package eztheme
*
* Content to be included on the About page
*/
?>

<p id="breadcrumb" class="breadcrumb">
  <a href="/" title="Return to home page">Home</a>
  &nbsp; / &nbsp;
  About Me
</p>

<div id="page-block" class="row page-block-bread">

  <h1 id="page-headline" class="col-12 <?php echo 'post-';echo the_ID();?>">About Me</h1>

<?php if ( have_posts() ) : ?>

<?php while ( have_posts() ) : the_post(); ?>

  <div id="page-content">
    <p><?php echo get_the_content(); ?></p>

    <div class="entry-thumbnail">
<?php the_post_thumbnail(''); ?> <!-- This displays the featured image -->
<?php if ( $caption = get_post( get_post_thumbnail_id() )->post_excerpt ) : ?>
    <p class="caption"><?php echo $caption; ?></p>
<?php endif; ?><!-- This displays the caption below the featured image -->
</div>

  </div>

<?php endwhile; ?>

<?php endif; ?>

</div><!-- end #page-block -->
