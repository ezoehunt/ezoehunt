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

  <h2 class="see-all col col-xs-100 col-sm-60">Recent Thoughts</h2>

  <p class="see-all col col-xs-100 col-sm-40">
    <a class="home" title="See all Words" href="<?php echo esc_url( home_url('/words') ); ?>">see all Words <span class="link-raquo">&raquo;</span></a>
  </p>

</div>

<?php
if ( $findwords->have_posts() ) :
  while ( $findwords->have_posts() ) : $findwords->the_post();
  $featuredWordsImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(400,400) );
?>

<p class="article-title">
  <a class="home" title="View <?php echo get_post_meta($post->ID,'_blog_headline',true); ?>" href="<?php the_permalink() ?>">
    <?php echo get_post_meta($post->ID,'_blog_headline',true); ?>
  </a>
</p>

<div class="row section-words" style="margin-top:-.5rem;">

  <p class="last">
    <a class="work" title="View <?php echo get_post_meta($post->ID,'_blog_headline',true); ?>" href="<?php the_permalink() ?>">
      <img title="Featured image from this article" class="floatleft image-home" src="<?php echo $featuredWordsImage[0];?>">
    </a>
    <?php echo get_the_excerpt(); ?>
    <br/>
    <span class="smaller-90"><a class="home" title="Continue reading this article" href="<?php the_permalink() ?>">{ continue reading }</a></span>
  </p>

</div>

<?php
endwhile;
endif;
wp_reset_postdata();
?>
