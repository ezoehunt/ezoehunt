<div id="leftcol" class="floatleft col col-sm-5 col-md-15 bg-home"></div>


<div id="maincol" class="col col-sm-90 col-md-70 bg-white">

  <div id="breadcrumb" class="bg-home"></div>

  <div id="page-title" class="<?php echo 'post-';echo the_ID();?>">
    <ul class="page-nopag">
      <li class="item-middle">
        <h1 class="page-headline-nopag">Thinker Maker Designer Doer</h1>
      </li>
    </ul>
  </div>

  <div id="page-column">

    <div id="blurb-about" class="subsection sub-about">
<?php
$argsabout = array(
  'post_type'       =>  'post',
  'name'            =>  'aside-about',
  'post_status'     =>  'publish',
  'posts_per_page'  =>  1
);
$findabout = new WP_Query($argsabout );
if ( $findabout->have_posts() ) :
  while ( $findabout->have_posts() ) : $findabout->the_post();
  echo the_content();
endwhile;
endif;
wp_reset_postdata();
?>
    </div>

    <div id="blurb-words" class="subsection">
      <?php include '_include-words.php'; ?>
    </div>

    <div id="blurb-work" class="subsection">
      <?php include '_include-portfolio.php'; ?>
    </div>

  </div>

</div><!-- end #maincol -->


<div id="rightcol" class="floatright col col-sm-5 col-md-15 bg-home"></div>
