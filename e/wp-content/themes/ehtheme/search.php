<?php
/**
* @package ehtheme
*
* Based on Twentyseventeen Wordpress theme
*
* Search Results template
*
*/

get_header();

?>

  <div id="content-wrapper">

    <div id="page-breadcrumb" class="row row-40">

      <div class="col col-sm-5 col-md-15 col-bg-orange"></div>

      <div class="col col-sm-90 col-md-75">

        <p class="page-breadcrumb">
          <a href="/" title="Return to home page">Home</a>
          &nbsp; / &nbsp;
          Search Results
        </p>

      </div>

      <div class="col col-sm-5 col-md-10 col-bg-orange"></div>
    </div>


    <div id="page-title" class="row row-120">

      <div class="col col-sm-5 col-md-5 col-bg-orange"></div>

      <div class="col col-sm-90 col-md-85 col-bg-black col-pad-1">

        <ul class="page-pagination">
          <li class="item-1"></li>

          <li class="item-2"></li>

          <li class="item-3">

<?php if ( have_posts() ) :
$count_posts = $wp_query->found_posts;
?>

            <h1 class="page-headline">
<?php
  printf( _n( '%s result', '%s results', $count_posts, 'ehtheme' ), $count_posts );
  echo ' for <br/><span class="search-query">' . get_search_query() . '</span></h1>';
?>
            </h1>

<?php else : ?>

            <h1 class="page-headline">
<?php
  printf( __( 'No Results for<br/>%s', 'ehtheme' ), '<span class="search-query">' . get_search_query() . '</span>' );
?>
            </h1>

<?php endif; ?>

          </li>
        </ul>

      </div>

      <div class="col col-sm-5 col-md-10 col-bg-orange"></div>

    </div>


    <div id="page-content" class="row">

      <div class="col col-sm-5 col-md-15 col-bg-orange"></div>

      <div id="page-column" class="col col-sm-90 col-md-75 col-pad-1">

<?php if ( have_posts() ) : ?>

        <div id="mysearch">
          <?php get_search_form(); ?>
        </div>

        <ul class="entries">

<?php while ( have_posts() ) : the_post();
$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(400,400) );
?>

        <li <?php post_class('entry-foto'); ?> id="post-<?php the_ID(); ?>">

          <div class="col-sm-20 fotos fotos-img">
            <a title="View <?php echo the_title(); ?>" href="<?php the_permalink(); ?>">
              <img src="<?php echo $featuredImage[0];?>">
            </a>
          </div>

          <div class="col-sm-80 floatright fotos fotos-text">
            <p>
              <a title="View <?php echo the_title(); ?>" href="<?php the_permalink() ?>"><?php echo get_the_title(); ?></a>
            </p>

            <p class="entry-excerpt">
              <?php echo get_the_excerpt(); ?>
            </p>

          </div>

        </li>

<?php endwhile; ?>

      </ul>

<?php if ($count_posts > 10) : ?>

      <div id="ezpagination">

<?php
the_posts_pagination( array(
  'prev_text'   => '<span class="screen-reader-text">' . __( 'Previous page', 'ehtheme' ) . '</span>',
  'next_text'   => '<span class="screen-reader-text">' . __( 'Next page', 'ehtheme' ) . '</span>',
	'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'ehtheme' ) . ' </span>',
) );
?>

      </div>

<?php endif; ?>

<?php else : ?>

			<p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>

<?php endif; ?>

    </div><!-- end #page-column -->

    <div class="col col-sm-5 col-md-10 col-bg-orange"></div>

  </div><!-- end #content-wrapper -->

  <?php get_footer(); ?>

</div><!-- end #wrapper -->

<script src="<?php echo home_url('/js/application.min.js'); ?>"></script>

</body>
</html>
