<?php
/**
* @package eztheme
* Home Page
*/

get_header();

?>

<div id="content-main" class="row">

  <?php include '_sidebar.php'; ?>

  <div id="main-column" class="col-md-8" style="border:1px solid red;">

    include home page content here

  </div><!-- end #main-column -->

</div><!-- end #content-main -->

<?php get_footer(); ?>
