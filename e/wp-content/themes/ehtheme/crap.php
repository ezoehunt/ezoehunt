<?php
/**
* @package eztheme
*
* Content to be included on Single Words pages
*
*/
global $post;
?>

<div id="colmain" class="col col-sm-90 col-md-70 bg-white <?php echo 'post-';echo the_ID();?>">

  <div id="breadcrumb">
    <p class="page-breadcrumb">
      <a href="/" title="Return to home page">Home</a>
      &nbsp; / &nbsp;
      <a href="/<?php echo mygetcatslug($post->ID);?>" title="Go to <?php echo mygetcatname($post->ID);?> section"><?php echo mygetcatname($post->ID);?></a>
      &nbsp; / &nbsp;
      <?php echo get_the_title(); ?>
    </p>
  </div>


  <div id="page-title">

    <ul class="page-pagination">

      <li class="item-1">

      </li>

      <li class="item-2">

      </li>

      <li class="item-middle">
        <h1 class="page-headline-nopag"><?php echo get_post_meta($post->ID,'eh_headline',true); ?></h1>
      </li>

    </ul>

  </div>


  <div id="page-column">

    <div class="blog-center col-xs-100 col-sm-90 col-md-85 col-lg-80">

      sdfsdkfjlsdjkf

    </div><!-- end .blog-center -->

  </div><!-- end #page-column -->

</div><!-- end #colmain -- >


<div id="leftcol" class="col col-sm-5 col-md-15 bg-turquoise"></div>


<div id="rightcol" class="col col-sm-5 col-md-15 bg-turquoise"></div>
