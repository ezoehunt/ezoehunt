<?php
/**
* @package eztheme
*
* Content to be included on Single Words pages
*
*/
global $post;
?>

<div id="leftcol" class="col col-sm-5 col-md-15 bg-words"></div>


<div id="colmain" class="col col-sm-90 col-md-70 bg-white <?php echo 'post-';echo the_ID();?>">

  <div id="breadcrumb">
    <p class="page-breadcrumb">
      <a class="words" href="/" title="Return to home page">Home</a>
      &nbsp; / &nbsp;
      <a class="words" href="/<?php echo mygetcatslug($post->ID);?>" title="Go to <?php echo mygetcatname($post->ID);?> section"><?php echo mygetcatname($post->ID);?></a>
      &nbsp; / &nbsp;
      <?php echo get_the_title(); ?>
    </p>
  </div>


  <div id="page-title">

    <ul class="page-pagination">

      <li class="item-middle">
        <h1 class="page-headline"><?php echo get_post_meta($post->ID,'eh_headline',true); ?></h1>
      </li>
<?php
$myprev = mynextprevious($post->ID, 'previous');
$mynext = mynextprevious($post->ID, 'next');
?>
      <li class="item-left">
<?php
  if ( !empty( $myprev ) ) {
    echo $myprev;
  }
  else {
    echo '&nbsp;';
  }
?>
      </li>

      <li class="item-right">
<?php
  if ( !empty( $mynext ) ) {
    echo $mynext;
  }
  else {
    echo '&nbsp;';
  }
?>
      </li>

    </ul>

  </div>


  <div id="page-column">

    <div class="blog-center col-xs-100 col-sm-90 col-md-85 col-lg-80">

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

    </div><!-- end .blog-center -->

  </div><!-- end #page-column -->

</div><!-- end #colmain -->


<div id="rightcol" class="col col-sm-5 col-md-15 bg-words"></div>
