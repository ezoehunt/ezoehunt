<?php
/**
* @package eztheme
* Home Page
*/

get_header();

?>

<div id="main-about" class="hidden-sm-down" style="border:1px solid blue;">

<?php include '_about_blurb.php'; ?>

</div><!-- end #main-about -->

<div id="main-content" class="" style="border:1px solid red;">

<?php include '_loop_home.php'; ?>

</div><!-- end #main-content -->

<div id="main-footer">

<?php get_footer(); ?>

</div><!-- end #main-footer -->

</div><!-- end #wrapper -->

<script src="<?php echo home_url('/js/application.min.js'); ?>"></script>

<?php wp_footer(); ?>

</body>
</html>
