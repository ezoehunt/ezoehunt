<?php
/**
* @package eztheme
*
* Content to be included on Words Category page
*
*/
global $post;

?>

<div id="leftcol" class="col col-sm-5 col-md-15 bg-words"></div>


<div id="maincol" class="col col-sm-90 col-md-70 bg-white">

  <div id="breadcrumb">
    <p class="page-breadcrumb">
      <a class="words" href="/" title="Return to home page">Home</a>
      &nbsp; / &nbsp;
      <?php echo mygetcatname($post->ID); ?>
    </p>
  </div>


  <div id="page-title">

    <ul class="page-nopag">
      <li class="item-middle">
        <h1 class="page-headline-nopag">Thinking About Things</h1>
      </li>
    </ul>

  </div>


  <div id="page-column">

    <div class="blog-center col-xs-100 col-sm-90 col-md-85 col-lg-80">

<?php if ( have_posts() ) :
$count_posts = $wp_query->found_posts;
?>

      <ul class="entries">

<?php while ( have_posts() ) : the_post();
$featured_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(400,400) );
?>

        <li <?php post_class('entry-foto'); ?> id="post-<?php the_ID(); ?>">

          <div class="col-sm-20 floatleft fotos fotos-img">
<?php
/* Use oldest post image
* Featured Image doesn't work with next/previous image links
*/
/*
$attachments = get_posts( array(
  'post_parent' => $post->ID,
  'post_type'       => 'attachment',
  'posts_per_page'  => 1,
  'orderby'         =>  'date',
  'order'           =>  'ASC',
) );
foreach ( $attachments as $attachment ) :
  $attach_image = wp_get_attachment_image_src($attachment->ID, array(400,400));
*/

// TRY THIS FOR WORK POSS
/*
$args = array(
	'post_type'   => 'attachment',
	'numberposts' => -1,
	'post_status' => 'any',
	'post_parent' => $post->ID,
	'exclude'     => get_post_thumbnail_id(),
);

$attachments = get_posts( $args );

if ( $attachments ) {
	foreach ( $attachments as $attachment ) {
		echo apply_filters( 'the_title', $attachment->post_title );
		the_attachment_link( $attachment->ID, false );
	}
}
*/

?>
            <a class="words" title="View <?php echo the_title(); ?>" href="<?php the_permalink(); ?>">
              <img title="Image of this post" src="<?php echo $featured_image[0];?>">
            </a>
          </div>
<?php //endforeach; ?>
          <div class="col-sm-80 floatleft fotos fotos-text">

            <p class="entry-meta">
              <?php echo get_the_date( 'j M Y' ); ?>
            </p>

            <p>
              <a class="words" title="View <?php echo get_post_meta($post->ID,'eh_headline',true); ?>" href="<?php the_permalink() ?>"><?php echo get_post_meta($post->ID,'eh_headline',true); ?></a>
            </p>

            <p class="entry-excerpt">
              <?php echo get_the_excerpt(); ?>
            </p>

          </div>

        </li>

<?php endwhile; ?>

      </ul>

<?php if ($count_posts > 10) : ?>
      <div id="list-pagination" class="pag-words">
        <?php echo mypaginate($wp_query); ?>
      </div>
<?php endif; ?>

<?php
wp_reset_postdata();
else : ?>

      <p><b>Sorry there are no posts right now !</b></p>

<?php endif; ?>

    </div><!-- end .blog-center -->

  </div><!-- end #pagecolumn -->

</div><!-- end #maincol -->


<div id="rightcol" class="col col-sm-5 col-md-15 bg-words"></div>
