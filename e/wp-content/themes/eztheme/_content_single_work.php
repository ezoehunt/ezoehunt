<?php
/**
* @package eztheme
*
* Content to be included on Single Work pages
*/
global $post;
?>

<p id="breadcrumb" class="breadcrumb">
  <a href="/" title="Return to home page">Home</a>
  &nbsp; / &nbsp;
  <a href="/work" title="Go to Work section"><?php echo mygetcatname($post->ID);?></a>
  &nbsp; / &nbsp;
  <?php echo get_the_title(); ?>
</p>

<div id="page-block" class="row page-block-bread">

<?php if ( have_posts() ) : ?>

<?php while ( have_posts() ) : the_post(); ?>

<div id="project-header" class="<?php echo 'post-';echo the_ID();?> row">

  <div class="col-6 col-sm-1 myprevious">
    <?php
      if ( mynextprevious($post->ID, 'previous') ) {
          echo mynextprevious($post->ID, 'previous');
      }
      else {
        echo '&nbsp;';
      }
    ?>
  </div>

  <div class="col-6 col-sm-1 push-sm-10 mynext">
    <?php
      if ( mynextprevious($post->ID, 'next') ) {
          echo mynextprevious($post->ID, 'next');
      }
      else {
        echo '&nbsp;';
      }
    ?>
  </div>

  <h1 id="project-headline" class="col-12 col-sm-10 pull-sm-1"><?php echo get_post_meta($post->ID,'project_details_headline',true); ?></h1>

</div>

<ul id="mypills" class="nav nav-pills" role="tablist">

  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#design" role="tab">See Design</a>
  </li>

  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#process" role="tab">See Process</a>
  </li>

</ul>

<?php
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

<div id="project-content">

  <div class="tab-content">

    <div class="tab-pane active" id="design" role="tabpanel">

<?php if ( ! empty($design) ) : ?>

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
foreach ( $design as $image ) :

  foreach ( $image[$prefix.'images'] as $newimage ) :

    $image_url = wp_get_attachment_image_src( $newimage, 'full' );
    $image_url = $image_url[0];

    $image_id = mygetimageid($image_url);
    $image_id = $image_id[0];

    $image_alt = $image[$prefix.'alt'];

    $image_link = '<img style="max-width:200px;" class="" alt="'.$image_alt.'" src="'.$image_url.'">';
?>
<?php endforeach; ?>

      <div class="row project-row">

        <div class="col-sm-12 col-md-4 push-md-8 project-col-text">

          <p class="project-col-text-title"><?php echo $image[$prefix.'title']; ?></p>

          <p class="project-col-text-copy"><?php echo $image[$prefix.'description']?></p>

        </div>

        <div class="col-sm-12 col-md-8 pull-md-4 project-col-image">

          <a title="View larger" href="<?php echo $image_url;?>"><img class="img-fluid" alt="<?php echo $image_alt;?>" src="<?php echo $image_url;?>"></a>

        </div>

      </div><!-- end .project-row -->

<?php endforeach; ?>

<?php endif; ?>

    </div><!-- end #design -->

    <div class="tab-pane" id="process" role="tabpanel">

<?php if ( ! empty($process) ) : ?>

      <p id="project-description" class="">
        <?php echo get_the_content(); ?>
      </p>

      <p id="project-link">Visit
        <a title="Visit <?php echo the_title(); ?>" target="_blank" href="<?php echo get_post_meta($post->ID,'project_details_website',true); ?>"><?php echo the_title(); ?></a>
      </p>

<?php
foreach ( $process as $image ) :

  foreach ( $image[$prefix.'images'] as $newimage ) :

    $image_url = wp_get_attachment_image_src( $newimage, 'full' );
    $image_url = $image_url[0];

    $image_id = mygetimageid($image_url);
    $image_id = $image_id[0];

    $image_alt = $image[$prefix.'alt'];

    $image_link = '<img style="max-width:200px;" class="" alt="'.$image_alt.'" src="'.$image_url.'">';
?>
<?php endforeach; ?>

      <div class="row project-row">

        <div class="col-sm-12 col-md-4 push-md-8 project-col-text">

          <p class="project-col-text-title"><?php echo $image[$prefix.'title']; ?></p>

          <p class="project-col-text-copy"><?php echo $image[$prefix.'description']?></p>

        </div>

        <div class="col-sm-12 col-md-8 pull-md-4 project-col-image">

          <a title="View larger" href="<?php echo $image_url;?>"><img class="img-fluid" alt="<?php echo $image_alt;?>" src="<?php echo $image_url;?>"></a>

        </div>

      </div><!-- end .project-row -->

<?php endforeach; ?>

<?php endif; ?>

    </div><!-- end #process -->

  </div><!-- end .tab-content -->

</div><!-- end #project-content -->

<?php endwhile; ?>

<?php else : ?>

<p>Nothing here !</p>

<?php endif; ?>

</div><!-- end #page-block -->
