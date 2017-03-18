  <?php
/**
* @package ehtheme
*
* Based on Twentyseventeen Wordpress theme
*
* Main Index template for Pages (not post types)
*
*/

get_header();

while ( have_posts() ) : the_post();

get_template_part( 'content', 'page' );

endwhile;

get_footer();

?>
