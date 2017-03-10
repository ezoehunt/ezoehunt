<?php
/**
* @package ehtheme
*
* Based on Twentyseventeen Wordpress theme
*
* Main Index template
*/

get_header();

?>

<div id="main-content" class="main-content">

<?php
// Assign templates for all pages

//if ( in_array('home',$bodyclass) ) {
if ( is_front_page() ) {
  include 'template-parts/post/content_home.php';
}

if ( is_single() ) {
  $cat_slug = mygetcatslug($post->ID);
  include '_content_single_'.$cat_slug.'.php';
}

if ( is_category() ) {
  $cat_slug = sluggify( single_cat_title('', false) );
  include '_content_category_'.$cat_slug.'.php';
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
