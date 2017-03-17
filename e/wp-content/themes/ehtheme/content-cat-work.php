<?php
/**
* @package eztheme
*
* Content to be included on Work Category page
*
*/
$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

$args = array(
  'post_type'       =>  'work',
  'category_name'   =>  'work',
  'post_status'     =>  'publish',
  'posts_per_page'  =>  2,
  'orderby'         =>  'date',
  'order'           =>  'ASC',
  'paged'           =>  $paged
);
$find = new WP_Query($args);
//var_dump($find);
?>

<div id="page-breadcrumb" class="row row-40 <?php echo 'post-';echo the_ID();?>">
  <div class="col col-sm-5 col-md-15 col-bg-orange"></div>

  <div class="col col-sm-90 col-md-75 col-bg-white">

    <p class="page-breadcrumb">
      <a href="/" title="Return to home page">Home</a>
      &nbsp; / &nbsp;
      <?php //echo mygetcatname($find->ID); ?>
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
        <h1 class="page-headline-nopag">Making Things</h1>
      </li>
    </ul>

  </div>

  <div class="col col-sm-5 col-md-10 col-bg-orange"></div>

</div>


<div id="page-content" class="row">

  <div class="col col-sm-5 col-md-15 col-bg-orange"></div>

  <div id="page-column" class="col col-sm-90 col-md-75 col-pad-1 col-bg-white">

    <div class="blog-center col-xs-100 col-sm-90 col-md-85 col-lg-80" id="post-content">

<?php if ( $find->have_posts() ) :
$count_posts = $find->found_posts;
?>

      <ul class="grid-work">

<?php while ( $find->have_posts() ) : $find->the_post(); ?>

<?php
$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(400,400) );
$title = get_the_title();
?>
        <li <?php post_class(); ?> id="post-<?php the_ID(); ?>">
          <a title="View project" href="<?php the_permalink() ?>">

          <img class="grid-image" src="<?php echo $featuredImage[0];?>">

          <figcaption class="grid-img-overlay">
            <p><?php echo the_title(); ?>
            <br/><span>&#8212; view project &#8212;</span></p>
          </figcaption>

          </a>
        </li>

<?php endwhile; ?>

      </ul>

<?php if ($count_posts > 3) : ?>
      <div id="list-pagination">
<?php
$big = 999999999;
$translated = __( 'Page', 'mytextdomain' );

echo paginate_links( array(
	'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
	'format' => '?paged=%#%',
	'current' => max( 1, get_query_var('paged') ),
	'total' => $find->max_num_pages,
        'before_page_number' => '<span class="screen-reader-text">'.$translated.' </span>'
) );
?>
      </div>
<?php endif; ?>

<?php
wp_reset_postdata();
else : ?>

      <p><b>Sorry there are no projects to show right now !</b></p>

<?php endif; ?>
    </div>

  </div>

  <div class="col col-sm-5 col-md-10 col-bg-orange"></div>

</div><!-- end #page-content row -->
