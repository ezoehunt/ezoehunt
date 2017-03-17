<?php
$args = array(
  'post_type'       =>  'work',
  'post_status'     =>  'publish',
  'project_tags'    =>  'featured',
  'posts_per_page'  =>  2,
  'orderby'         =>  'date',
  'order'           =>  'ASC'
);

$find = new WP_Query($args );
?>

<div id="grid-home">

  <?php include '_blurb-portfolio-txt.php'; ?>

<?php if ( $find->have_posts() ) : ?>

  <ul class="d-flex flex-row flex-wrap justify-content-between">

<?php while ( $find->have_posts() ) : $find->the_post();

// Get featured image
$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(400,400) );
$title = get_the_title();
?>

    <li>
      <a title="View project" href="<?php the_permalink() ?>">

        <img class="grid-image img-fluid" src="<?php echo $featuredImage[0];?>">

        <figcaption class="grid-img-overlay">
          <p>
            <?php echo the_title(); ?>
            <br/><span>&#8212; view project &#8212;</span>
          </p>
        </figcaption>

      </a>
    </li>

<?php endwhile; ?>
  </ul>

<?php else : ?>
<p><b>No portfolio items to show right now !</b></p>

<?php endif; ?>

</div>
