<?php
/**
* @package eztheme
* Home Page
*/

get_header();

?>

<!--
<div main content - same for all>
  <div about not visible on small>
  </div>
  <div home loop - includes border top on med only - loop is used on all other pages too>
    <div blurb - has margin bottom 2 rem blurb is used on SOME other pages>
    <div featured items has margintop 0 padding top 2rem with border top - wbordertop class for the border and the paddingtop>
  </div>
</div>
-->

<div id="main-content" class="main-content">

  <div id="blurb-about" class="hidden-sm-down subsection subsection-noborder">

    <?php include '_blurb_about.php'; ?>

  </div>

  <div id="page-block">

    <div id="blurb-work" class="subsection">
      <?php include '_blurb_work.php'; ?>
    </div>

    <div id="grid-work" class="subsection">
      <?php include '_loop_home.php'; ?>
    </div>

  </div>

</div>









<div id="main-footer">

<?php get_footer(); ?>

</div><!-- end #main-footer -->

</div><!-- end #wrapper -->

<script src="<?php echo home_url('/js/application.min.js'); ?>"></script>

<?php wp_footer(); ?>

</body>
</html>
