<?php
$args = array(
  'post_type'       =>  'work',
  'post_status'     =>  'publish',
  'posts_per_page'  =>  6,
  'orderby'         =>  'date',
  'order'           =>  'DESC'
);

$find = new WP_Query($args );
?>

<div class="grid-home">

  <?php include '_blurb_portfolio.php'; ?>

<?php if ( $find->have_posts() ) : ?>

  <ul class="d-flex flex-row flex-wrap justify-content-between">

<?php while ( $find->have_posts() ) : $find->the_post();

// Get featured image
$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(400,400) );
$title = get_the_title();
?>

    <li>
      <a href="<?php echo $post->ID; ?>">
        <img class="grid-image img-fluid" src="<?php echo $featuredImage[0];?>">
      </a>
    </li>

<?php endwhile; ?>
  </ul>

<?php else : ?>
<p><b>No portfolio items to show right now !</b></p>

<?php endif; ?>

</div>
