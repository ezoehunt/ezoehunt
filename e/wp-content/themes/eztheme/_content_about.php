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

<?php echo get_the_content(); ?>

<?php endwhile; ?>

<?php endif; ?>

</div><!-- end #page-block -->
