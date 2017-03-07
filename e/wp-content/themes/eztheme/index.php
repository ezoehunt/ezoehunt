<?php
/**
* @package eztheme
*/

get_header();

?>

<div id="content-main" class="row">

  <?php include '_sidebar.php'; ?>

  <div id="main-column" class="col-md-8" style="border:1px solid red;">

    include archive or single content here based on urls and such

  </div><!-- end #main-column -->

</div><!-- end #content-main -->

<?php get_footer(); ?>
