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

<div class="row">

  <h2 class="see-all col-xs-100 col-sm-60">Recent Work</h2>

  <p class="see-all col col-xs-100 col-sm-40"><a class="home" title="See all Work" href="<?php echo esc_url( home_url('/work') ); ?>">See all Work</a> <span class="link-raquo">&raquo;</span></p>

</div>

<div id="grid-home">

<?php if ( $find->have_posts() ) : ?>

  <ul class="d-flex flex-row flex-wrap justify-content-between">

<?php
while ( $find->have_posts() ) : $find->the_post();
  $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(400,400) );
?>

    <li>
      <a class="home" title="View project" href="<?php the_permalink() ?>">

        <img class="grid-image" src="<?php echo $featuredImage[0];?>">

        <figcaption class="grid-img-overlay">
          <p>
            <?php echo get_post_meta($post->ID,'project_details_headline',true); ?>
            <br/><span>&#8212; view project &#8212;</span>
          </p>
        </figcaption>

      </a>
    </li>

<?php endwhile; ?>
  </ul>
<?php endif; ?>
</div>
