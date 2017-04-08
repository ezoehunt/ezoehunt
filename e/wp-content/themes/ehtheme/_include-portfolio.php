<?php
$argswork = array(
  'post_type'       =>  'work',
  'post_status'     =>  'publish',
  'project_tags'    =>  'featured-post',
  'posts_per_page'  =>  2,
  'orderby'         =>  'meta_value_num',
  'meta_key'        =>  '_portfolio_display_order',
  'order'           =>  'DESC',
  /*  Exclude old or uninteresting projects - these have display order = "99"   */
  'meta_query' => array(
    array(
      'key' => '_portfolio_display_order',
      'value' => 'NULL',
      'compare' => '!='
    )
  )
);
$findwork = new WP_Query($argswork );
?>

<div class="row section-row">

  <h2 class="see-all col col-xs-100 col-sm-60">Recent Work</h2>

  <p class="see-all col col-xs-100 col-sm-40">
    <a class="home" title="See all Work" href="<?php echo esc_url( home_url('/work') ); ?>">see all Work <span class="link-raquo">&raquo;</span></a>
  </p>

</div>

<?php if ( $findwork->have_posts() ) : ?>

<ul class="entries">

<?php
while ( $findwork->have_posts() ) : $findwork->the_post();
  $featuredWorkImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(400,400) );
?>

  <li <?php post_class('entry-foto'); ?> id="post-<?php the_ID(); ?>">

    <div class="col col-xs-30 col-sm-40 floatleft fotos fotos-img">
      <a class="work" title="View <?php echo get_post_meta($post->ID,'_portfolio_headline',true); ?>" href="<?php the_permalink(); ?>">
        <img title="View <?php echo get_post_meta($post->ID,'_portfolio_headline',true); ?>" src="<?php echo $featuredWorkImage[0];?>">
      </a>
    </div>

    <div class="col col-xs-70 col-sm-60 floatleft fotos fotos-text">

      <p>
        <a class="work" title="View <?php echo get_post_meta($post->ID,'_portfolio_headline',true); ?>" href="<?php the_permalink() ?>"><?php echo get_post_meta($post->ID,'_portfolio_headline',true); ?></a>
      </p>

      <p class="entry-excerpt hidden-xs-down">
        <?php echo get_the_excerpt(); ?>
      </p>

    </div>

  </li>

<?php endwhile; ?>

</ul>

<?php endif;
wp_reset_postdata();
?>
