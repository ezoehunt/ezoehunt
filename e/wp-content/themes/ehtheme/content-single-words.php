<?php
/**
* @package eztheme
*
* Content to be included on Single Words pages
*
*/
global $post;
?>

<p id="breadcrumb" class="breadcrumb">
  <a href="/" title="Return to home page">Home</a>
  &nbsp; / &nbsp;
  <a href="/words" title="Go to <?php echo mygetcatname($post->ID);?> section"><?php echo mygetcatname($post->ID);?></a>
  &nbsp; / &nbsp;
  <?php echo get_the_title(); ?>
</p>

<div id="page-block" class="row page-block-bread">

  <div id="page-content">

<?php if ( have_posts() ) : ?>

<?php while ( have_posts() ) : the_post(); ?>

  <div id="single-header" class="row">

    <div class="col-6 col-sm-1 myprevious">
      <?php
        if ( mynextprevious($post->ID, 'previous') ) {
            echo mynextprevious($post->ID, 'previous');
        }
        else {
          echo '&nbsp;';
        }
      ?>
    </div>

    <div class="col-6 col-sm-1 push-sm-10 mynext">
      <?php
        if ( mynextprevious($post->ID, 'next') ) {
            echo mynextprevious($post->ID, 'next');
        }
        else {
          echo '&nbsp;';
        }
      ?>
    </div>

    <h1 id="page-headline" class="col-12 col-sm-10 pull-sm-1 <?php echo 'post-';echo the_ID();?>"><?php echo get_the_title(); ?></h1>

  </div>

  <div>
    <?php the_content(); ?>
  </div>

<?php
// If comments are open or at least one comment
if ( comments_open() || get_comments_number() ) :
	comments_template();
endif;
?>

<?php endwhile; ?>

<?php else : ?>

<p>Sorry there are no posts right now !</p>

<?php endif; ?>

  </div><!-- end #page-content -->

</div><!-- end #page-block -->
