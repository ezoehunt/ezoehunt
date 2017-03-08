<?php
/**
* @package eztheme
* Home Page
*/

get_header();

?>

<div id="main-content" class="main-content">

  <div id="page-block" class="page-block-lesspad">

    <div id="blurb-about" class="subsection">
      <?php include '_blurb_about.php'; ?>
    </div>

    <div id="blurb-work" class="subsection">
      <?php include '_blurb_work.php'; ?>
    </div>

    <div id="grid-image" class="subsection">
      <?php include '_loop_home.php'; ?>
    </div>

  </div>

</div>









<div id="main-footer">

<?php get_footer(); ?>

</div><!-- end #main-footer -->

</div><!-- end #wrapper -->

<script src="<?php echo home_url('/js/application.min.js'); ?>"></script>

<script src="<?php echo home_url('/js/holder.js'); ?>"></script>

<?php wp_footer(); ?>

</body>
</html>
