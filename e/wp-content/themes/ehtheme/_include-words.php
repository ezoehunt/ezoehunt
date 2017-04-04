<?php
$argswords = array(
  'post_type'       =>  'post',
  'post_status'     =>  'publish',
  'category_name'   =>  'words',
  'posts_per_page'  =>  1,
  'orderby'         =>  'date',
  'order'           =>  'DESC'
);
$findwords = new WP_Query($argswords );
?>

<div class="row section-row">

  <h2 class="see-all col col-xs-100 col-sm-60">Recent Words</h2>

  <p class="see-all col col-xs-100 col-sm-40">
    <a class="home" title="See all Words" href="<?php echo esc_url( home_url('/words') ); ?>">see all Words <span class="link-raquo">&raquo;</span></a>
  </p>

</div>

<?php
if ( $findwords->have_posts() ) : ?>

<ul class="entries entries-home">

<?php
while ( $findwords->have_posts() ) : $findwords->the_post();
  $featuredWordsImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(400,400) );
?>

  <li <?php post_class('entry-foto'); ?> id="post-<?php the_ID(); ?>">

    <div class="col col-xs-30 col-sm-40 floatleft fotos fotos-img">
      <a class="words" title="View <?php echo get_post_meta($post->ID,'_blog_headline',true); ?>" href="<?php the_permalink(); ?>">
        <img title="View <?php echo get_post_meta($post->ID,'_blog_headline',true); ?>" src="<?php echo $featuredWordsImage[0];?>">
      </a>
    </div>

    <div class="col col-xs-70 col-sm-60 floatleft fotos fotos-text">

      <p>
        <a class="words" title="View <?php echo get_post_meta($post->ID,'_portfolio_headline',true); ?>" href="<?php the_permalink() ?>"><?php echo get_post_meta($post->ID,'_blog_headline',true); ?></a>
      </p>

      <p class="entry-excerpt hidden-xs-down">
        <?php echo get_the_excerpt(); ?>
      </p>

    </div>

</li>


<?php endwhile; ?>

</ul>

<?php
endif;
wp_reset_postdata();
?>
