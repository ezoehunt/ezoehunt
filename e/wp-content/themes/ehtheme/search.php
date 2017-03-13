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

<div id="main-content" class="main-content">

  <div id="page-block" class="row">

    <p id="breadcrumb" class="breadcrumb">
      <a href="/" title="Return to home page">Home</a>
      &nbsp; / &nbsp;
      Search Results
    </p>

    <div id="page-content" class="page-content-list">

      <div id="mysearch">
        <?php get_search_form(); ?>
      </div>

<?php if ( have_posts() ) :
$count_posts = $wp_query->found_posts;
?>

      <h1 id="page-headline" class="col-12 page-headline-search">
      <?php
        printf( _n( '%s result', '%s results', $count_posts, 'ehtheme' ), $count_posts );
        echo ' for <span class="search-query">' . get_search_query() . '</span></h1>';
      ?>

<?php else : ?>

      <h1 id="page-headline" class="col-12 page-headline-search" style="text-align:left !important;padding-left:0;padding-right:0;margin-bottom:.5rem;padding-top:.1rem;">
      <?php
        printf( __( 'No Results for %s', 'ehtheme' ), '<span class="search-query">' . get_search_query() . '</span></h1>' );
      ?>

<?php endif; ?>

<?php if ( have_posts() ) : ?>

      <ul class="entries">

<?php while ( have_posts() ) : the_post();
$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(400,400) );
?>

        <li class="row entry-foto" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="col-3 fotos fotos-img">
          <a href="<?php the_permalink(); ?>">
            <img class="img-fluid" src="<?php echo $featuredImage[0];?>">
          </a>
        </div>

        <div class="col-9 fotos fotos-text">
          <?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?>

          <br/><span class="entry-excerpt"><?php echo get_the_excerpt(); ?></span>
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

			<p>
        <?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ehtheme' ); ?>
      </p>

<?php endif; ?>

    </div><!-- end #page-content -->

  </div><!-- end #page-block -->
  
</div><!-- end #main-content -->

<div id="main-footer">
  <?php get_footer(); ?>
</div><!-- end #main-footer -->

</div><!-- end #wrapper -->

<script src="<?php echo home_url('/js/application.min.js'); ?>"></script>

</body>
</html>
