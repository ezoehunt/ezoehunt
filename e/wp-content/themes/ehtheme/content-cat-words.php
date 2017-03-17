<?php
/**
* @package eztheme
*
* Content to be included on Words Category page
*
*/
global $post;
?>

<div id="page-breadcrumb" class="row row-40 <?php echo 'post-';echo the_ID();?>">
  <div class="col col-sm-5 col-md-15 col-bg-orange"></div>

  <div class="col col-sm-90 col-md-75 col-bg-white">

    <p class="page-breadcrumb">
      <a href="/" title="Return to home page">Home</a>
      &nbsp; / &nbsp;
      <?php echo mygetcatname($post->ID); ?>
    </p>

  </div>

  <div class="col col-sm-5 col-md-10 col-bg-orange"></div>
</div>


<div id="page-title" class="row row-120">

  <div class="col col-sm-5 col-md-5 col-bg-orange"></div>

  <div class="col col-sm-90 col-md-85 col-bg-black col-pad-1 col-bg-white">

    <ul class="page-nopag">
      <li class="item-1"></li>

      <li class="item-2"></li>

      <li class="item-3">
        <h1 class="page-headline-nopag">Thinking About Things</h1>
      </li>
    </ul>

  </div>

  <div class="col col-sm-5 col-md-10 col-bg-orange"></div>

</div>


<div id="page-content" class="row">

  <div class="col col-sm-5 col-md-15 col-bg-orange"></div>

  <div id="page-column" class="col col-sm-90 col-md-75 col-pad-1 col-bg-white">

    <div class="blog-center col-xs-100 col-sm-90 col-md-85 col-lg-80" id="post-content">

<?php if ( have_posts() ) :
$count_posts = $wp_query->found_posts;
?>

      <ul class="entries">

<?php while ( have_posts() ) : the_post();
$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(400,400) );
?>

        <li <?php post_class('entry-foto'); ?> id="post-<?php the_ID(); ?>">

          <div class="col-sm-20 floatleft fotos fotos-img">
            <a title="View <?php echo the_title(); ?>" href="<?php the_permalink(); ?>">
              <img title="Image of this post" src="<?php echo $featuredImage[0];?>">
        	  </a>
          </div>

          <div class="col-sm-80 floatleft fotos fotos-text">

            <p class="entry-meta">
              <?php echo get_the_date( 'j M Y' ); ?>
            </p>

            <p>
              <a title="View <?php echo get_post_meta($post->ID,'eh_headline',true); ?>" href="<?php the_permalink() ?>"><?php echo get_post_meta($post->ID,'eh_headline',true); ?></a>
            </p>

            <p class="entry-excerpt">
              <?php echo get_the_excerpt(); ?>
            </p>

          </div>

        </li>

<?php endwhile; ?>

      </ul>

<?php else : ?>

      <p>Sorry there are no posts right now !</p>

<?php endif; ?>

<?php if ($count_posts > 10) : ?>
      <div id="list-pagination">
<?php
$big = 999999999;
$translated = __( 'Page', 'mytextdomain' );

echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $wp_query->max_num_pages,
        'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
) );
?>
      </div>
<?php endif; ?>

    </div>

  </div>

  <div class="col col-sm-5 col-md-10 col-bg-orange"></div>

</div><!-- end #page-content row-->
