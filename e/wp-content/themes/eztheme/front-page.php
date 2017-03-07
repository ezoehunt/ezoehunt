<?php
/**
* @package eztheme
* Home Page
*/

get_header();

?>

<div id="main-about" class="hidden-sm-down" style="border:1px solid blue;">

<?php include '_about_blurb.php'; ?>

</div>

<div id="main-content" class="" style="border:1px solid red;">

  include home page content here

</div><!-- end #content-main -->

<div id="main-footer">

<?php get_footer(); ?>

</div>

</div><!-- end #wrapper -->

<script src="<?php echo home_url('/js/application.min.js'); ?>"></script>

<?php wp_footer(); ?>

</body>
</html>
