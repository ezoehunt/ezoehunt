<?php
/**
* @package eztheme
*
* Content to be included on Single Work pages
*/
global $post;
//$post = get_post($post_id);
//var_dump($post);
?>

<div id="page-block" class="page-block-forgrid">

  <p id="breadcrumb" style="border:1px solid red;">
    <a class="" href="/" title="Return to home page">&#171; Home</a> &nbsp;<?php echo mygetcatname($post->ID);?> </li><span class="active"><?php echo get_the_title(); ?></span>
  </p>

<?php if ( have_posts() ) : ?>

<?php while ( have_posts() ) : the_post(); ?>

  <div id="<?php echo 'post-';echo the_ID();?>" style="border:1px solid red;">
    <p class="myprevious"><?php echo mynextprevious($post->ID, 'previous');?></p>
    <h1 style="text-align:center;" id="project-headline"><?php echo get_post_meta($post->ID,'project_details_headline',true); ?></h1>
    <p class="mynext"><?php echo mynextprevious($post->ID, 'next');?></p>
  </div>

  <div id="project-overview" style="border:1px solid red;">
    <p id="project-challenge">
      <?php echo get_post_meta($post->ID,'project_details_challenge',true); ?>
    </p>
    <p id="project-solution">
      <?php echo get_post_meta($post->ID,'project_details_solution',true); ?>
    </p>
    <p id="project-contribution">
      <?php echo get_post_meta($post->ID,'project_details_contribution',true); ?>
    </p>
  </div>

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

  <div id="project-content" style="border:1px solid red;">

    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#design" role="tab">Design</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#process" role="tab">Process</a>
      </li>
    </ul>

    <div class="tab-content">

      <div class="tab-pane active" id="design" role="tabpanel">

      <?php if ( ! empty($design) ) : ?>

      <p id="project-link">Visit
        <a title="Visit <?php echo the_title(); ?>" target="_blank" href="<?php echo get_post_meta($post->ID,'project_details_website',true); ?>"><?php echo the_title(); ?></a>
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

      <div class="row" style="border:2px solid blue;">

        <p style="width:65%;margin-bottom:2rem;margin-top:0;border:1px solid green;">
          <a title="View larger" href="<?php echo $image_url;?>"><img style="width:65%;" alt="<?php echo $image_alt;?>" src="<?php echo $image_url;?>"></a>
        </p>

        <p style="float:right;width:35%;padding-left:1rem;margin-top:0;border:1px solid purple;"><?php echo $image[$prefix.'title']; ?>
        </br><?php echo $image[$prefix.'description']?></p>
      </div>

<?php endforeach; ?>

<?php endif; ?>

      </div><!-- end design -->

      <div class="tab-pane" id="process" role="tabpanel">

      <?php if ( ! empty($process) ) : ?>

        <p id="project-link">Visit
          <a title="Visit <?php echo the_title(); ?>" target="_blank" href="<?php echo get_post_meta($post->ID,'project_details_website',true); ?>"><?php echo the_title(); ?></a>
        </p>

        <p id="project-description"><?php echo the_content(); ?>
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

      <div class="row" style="border:2px solid blue;">

        <p style="width:65%;margin-bottom:2rem;margin-top:0;border:1px solid green;">
          <a title="View larger" href="<?php echo $image_url;?>"><img style="width:65%;" alt="<?php echo $image_alt;?>" src="<?php echo $image_url;?>"></a>
        </p>

        <p style="float:right;width:35%;padding-left:1rem;margin-top:0;border:1px solid purple;"><?php echo $image[$prefix.'title']; ?>
        </br><?php echo $image[$prefix.'description']?></p>
      </div>

<?php endforeach; ?>

<?php endif; ?>

      </div><!-- end process -->

    </div><!-- end tab-content -->

  </div><!-- end #project-content -->

<?php endwhile; ?>

<?php else : ?>

<p>Nothing here !</p>

<?php endif; ?>

</div><!-- end #page-block -->
