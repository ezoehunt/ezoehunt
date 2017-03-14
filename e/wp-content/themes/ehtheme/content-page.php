<?php
/**
* @package ehtheme
*
* Based on Twentyseventeen Wordpress theme
*
* Content Template for Pages (not post types)
*
*/
?>

<!-- breadcrumb -->
<div class="testrow" style="height:40px;">

  <div id="" class="testdiv" style="width:20%;border:2px solid blue;">
  </div>

  <div id="" class="testdiv" style="width:60%;border:2px solid blue;background-color:#FFFFFF;">

    <p id="breadcrumb" class="newbreadc">
      <a href="/" title="Return to home page">Home</a>
      &nbsp; / &nbsp;
      <?php the_title(); ?>
    </p>

  </div>

  <div id="" class="testdiv" style="width:20%;border:2px solid blue;">
  </div>

</div>


<!-- title + pagination -->
<div class="testrow" style="">

  <div id="" class="testdiv" style="width:10%;border:2px solid blue;">
  </div>

  <div id="" class="testdiv" style="width:60%;border:2px solid blue;background-color:black;padding:1rem;">

    <h1 id="" style="color:white;text-align:center;margin:0 auto 0 auto;text-transform:none;font-size:1.35rem !important;line-height:1.5rem;font-weight: 500;" class="tmpit <?php echo 'post-';echo the_ID();?>"><?php //the_title();?>A New Way to Travel with American Express and more and more and more and more and more</h1>

  </div>

  <div id="" class="testdiv" style="width:10%;border:2px solid blue;background-color:#FFFFFF;font-size:.85rem;text-align:center;line-height:1;">

      <p style="position:absolute;top:.5rem;left:.5rem;border:1px solid red;">
        <span style="">&laquo; next</span>
      </p>
      <p style="margin-bottom:0;border:1px solid red;position:absolute;bottom:.5rem;right:.5rem;">previous &raquo;</p>

      <!--i style="position: relative;top: 50%;transform: translateY(-50%);" class="fa fa-arrow-circle-left" aria-hidden="true"></i>
      &nbsp;&nbsp;<i style="position: relative;top: 50%;transform: translateY(-50%);" class="fa fa-arrow-circle-right" aria-hidden="true"></i-->

  </div>

  <div id="" class="testdiv" style="width:20%;border:2px solid blue;">
  </div>

</div>


<!-- controls -->
<div class="testrow" style="">

  <div id="" class="testdiv" style="width:20%;border:2px solid blue;">
  </div>

  <div id="" class="testdiv" style="width:30%;border:2px solid blue;background-color:fuchsia;color:black;text-align:center;padding:.25rem;">
    Viewing Design
  </div>

  <div id="" class="testdiv" style="width:30%;border:2px solid blue;background-color:white;color:fuchsia;text-align:center;padding:.25rem;">
    Switch to Process
  </div>

  <div id="" class="testdiv" style="width:20%;border:2px solid blue;">
  </div>

</div>


<!-- title content -->
<div class="testrow post-content-row" style="">

  <div id="" class="testdiv" style="width:20%;">
  </div>

  <div id="" class="testdiv" style="width:70%;background-color:yellow;padding:.5rem;"><!--call this content-block-->

    <div id="post-content" style="width:">
      <p>Club Wedd Home Page - Logged Out</p>
    </div>

  </div>

  <div id="" class="testdiv" style="width:10%;">
  </div>

</div>


<!-- content -->
<div class="testrow post-content-row" style="">

  <div id="" class="testdiv" style="width:20%;">
  </div>

  <div id="" class="testdiv" style="width:60%;background-color:#FFFFFF;padding: 1rem 2rem 1rem 2rem;"><!--call this content-block-->

    <div id="post-content" style="width:">
      <p><?php the_content();?></p>
    </div>

  </div>

  <div id="" class="testdiv" style="width:20%;">
  </div>

</div>
