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

<div id="page-breadcrumb" class="row row-40 <?php echo 'post-';echo the_ID();?>">
  <div class="col col-sm-5 col-md-15 col-bg-orange"></div>

  <div class="col col-sm-90 col-md-75 col-bg-white">

    <p class="page-breadcrumb">
      <a href="/" title="Return to home page">Home</a>
      &nbsp; / &nbsp;
      Page Not Found
    </p>

  </div>

  <div class="col col-sm-5 col-md-10 col-bg-orange"></div>
</div>


<div id="page-title" class="row row-120">

  <div class="col col-sm-5 col-md-5 col-bg-orange"></div>

  <div class="col col-sm-90 col-md-85 col-bg-black col-pad-1 col-bg-white">

    <ul class="page-nopag">

      <li class="item-1"></li>

      <li class="item-2"></li>

      <li class="item-3">
        <h1 class="page-headline-nopag">Oops...page not found...</h1>
      </li>

    </ul>

  </div>

  <div class="col col-sm-5 col-md-10 col-bg-orange"></div>

</div>


<div id="page-content" class="row">

  <div class="col col-sm-5 col-md-15 col-bg-orange"></div>

  <div id="page-column" class="col col-sm-90 col-md-75 col-pad-1 col-bg-white">

      <p>That page couldn't be found. Maybe try a search?</p>

      <?php get_search_form(); ?>

  </div>

  <div class="col col-sm-5 col-md-10 col-bg-orange"></div>

</div><!-- end #page-content row-->
