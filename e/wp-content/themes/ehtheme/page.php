<?php
/**
* @package ehtheme
*
* Based on Twentyseventeen Wordpress theme
*
* Main Index template for Pages (not post types)
*/

get_header(); ?>

<div id="main-content" class="main-content">

<?php
while ( have_posts() ) : the_post();

  get_template_part( 'template-parts/page/content', 'page' );

  // If comments are open or we have at least one comment, load up the comment template.
  if ( comments_open() || get_comments_number() ) :
    comments_template();
  endif;

endwhile; // End of the loop.
?>

</div><!-- end #main-content -->

<div id="main-footer">
  <?php get_footer(); ?>
</div><!-- end #main-footer -->

</div><!-- end #wrapper -->

<script src="<?php echo home_url('/js/application.min.js'); ?>"></script>

</body>
</html>
