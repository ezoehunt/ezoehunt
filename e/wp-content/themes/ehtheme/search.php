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

  <p id="breadcrumb" class="breadcrumb">
    <a href="/" title="Return to home page">Home</a>
    &nbsp; / &nbsp;
    Search Results
  </p>

  <div id="page-block" class="row page-block-bread">

    <div id="page-content" class="page-content-search">

      <div style="margin-top:.5rem;width:100%;margin-bottom:1rem;">
        <?php get_search_form(); ?>
      </div>

<?php if ( have_posts() ) :
$count_posts = $wp_query->found_posts;
?>

      <h1 id="page-headline" class="col-12 page-headline-search" style="text-align:left !important;padding-left:0;padding-right:0;margin-bottom:.75rem;padding-top:.1rem;">
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

<?php while ( have_posts() ) : the_post(); ?>

      <article class="mysearch" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <?php the_date('','<p class="entry-meta">','</p>'); ?>

        <p class="entry-title">
          <?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?>
        </p>

        <p class="entry-excerpt">
          <?php echo get_the_excerpt(); ?>
        </p>

      </article>

<?php endwhile; ?>

      <div id="ezpagination">
<?php
the_posts_pagination( array(
  'prev_text'   => '<span class="screen-reader-text">' . __( 'Previous page', 'ehtheme' ) . '</span>',
  'next_text'   => '<span class="screen-reader-text">' . __( 'Next page', 'ehtheme' ) . '</span>',
	'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'ehtheme' ) . ' </span>',
) );
?>
      </div>

<?php else : ?>

			<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ehtheme' ); ?></p>

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
