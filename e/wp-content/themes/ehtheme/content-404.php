<?php
/**
* @package ehtheme
*
* Based on Twentyseventeen Wordpress theme
*
* 404 (not found) template
*
*/
?>


<div id="page-block">

  <p id="breadcrumb" class="breadcrumb">
    <a href="/" title="Return to home page">Home</a>
    &nbsp; / &nbsp;
    Page not found
  </p>

  <div id="page-content">

    <h1 id="page-headline" class="col-12">Oops...</h1>

    <div id="post-content">

      <p>That page couldn't be found. Maybe try a search?</p>

      <?php get_search_form(); ?>

    </div>

  </div><!-- end #page-content -->

</div><!-- end #page-block -->
