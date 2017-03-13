<?php
/**
* @package ehtheme
*
* Based on Twentyseventeen Wordpress theme
*
* Content Template for Pages (not post types)
*
*/
?>

<div id="page-block" class="row">

  <p id="breadcrumb" class="breadcrumb">
    <a href="/" title="Return to home page">Home</a>
    &nbsp; / &nbsp;
    <?php the_title(); ?>
  </p>

  <div id="page-content">

    <h1 id="page-headline" class="col-12 <?php echo 'post-';echo the_ID();?>"><?php the_title();?></h1>

    <div id="post-content">
      <p><?php the_content();?></p>
    </div>

  </div><!-- end #page-content -->

</div><!-- end #page-block -->
