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

<div id="colmain" class="col col-sm-90 col-md-70 bg-white <?php echo 'post-';echo the_ID();?>">

  <div id="breadcrumb">
    <p class="page-breadcrumb">
      <a href="/" title="Return to home page">Home</a>
      &nbsp; / &nbsp;
      <?php echo get_the_title(); ?>
    </p>
  </div>

  <div id="page-title">

    <ul class="page-nopag">
      <!--li class="item-left"></li>

      <li class="item-right"></li-->

      <li class="item-middle">
        <h1 class="page-headline-nopag"><?php echo get_post_meta($post->ID,'eh_headline',true); ?></h1>
      </li>
    </ul>

  </div>

  <div id="page-column">

    <div class="blog-center col-xs-100 col-sm-90 col-md-85 col-lg-80">

      <?php if ( get_post_meta($post->ID,'eh_subhead') ) : ?>

      <p class="subhead">

      <?php echo get_post_meta($post->ID,'eh_subhead',true); ?>

      </p>

      <? endif; ?>

      <p><?php the_content(); ?></p>

      <div id="post-comments">
        <?php
        // If open comments or at least 1 comment
        if ( comments_open() || get_comments_number() ) :
        comments_template();
        endif;
        ?>
      </div>

    </div>

  </div>

</div><!-- end main column -->


<div id="leftcol" class="col col-sm-5 col-md-15 bg-turquoise"></div>


<div id="rightcol" class="col col-sm-5 col-md-15 bg-turquoise"></div>
