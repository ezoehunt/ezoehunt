<?php
/**
* @package eztheme
*
* Content to be included on Work Category page
*
*/
?>

<?php
$args = array(
  'post_type'       =>  'work',
  'post_status'     =>  'publish',
  'posts_per_page'  =>  20,
  'orderby'         =>  'date',
  'order'           =>  'ASC'
);
$find = new WP_Query($args);
?>

<div id="page-breadcrumb" class="row row-40 <?php echo 'post-';echo the_ID();?>">
  <div class="col col-sm-5 col-md-15 col-bg-orange"></div>

  <div class="col col-sm-90 col-md-75 col-bg-white">

    <p class="page-breadcrumb">
      <a href="/" title="Return to home page">Home</a>
      &nbsp; / &nbsp;
      <?php echo mygetcatname($post->ID);?>
    </p>

  </div>

  <div class="col col-sm-5 col-md-10 col-bg-orange"></div>
</div>


<div id="page-title" class="row row-120">

  <div class="col col-sm-5 col-md-5 col-bg-orange"></div>

  <div class="col col-sm-90 col-md-85 col-bg-black col-pad-1 col-bg-white">

    <ul class="page-nopag">
      <li class="item-1"></li>

      <li class="item-2"></li>

      <li class="item-3">
        <h1 class="page-headline-nopag">Making Things</h1>
      </li>
    </ul>

  </div>

  <div class="col col-sm-5 col-md-10 col-bg-orange"></div>

</div>


<div id="page-content" class="row">

  <div class="col col-sm-5 col-md-15 col-bg-orange"></div>

  <div id="page-column" class="col col-sm-90 col-md-75 col-pad-1 col-bg-white">

<?php if ( $find->have_posts() ) : ?>

    <ul class="grid-work">

<?php while ( $find->have_posts() ) : $find->the_post(); ?>

<?php
$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(400,400) );
$title = get_the_title();
?>
      <li <?php post_class(); ?> id="post-<?php the_ID(); ?>">
          <a title="View project" href="<?php the_permalink() ?>">

          <img class="grid-image" src="<?php echo $featuredImage[0];?>">

          <figcaption class="grid-img-overlay">
            <p><?php echo the_title(); ?>
            <br/><span>&#8212; view project &#8212;</span></p>
          </figcaption>

          </a>
        </li>

<?php endwhile; ?>

    </ul>

<?php else : ?>

    <p><b>No portfolio items to show right now !</b></p>

<?php endif; ?>

  </div>

  <div class="col col-sm-5 col-md-10 col-bg-orange"></div>

</div><!-- end #page-content row -->
