<?php
/**
* @package ehtheme
*
* Based on Twentyseventeen Wordpress theme
*
* Content Template for Pages (not post types)
*/
?>

<p id="breadcrumb" class="breadcrumb">
  <a href="/" title="Return to home page">Home</a>
  &nbsp; / &nbsp;
  <?php the_title(); ?>
</p>

<div id="page-block" class="row page-block-bread">

  <h1 id="page-headline" class="col-12 <?php echo 'post-';echo the_ID();?>"><?php the_title();?></h1>

  <div id="page-content">
    <p><?php the_content();?></p>
  </div>

</div><!-- end #page-block -->
