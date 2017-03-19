<?php
$args = array(
  'post_type'       =>  'post',
  'post_status'     =>  'publish',
  'category_name'   =>  'words',
  'posts_per_page'  =>  1,
  'orderby'         =>  'date',
  'order'           =>  'DESC'
);

$find = new WP_Query($args );
?>

<div class="row section-row">

  <h2 class="see-all col col-xs-100 col-sm-60">Recent Thoughts</h2>

  <p class="see-all col col-xs-100 col-sm-40">
    <a class="work" title="See all Words" href="<?php echo esc_url( home_url('/words') ); ?>">see all Words <span class="link-raquo">&raquo;</span></a>
  </p>

</div>

<?php
if ( $find->have_posts() ) :
  while ( $find->have_posts() ) : $find->the_post();
  $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(400,400) );
?>

<p class="article-title">
  <a class="work" title="View <?php echo get_post_meta($post->ID,'eh_headline',true); ?>" href="<?php the_permalink() ?>">
    <?php echo get_post_meta($post->ID,'eh_headline',true); ?>
  </a>
</p>

<div class="row section-words" style="margin-top:-.5rem;">

  <p class="last">
    <a class="work" title="View <?php echo get_post_meta($post->ID,'eh_headline',true); ?>" href="<?php the_permalink() ?>">
      <img title="Featured image from this article" class="floatleft image-home" src="<?php echo $featuredImage[0];?>">
    </a>
    <?php echo get_the_excerpt(); ?>
    <br/>
    <span class="smaller-90"><a class="work" title="Continue reading this article" href="<?php the_permalink() ?>">{ continue reading }</a></span>
  </p>

</div>

<?php
endwhile;
endif;
?>
