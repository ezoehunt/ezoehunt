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
  <div class="col col-sm-5 col-md-15"></div>

  <div class="col col-sm-90 col-md-75 col-bg-white">

    <p class="page-breadcrumb">
      <a href="/" title="Return to home page">Home</a>
      &nbsp; / &nbsp;
      <a href="/<?php echo mygetcatslug($post->ID);?>" title="Go to <?php echo mygetcatname($post->ID);?> section"><?php echo mygetcatname($post->ID);?></a>
      &nbsp; / &nbsp;
      <?php echo get_the_title(); ?>
    </p>

  </div>

  <div class="col col-sm-5 col-md-10"></div>
</div>


<div id="page-title" class="row row-120">

  <div class="col col-sm-5 col-md-5"></div>

  <div class="col col-sm-90 col-md-85 col-bg-black col-pad-1">

    <p class="arrows-np floatleft col-sm-50 col-md-10">
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

    <p class="arrows-np floatright alignright col-sm-50 col-md-10">
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

    <h1 class="page-headline floatleft col-sm-100 col-md-80 <?php echo 'post-';echo the_ID();?>"><?php echo get_post_meta($post->ID,'project_details_headline',true); ?></h1>

  </div>

  <!--div class="col col-sm-5 col-md-5 col-bg-white hidden-sm-down"></div-->
  <div class="col col-sm-5 col-md-10"></div>

</div>


<div id="page-content" class="row">

  <div class="col col-sm-5 col-md-15"></div>

  <div id="page-column" class="col col-sm-90 col-md-75 col-pad-1 col-bg-white">

    <p class="overview floatright">
      <span>
        <a id="tab-process" class="floatright" data-target="#process" data-toggle="tab" role="tab" onclick="changeIt('process');">See Process</a>
      </span>
    </p>

    <p class="overview">
      <span>
        <a id="tab-design" class="floatleft active" data-target="#design" data-toggle="tab" role="tab" onclick="changeIt('design');">Currently Viewing Designs</a>
      </span>
    </p>

<?php
if ( have_posts() ) :
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
  }
?>

    <div class="tab-content">

      <div id="design" class="tab-pane active" role="tabpanel">

<?php if ( ! empty($design) ) : ?>

        <p class="overview">
          <span>Challenge</span>
          <br/><?php echo get_post_meta($post->ID,'project_details_challenge',true); ?>
        </p>

        <p class="overview">
          <span>Solution</span>
          <br/><?php echo get_post_meta($post->ID,'project_details_solution',true); ?>
        </p>

        <p class="overview">
          <span>Contribution</span>
          <br/><?php echo get_post_meta($post->ID,'project_details_contribution',true); ?>
        </p>

<?php
foreach ( $design as $image ) :
  foreach ( $image[$prefix.'images'] as $newimage ) :

    $image_url = wp_get_attachment_image_src( $newimage, 'full' );
    $image_url = $image_url[0];

    $image_id = mygetimageid($image_url);
    $image_id = $image_id[0];

    $image_alt = $image[$prefix.'alt'];

    $image_link = '<img style="max-width:300px;" class="" alt="'.$image_alt.'" src="'.$image_url.'">';
?>
<?php endforeach; ?>

        <div class="row item-row">

          <div class="col-sm-100 col-md-40 floatleft item-text">

            <p class="item-text-title"><?php echo $image[$prefix.'title']; ?></p>

            <p class="item-text-copy"><?php echo $image[$prefix.'description']?></p>

          </div>

          <div class="col-sm-100 col-md-60 floatleft item-image">

            <a title="View larger" href="<?php echo $image_url;?>"><img style="width:100%;" alt="<?php echo $image_alt;?>" src="<?php echo $image_url;?>"></a>

          </div>

        </div><!-- end .item-row -->

<?php endforeach; ?>

<?php endif; ?>

      </div><!-- end #design tab -->

      <div id="process" class="tab-pane" role="tabpanel">

<?php if ( ! empty($process) ) : ?>

        <p class="overview">
          <span>Overview</span>
          <br/><?php echo get_the_content(); ?>
        </p>

<?php
foreach ( $process as $image ) :
  foreach ( $image[$prefix.'images'] as $newimage ) :

    $image_url = wp_get_attachment_image_src( $newimage, 'full' );
    $image_url = $image_url[0];

    $image_id = mygetimageid($image_url);
    $image_id = $image_id[0];

    $image_alt = $image[$prefix.'alt'];

    $image_link = '<img style="max-width:300px;" class="" alt="'.$image_alt.'" src="'.$image_url.'">';
?>
<?php endforeach; ?>

        <div class="row item-row">

          <div class="col-sm-100 col-md-40 floatleft item-text">

            <p class="item-text-title"><?php echo $image[$prefix.'title']; ?></p>

            <p class="item-text-copy"><?php echo $image[$prefix.'description']?></p>

          </div>

          <div class="col-sm-100 col-md-60 floatleft item-image">

            <a title="View larger" href="<?php echo $image_url;?>"><img style="width:100%;" alt="<?php echo $image_alt;?>" src="<?php echo $image_url;?>"></a>

          </div>

        </div><!-- end .item-row -->

<?php endforeach; ?>

<?php endif; ?>

      </div><!-- end #process tab -->

    </div><!-- end .tab-content -->

<?php endwhile; ?>

<?php else : ?>

    <p>Nothing here !</p>

<?php endif; ?>

  </div><!-- end #page-column -->

  <div class="col col-sm-5 col-md-10"></div>
</div>



<!-- include in app.js -->
<script>


</script>
