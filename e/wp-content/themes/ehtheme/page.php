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

?>

<div id="content-wrapper" class="row">

<?php
while ( have_posts() ) : the_post();

get_template_part( 'content', 'page' );

endwhile;
?>

</div>
<!-- end #content-wrapper -->

<?php get_footer(); ?>

<script src="<?php echo home_url('/js/application.min.js'); ?>"></script>

</body>
</html>
