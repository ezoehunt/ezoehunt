<?php
/**
* @package ehtheme
*
* Based on Twentyseventeen Wordpress theme
*
* Content Template for Pages (not post types)
*
*/
//global $post;
?>

<style>

.testit {
  display: flex;
  height: 100%; /* 1, 3 */
  flex-direction: column;
}

.HolyGrail-header,
.HolyGrail-footer {
  flex: none; /* 2 */
}

.HolyGrail-body {
  /*display: flex;
  /*flex: 1;
  min-height: 100%;

  flex-direction: row;
  /*padding: var(--space); */
  display: flex;
  flex: 1 0 auto; /* 2 */;
  flex-direction: row;
}

.HolyGrail-content {
  /*flex: 1;*/
  /*flex: 1 0 auto;*/
  flex-grow: 1;
  flex-shrink: 1;
  flex-basis: auto;
}

.HolyGrail-nav, .HolyGrail-ads {
  /* 12em is the width of the columns */
  flex: 10%;
}
.HolyGrail-nav {
  order: 1;
}
.HolyGrail-content {
  /* put the nav on the left */
  order: 2;
  width: 80%;
}
.HolyGrail-ads {
  order: 3;
}


</style>



<?php get_header(); ?>

<div class="HolyGrail-body">

  <div class="HolyGrail-content" style="background-color:red;">
    main column here main column here main column here main column here main column here main column here main column here main column here
  </div>

  <div class="HolyGrail-nav" style="background-color:blue;">
    side left
  </div>

  <div class="HolyGrail-ads" style="background-color:yellow;">
    side right
  </div>
</div>

<!--footer class="" style="background-color:pink;">
  foooter here
</footer-->
