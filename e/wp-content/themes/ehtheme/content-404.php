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

<p id="breadcrumb" class="breadcrumb">
  <a href="/" title="Return to home page">Home</a>
  &nbsp; / &nbsp;
  Page not found
</p>

<div id="page-block" class="page-block-bread">

  <h1 id="page-headline" class="col-12">Oops! Page Not Found!</h1>

  <div id="page-content">
    <p>That page can't be found. Maybe try a search?</p>

    <?php get_search_form(); ?>

  </div>

</div>
