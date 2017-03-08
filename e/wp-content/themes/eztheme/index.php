<?php
/**
* @package eztheme
*
* Main Index Page
*/
?>

<?php get_header(); ?>

<div id="main-content" class="main-content">

<?php
// Assign templates for all pages except for
// Front Page, which is static

if ( is_single() ) {
  $post_categories = wp_get_post_categories( $post->ID );
  $cats = array();
  foreach ( $post_categories as $c ) {
    $cat = get_category( $c );
    $cat_slug = $cat->slug;
  }
  include '_content_single_'.$cat_slug.'.php';
}

if ( is_category() ) {
  $cat_slug = sluggify( single_cat_title('', false) );
  include '_content_category_'.$cat_slug.'.php';
}

if ( is_page('about') ) {
  include '_content_about.php';
}

if ( is_404() ) {
  include '_content_404.php';
}

/*if ( is_search() ) {
  include '_content_search_results.php';
}
*/

?>

</div><!-- end #main-content -->

<div id="main-footer">
  <?php get_footer(); ?>
</div><!-- end #main-footer -->

</div><!-- end #wrapper -->

<script src="<?php echo home_url('/js/application.min.js'); ?>"></script>

</body>
</html>
