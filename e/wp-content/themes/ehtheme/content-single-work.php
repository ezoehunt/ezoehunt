<?php
/**
* @package eztheme
*
* Content to be included on Single Work pages
*
*/
global $post;
?>

<div id="page-breadcrumb" class="row row-40 <?php echo 'post-';echo the_ID();?>">
  <div class="col col-20"></div>

  <div class="col col-60 col-bg-white">
    <p class="page-breadcrumb">
      <a href="/" title="Return to home page">Home</a>
      &nbsp; / &nbsp;
      <a href="/<?php echo mygetcatslug($post->ID);?>" title="Go to <?php echo mygetcatname($post->ID);?> section"><?php echo mygetcatname($post->ID);?></a>
      &nbsp; / &nbsp;
      <?php echo get_the_title(); ?>
    </p>
  </div>

  <div class="col col-20"></div>
</div>


<div id="page-title" class="row"><!-- was 90px height -->
  <div class="col col-10"></div>

  <div class="col col-60 col-bg-black col-pad-1">
    <p class="arrows-np floatleft col-10">
      <?php
        if ( mynextprevious($post->ID, 'previous') ) {
            echo mynextprevious($post->ID, 'previous');
            // . "<span style='font-size:.9rem;color:white;'>previous project</span>";
        }
        else {
          echo '&nbsp;';
        }
      ?>
    </p>

    <h1 class="page-headline floatleft col-80 <?php echo 'post-';echo the_ID();?>"><?php the_title();?>A New Way to Travel with American Express and more and more and more and more and more</h1>

    <p class="arrows-np floatright alignright col-10">
      <?php
        if ( mynextprevious($post->ID, 'next') ) {
            //echo "<span style='font-size:.9rem;color:white;'>next project</span>" .
            echo mynextprevious($post->ID, 'next');
        }
        else {
          echo '&nbsp;';
        }
      ?>
  </p>
  </div>

  <div class="col col-10 col-bg-white"></div>
  <div class="col col-20">
  </div>
</div>




<div id="page-title" class="row"><!-- was 90px height -->
  <div class="col col-10"></div>

  <div class="col col-70 col-bg-black col-pad-1">

    <h1 id="" style="color:white;text-align:center;margin:0 auto 0 auto;text-transform:none;font-size:1.35rem !important;line-height:1.5rem;font-weight:500;position: relative;top: 50%;transform: translateY(-50%);" class="tmpit <?php echo 'post-';echo the_ID();?>"><?php echo get_post_meta($post->ID,'project_details_headline',true); ?></h1>

    <p style="margin-bottom:0;position:absolute;top:50%;transform: translateY(-50%);left:.5rem;">
      <?php
        if ( mynextprevious($post->ID, 'previous') ) {
            echo mynextprevious($post->ID, 'previous') . "<span style='font-size:.9rem;'>previous project</span>";
        }
        else {
          echo '&nbsp;';
        }
      ?>
    </p>

    <p style="margin-bottom:0;position:absolute;top:50%;transform: translateY(-50%);right:.5rem;">
      <?php
        if ( mynextprevious($post->ID, 'next') ) {
            echo "<span style='font-size:.9rem;'>next project</span>" . mynextprevious($post->ID, 'next');
        }
        else {
          echo '&nbsp;';
        }
      ?>
    </p>
  </div>

  <div class="col col-20">
  </div>
</div>





<!--div id="mytitle" class="row" style="">

  <div id="" class="col-md-1" style="">
  </div>

  <div id="" class="col-md-7" style="height:90px;background-color:black;">

    <h1 id="" style="color:white;text-align:center;margin:0 auto 0 auto;text-transform:none;font-size:1.35rem !important;line-height:1.5rem;font-weight:500;position: relative;top: 50%;transform: translateY(-50%);" class="tmpit <?php echo 'post-';echo the_ID();?>"><?php echo get_post_meta($post->ID,'project_details_headline',true); ?></h1>

    <p style="margin-bottom:0;position:absolute;top:50%;transform: translateY(-50%);left:.5rem;">
      <?php
        if ( mynextprevious($post->ID, 'previous') ) {
            echo mynextprevious($post->ID, 'previous') . "<span style='font-size:.9rem;'>previous project</span>";
        }
        else {
          echo '&nbsp;';
        }
      ?>
    </p>

    <p style="margin-bottom:0;position:absolute;top:50%;transform: translateY(-50%);right:.5rem;">
      <?php
        if ( mynextprevious($post->ID, 'next') ) {
            echo "<span style='font-size:.9rem;'>next project</span>" . mynextprevious($post->ID, 'next');
        }
        else {
          echo '&nbsp;';
        }
      ?>
  </p>

</div-->

  <!--div id="" class="col-md-2" style="background-color:#FFFFFF;font-size:1.25rem;text-align:center;line-height:1;">

      <!--p style="margin-bottom:0;position:absolute;top:.5rem;left:.5rem;">
        <?php
          if ( mynextprevious($post->ID, 'previous') ) {
              echo mynextprevious($post->ID, 'previous') . "<span style='font-size:.9rem;'>previous project</span>";
          }
          else {
            echo '&nbsp;';
          }
        ?>
      </p>
      <p style="margin-bottom:0;position:absolute;bottom:.5rem;right:.5rem;">
        <?php
          if ( mynextprevious($post->ID, 'next') ) {
              echo "<span style='font-size:.9rem;'>next project</span>" . mynextprevious($post->ID, 'next');
          }
          else {
            echo '&nbsp;';
          }
        ?>
    </p>

  </div>

  <div id="" class="col-md-2" style="">
  </div>

</div-->



<!--div id="mycontent" class="row">

  <div id="" class="col-md-2" style="">
  </div>

  <div id="col-content" class="col-md-8" style="background-color:#FFFFFF;padding: 2rem;">

    <div id="mytabs">

      <p class="" style="float:left;">
        <a id="tab-design" data-target="#design" data-toggle="tab" role="tab" onclick="changeIt('design');">Currently viewing Designs</a>
      </p>

      <p class="" style="float:right;">
        <a id="tab-process" data-target="#process" data-toggle="tab" role="tab" onclick="changeIt('process');">See Process</a>
      </p>
    </div>

<?php
/*if ( have_posts() ) :
  while ( have_posts() ) : the_post();
  // collect types into separate arrays
  $prefix = 'project_details_image_';
  $images = rwmb_meta( 'project_details_images' );
  $design = [];
  $process = [];
  if ( ! empty($images) ) {
    foreach ( $images as $image ) {
      if ( $image[$prefix.'type'] == 'd' ) {
        array_push($design, $image);
      }
      elseif ( $image[$prefix.'type'] == 'p' ) {
        array_push($process, $image);
      }
    }
  }*/
?>

    <div class="tab-content" style="width:100%;clear:both;">

      <div class="tab-pane active" id="design" role="tabpanel">

<?php //if ( ! empty($design) ) : ?>

        <p id="project-challenge" style="project-overview">
          <span>Challenge</span>
          <br/><?php echo get_post_meta($post->ID,'project_details_challenge',true); ?>
        </p>

        <p id="project-solution" style="project-overview">
          <span>Solution</span>
          <br/><?php echo get_post_meta($post->ID,'project_details_solution',true); ?>
        </p>

        <p id="project-contribution" style="project-overview">
          <span>Contribution</span>
          <br/><?php echo get_post_meta($post->ID,'project_details_contribution',true); ?>
        </p>

<?php
/*foreach ( $design as $image ) :

  foreach ( $image[$prefix.'images'] as $newimage ) :

    $image_url = wp_get_attachment_image_src( $newimage, 'full' );
    $image_url = $image_url[0];

    $image_id = mygetimageid($image_url);
    $image_id = $image_id[0];

    $image_alt = $image[$prefix.'alt'];

    $image_link = '<img style="max-width:300px;" class="" alt="'.$image_alt.'" src="'.$image_url.'">';
    */
?>
<?php //endforeach; ?>

        <div class="row project-row">

          <div class="col-sm-12 col-lg-4 push-lg-8 project-col-text">

            <p class="project-col-text-title"><?php echo $image[$prefix.'title']; ?></p>

            <p class="project-col-text-copy"><?php echo $image[$prefix.'description']?></p>

          </div>

          <div class="col-sm-12 col-lg-8 pull-lg-4 project-col-image">

            <a title="View larger" href="<?php echo $image_url;?>"><img class="img-fluid" alt="<?php echo $image_alt;?>" src="<?php echo $image_url;?>"></a>

          </div>

        </div><!-- end .project-row >

<?php //endforeach; ?>

<?php //endif; ?>

      </div><!-- end #design tab >

      <div class="tab-pane" id="process" role="tabpanel">

<?php //if ( ! empty($process) ) : ?>

        <p id="project-description" class="">
          <?php //echo get_the_content(); ?>
        </p>

        <p id="project-link">Visit
          <a title="Visit <?php echo the_title(); ?>" target="_blank" href="<?php echo get_post_meta($post->ID,'project_details_website',true); ?>"><?php echo the_title(); ?></a>
        </p>

<?php
/*foreach ( $process as $image ) :

  foreach ( $image[$prefix.'images'] as $newimage ) :

    $image_url = wp_get_attachment_image_src( $newimage, 'full' );
    $image_url = $image_url[0];

    $image_id = mygetimageid($image_url);
    $image_id = $image_id[0];

    $image_alt = $image[$prefix.'alt'];

    $image_link = '<img style="max-width:200px;" class="" alt="'.$image_alt.'" src="'.$image_url.'">';
    */
?>
<?php //endforeach; ?>

        <div class="row project-row">

          <div class="col-sm-12 col-md-4 push-md-8 project-col-text">

            <p class="project-col-text-title"><?php echo $image[$prefix.'title']; ?></p>

            <p class="project-col-text-copy"><?php echo $image[$prefix.'description']?></p>

          </div>

          <div class="col-sm-12 col-md-8 pull-md-4 project-col-image">

            <a title="View larger" href="<?php echo $image_url;?>"><img class="img-fluid" alt="<?php echo $image_alt;?>" src="<?php echo $image_url;?>"></a>

          </div>

        </div><!-- end .project-row >

<?php //endforeach; ?>

<?php //endif; ?>

      </div><!-- end #process tab >

    </div><!-- end .tab-content >

<?php //endwhile; ?>

<?php //else : ?>

<p>Nothing here !</p>

<?php //endif; ?>


  </div><!-- end #col-content >

  <div id="" class="col-md-2" style="">
  </div>
</div-->





<!-- include in app.js -->
<script>
$('#mytabs a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
});

function changeIt(item) {

  if ( item === 'process' )
  {
    $('#tab-design').text('See Design');
    $('#tab-process').text('Currently viewing Process');
  }
  if ( item === "design" )
  {
    $('#tab-process').text('See Process');
    $('#tab-design').text('Currently viewing Design');
  }
}

</script>
