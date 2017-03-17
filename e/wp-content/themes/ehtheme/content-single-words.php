<?php
/**
* @package eztheme
*
* Content to be included on Single Words pages
*
*/
global $post;
?>

<div id="page-breadcrumb" class="row row-40 <?php echo 'post-';echo the_ID();?>">
  <div class="col col-sm-5 col-md-15 col-bg-orange"></div>

  <div class="col col-sm-90 col-md-75 col-bg-white">

    <p class="page-breadcrumb">
      <a href="/" title="Return to home page">Home</a>
      &nbsp; / &nbsp;
      <a href="/<?php echo mygetcatslug($post->ID);?>" title="Go to <?php echo mygetcatname($post->ID);?> section"><?php echo mygetcatname($post->ID);?></a>
      &nbsp; / &nbsp;
      <?php echo get_the_title(); ?>
    </p>

  </div>

  <div class="col col-sm-5 col-md-10 col-bg-orange"></div>
</div>


<div id="page-title" class="row row-120">

  <div class="col col-sm-5 col-md-5 col-bg-orange"></div>

  <div class="col col-sm-90 col-md-85 col-bg-black col-pad-1 col-bg-white">

    <ul class="page-pagination">

      <li class="item-3">
        <h1 class="page-headline"><?php echo get_post_meta($post->ID,'eh_headline',true); ?></h1>
      </li>

      <li class="item-1">
        <?php
          if ( mynextprevious($post->ID, 'previous') ) {
            echo mynextprevious($post->ID, 'previous');
          }
          else {
            echo '&nbsp;';
          }
        ?>
      </li>

      <li class="item-2">
        <?php
          if ( mynextprevious($post->ID, 'next') ) {
            echo mynextprevious($post->ID, 'next');
          }
          else {
            echo '&nbsp;';
          }
        ?>
      </li>

    </ul>

  </div>

  <div class="col col-sm-5 col-md-10 col-bg-orange"></div>

</div>


<div id="page-content" class="row">

  <div class="col col-sm-5 col-md-15 col-bg-orange"></div>

  <div id="page-column" class="col col-sm-90 col-md-75 col-pad-1 col-bg-white">

    <div class="blog-center col-xs-100 col-sm-90 col-md-85 col-lg-80" id="post-content">

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>

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

<?php endwhile; ?>
<?php else : ?>
      <p>Sorry there are no posts right now !</p>
<?php endif; ?>

    </div>

  </div>

  <div class="col col-sm-5 col-md-10 col-bg-orange"></div>

</div><!-- end #page-content row -->
