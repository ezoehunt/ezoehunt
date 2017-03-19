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
    <ul class="grid-home">

      <li class="grid-col-home">
        <div id="home-about" class="grid-item-home grid-colspan-home">
          <?php include '_blurb-about.php'; ?>
        </div>
      </li>

      <li class="grid-col-home">
        <div id="home-words" class="grid-item-home">
          <?php include '_blurb-words.php'; ?>
        </div>

        <div id="home-work" class="grid-item-home">
          <?php include '_blurb-work.php'; ?>
        </div>
      </li>

    </ul>
  </div>

</div><!-- end #maincol -->


<div id="rightcol" class="floatright col col-sm-5 col-md-15 bg-home"></div>
