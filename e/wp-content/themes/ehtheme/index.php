<?php
/**
* @package ehtheme
*
* Based on Twentyseventeen Wordpress theme
*
* Main Index template
*
*/

get_header();

?>

  <div id="content-wrapper">

<?php
// Assign templates for all pages
/* Wordpress has already assigned page.php to page-type pages, so no need to assign them. */

//if ( in_array('home',$bodyclass) ) {
if ( is_front_page() ) {
  include 'content-home.php';
}

if ( is_single() ) {
  $cat_slug = mygetcatslug($post->ID);
  include 'content-single-'.$cat_slug.'.php';
}

if ( is_category() ) {
  $cat_slug = sluggify( single_cat_title('', false) );
  include 'content-cat-'.$cat_slug.'.php';
}

if ( is_404() ) {
  include 'content-404.php';
}

if ( is_search() ) {
  include 'search.php';
}
?>

  </div><!-- end #content-wrapper -->

<?php get_footer(); ?>

</div><!-- end #wrapper -->

<script src="<?php echo home_url('/js/application.min.js'); ?>"></script>

</body>
</html>
