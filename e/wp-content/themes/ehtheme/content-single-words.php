<?php
/**
* @package eztheme
*
* Content to be included on Single Words pages
*
*/
global $post;
$cat_slug = eh_get_cat_slug($post->ID);
$cat_name = eh_get_cat_name($post->ID);
?>

<div id="leftcol" class="col col-sm-5 col-md-15 bg-words"></div>


<div id="maincol" class="col col-sm-90 col-md-70 bg-white <?php echo 'post-';echo the_ID();?>">

  <div id="breadcrumb">
    <p class="page-breadcrumb">
      <a class="words" href="/" title="Return to home page">Home</a>
      &nbsp; / &nbsp;
      <a class="words" href="/<?php echo $cat_slug;?>" title="Go to <?php echo $cat_name;?> section"><?php echo $cat_name;?></a>
      &nbsp; / &nbsp;
      <?php echo get_the_title(); ?>
    </p>
  </div>


  <div id="page-title">

    <ul class="page-pagination">

      <li class="item-middle">
        <h1 class="page-headline"><?php echo get_post_meta($post->ID,'_blog_headline',true); ?></h1>
      </li>
<?php
$myprev = eh_next_previous($post->ID, 'previous', $cat_slug);
$mynext = eh_next_previous($post->ID, 'next', $cat_slug);
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

<?php if ( get_post_meta($post->ID,'_blog_subhead') ) : ?>
      <p class="subhead">
<?php echo get_post_meta($post->ID,'_blog_subhead',true); ?>
      </p>
<? endif; ?>

      <p class="entry-meta" style="text-align:right;">
        <?php echo the_date(); ?>
      </p>

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

</div><!-- end #maincol -->


<div id="rightcol" class="col col-sm-5 col-md-15 bg-words"></div>
