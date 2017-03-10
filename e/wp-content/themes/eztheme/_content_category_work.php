<?php
/**
* @package eztheme
*
* Content to be included on Work Category page
*/
?>

<?php
$args = array(
  'post_type'       =>  'work',
  'post_status'     =>  'publish',
  'posts_per_page'  =>  20,
  'orderby'         =>  'date',
  'order'           =>  'DESC'
);

$find = new WP_Query($args);
?>

<p id="breadcrumb" class="breadcrumb">
  <a href="/" title="Return to home page">Home</a>
  &nbsp; / &nbsp;
  Work
</p>

<div id="page-block" class="row page-block-bread">

  <h1 id="page-headline" class="col-12 <?php echo 'post-';echo the_ID();?>">Portfolio Projects</h1>

  <div id="grid-work">

<?php if ( $find->have_posts() ) : ?>

  <ul class="d-flex flex-row flex-wrap justify-content-between">

<?php while ( $find->have_posts() ) : $find->the_post(); ?>

<?php
// Get featured image
$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(400,400) );
$title = get_the_title();
?>

    <li class="">
      <a title="View project" href="<?php the_permalink() ?>">

        <img class="grid-image img-fluid" src="<?php echo $featuredImage[0];?>">

        <figcaption class="ez-caption">
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

  </div><!-- end #div-work -->

</div><!-- end #page-block -->
