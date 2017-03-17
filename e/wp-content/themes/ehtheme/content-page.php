<?php
/**
* @package ehtheme
*
* Based on Twentyseventeen Wordpress theme
*
* Content Template for Pages (not post types)
*
*/
global $post;
?>

<div id="page-breadcrumb" class="row row-40 <?php echo 'post-';echo the_ID();?>">
  <div class="col col-sm-5 col-md-15 col-bg-orange"></div>

  <div class="col col-sm-90 col-md-70 col-bg-white">

    <p class="page-breadcrumb">
      <a href="/" title="Return to home page">Home</a>
      &nbsp; / &nbsp;
      <?php echo get_the_title(); ?>
    </p>

  </div>

  <div class="col col-sm-5 col-md-15 col-bg-orange"></div>
</div>


<div id="page-title" class="row row-120">

  <div class="col col-sm-5 col-md-5 col-bg-orange"></div>

  <div class="col col-sm-90 col-md-80 col-bg-black col-pad-1 col-bg-white">

    <ul class="page-nopag">

      <li class="item-1"></li>

      <li class="item-2"></li>

      <li class="">
        <h1 class="page-headline-nopag"><?php echo get_post_meta($post->ID,'eh_headline',true); ?></h1>
      </li>

    </ul>

  </div>

  <div class="col col-sm-5 col-md-15 col-bg-orange"></div>

</div>


<div id="page-content" class="row">

  <div class="col col-sm-5 col-md-15 col-bg-orange"></div>

  <div id="page-column" class="col col-sm-90 col-md-70 col-pad-1 col-bg-white">

    <div class="blog-center col-xs-100 col-sm-90 col-md-85 col-lg-80" id="post-content">

<?php if ( get_post_meta($post->ID,'eh_subhead') ) : ?>

      <p class="subhead">

<?php echo get_post_meta($post->ID,'eh_subhead',true); ?>

      </p>

<? endif; ?>

      <p>
        <?php the_content(); ?>
      </p>

      <div id="post-comments">
      <?php
      // If comments are open or at least one comment
      if ( comments_open() || get_comments_number() ) :
      comments_template();
      endif;
      ?>
      </div>

    </div>

  </div>

  <div class="col col-sm-5 col-md-15 col-bg-orange"></div>

</div><!-- end #page-content row -->
