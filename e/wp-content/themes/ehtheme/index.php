<?php
/**
* @package ehtheme
*
* Based on Twentyseventeen Wordpress theme
*
* Main Index template
*
* Assign templates for all pages
* Wordpress has already assigned page.php to page-type pages, so no need to assign them.
* Wordpress has already assigned templates for archive pages.
*
*/

get_header();

//if ( in_array('home',$bodyclass) ) {
if ( is_front_page() ) {
  include 'content-home.php';
}

if ( is_single() ) {
  $cat_slug = eh_get_cat_slug($post->ID);
  include 'content-single-'.$cat_slug.'.php';
}

if ( is_category() ) {
  $cat_slug = eh_sluggify( single_cat_title('', false) );
  include 'content-cat-'.$cat_slug.'.php';
}

if ( is_404() ) {
  include 'content-404.php';
}

if ( is_search() ) {
  include 'search.php';
}

get_footer();

?>
