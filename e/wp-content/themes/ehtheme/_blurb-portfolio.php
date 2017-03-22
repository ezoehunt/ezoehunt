<?php
$args = array(
  'post_type'       =>  'work',
  'post_status'     =>  'publish',
  'project_tags'    =>  'featured-post',
  'posts_per_page'  =>  2,
  'orderby'         =>  'date',
  'order'           =>  'ASC'
);

$find = new WP_Query($args );
?>

<div class="row section-row">

  <h2 class="see-all col col-xs-100 col-sm-60">Recent Work</h2>

  <p class="see-all col col-xs-100 col-sm-40">
    <a class="home" title="See all Work" href="<?php echo esc_url( home_url('/work') ); ?>">see all Work <span class="link-raquo">&raquo;</span></a>
  </p>

</div>

<?php if ( $find->have_posts() ) : ?>

<ul class="gridit">

<?php
while ( $find->have_posts() ) : $find->the_post();
  $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(400,400) );
?>

  <li id="post-<?php the_ID(); ?>">
    <a class="home" title="View project" href="<?php the_permalink() ?>">

      <img class="grid-image" src="<?php echo $featuredImage[0];?>">

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

<?php endif; ?>
