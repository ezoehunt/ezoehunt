<?php
/**
* @package ehtheme
*
* Based on Twentyseventeen Wordpress theme
*
* Archive Template for Custom Post Type = Work
*
*/
global $post;
$parent_id = wp_get_post_parent_id( $post->ID );

get_header();

?>

<div id="leftcol" class="col col-sm-5 col-md-15 bg-work"></div>


<div id="maincol" class="col col-sm-90 col-md-70 bg-white">

  <div id="breadcrumb">
    <p class="page-breadcrumb">
      <a class="work" href="/" title="Return to home page">Home</a>
      &nbsp; / &nbsp;
      Work
    </p>
  </div>


  <div id="page-title">

    <ul class="page-nopag">
      <li class="item-middle">
        <h1 class="page-headline-nopag">Making Things</h1>
      </li>
    </ul>

  </div>


  <div id="page-column">

    <div class="blog-center blog-grid col-xs-100 col-sm-90 col-md-85 col-lg-80">
<?php
$argswork = array(
  'post_type'       =>  'work',
  'post_status'     =>  'publish',
  'orderby'         =>  'meta_value_num',
  'meta_key'        =>  '_portfolio_display_order',
  'order'           =>  'ASC',
  /*  Exclude old or uninteresting projects - these have display order = "99"   */
  'meta_query' => array(
    array(
      'key' => '_portfolio_display_order',
      'value' => '99',
      'compare' => '!='
    )
  ),
);
$findwork = new WP_Query($argswork );

if ( $findwork->have_posts() ) :
$count_posts = $findwork->found_posts;
?>

      <ul class="entries">

        <li>
          <a class="work" title="View my resume" target="_blank" href="<?php echo home_url('/files/ehunt_resume.pdf'); ?>">View my resume &raquo;</a>
        </li>

<?php while ( $findwork->have_posts() ) : $findwork->the_post();

$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(400,400) );

$myterms = eh_exclude_from_taglist($post->ID, 'project_tags', array('featured-post'));

?>

        <li <?php post_class('entry-foto'); ?> id="post-<?php the_ID(); ?>">

          <div class="col col-xs-30 col-sm-40 floatleft fotos fotos-img">
            <a class="work" title="View <?php echo get_post_meta($post->ID,'_portfolio_headline',true); ?>" href="<?php the_permalink(); ?>">
              <img title="View <?php echo get_post_meta($post->ID,'_portfolio_headline',true); ?>" src="<?php echo $featuredImage[0];?>">
            </a>
          </div>

          <div class="col col-xs-70 col-sm-60 floatleft fotos fotos-text">

            <p>
              <a class="work" title="View <?php echo get_post_meta($post->ID,'_portfolio_headline',true); ?>" href="<?php the_permalink() ?>"><?php echo get_post_meta($post->ID,'_portfolio_headline',true); ?></a>
            </p>

            <p class="entry-excerpt hidden-xs-down">
              <?php echo get_the_excerpt(); ?>
            </p>

            <p class="entry-meta hidden-xs-down"><?php echo $myterms; ?></p>

          </div>

        </li>

<?php endwhile; ?>

      </ul>

<?php if ($count_posts > 10) : ?>
      <div id="list-pagination">
        <?php echo eh_paginate($wp_query); ?>
      </div>
<?php endif; ?>

<?php
wp_reset_postdata();
else : ?>

      <p>Sorry there are no projects to show right now !</p>

<?php endif; ?>

    </div><!-- end .blog-center -->

  </div><!-- end #pagecolumn -->

</div><!-- end #maincol -->


<div id="rightcol" class="col col-sm-5 col-md-15 bg-work"></div>


<?php get_footer(); ?>
