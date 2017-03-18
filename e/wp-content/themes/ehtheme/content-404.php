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

<div id="colmain" class="col col-sm-90 col-md-70 bg-white">

  <div id="breadcrumb">
    <p class="page-breadcrumb">
      <a href="/" title="Return to home page">Home</a>
      &nbsp; / &nbsp;
      Page Not Found
    </p>
  </div>

  <div id="page-title">

    <ul class="page-nopag">
      <li class="item-middle">
        <h1 class="page-headline-nopag">Oops...page not found...</h1>
      </li>
    </ul>

  </div>

  <div id="page-column">

    <div class="blog-center col-xs-100 col-sm-90 col-md-85 col-lg-80">

      <p>That page couldn't be found. Maybe try a search?</p>

      <div style="width: 100%;">
        <?php get_search_form(); ?>
      </div>

    </div>

  </div>

</div><!-- end main column -->


<div id="leftcol" class="col col-sm-5 col-md-15 bg-other"></div>


<div id="rightcol" class="col col-sm-5 col-md-15 bg-other"></div>
