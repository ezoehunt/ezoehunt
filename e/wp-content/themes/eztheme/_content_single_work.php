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
  &nbsp; <span class="therefore">&#8756;</span> &nbsp;
  <a href="/work" title="Go to Work section"><?php echo mygetcatname($post->ID);?></a>
  &nbsp; <span class="therefore">&#8756;</span> &nbsp;
  </li><span style="font-weight:500;"><?php echo get_the_title(); ?></span>
</p>

<div id="page-block" class="page-block-forgrid">

<?php if ( have_posts() ) : ?>

<?php while ( have_posts() ) : the_post(); ?>

  <div id="project-header" class="<?php echo 'post-';echo the_ID();?>">

    <p class="myprevious">
      <?php
        if ( mynextprevious($post->ID, 'previous') ) {
            echo mynextprevious($post->ID, 'previous');
        }
        else {
          echo '&nbsp;';
        }
      ?>
    </p>

    <h1 id="project-headline"><?php echo get_post_meta($post->ID,'project_details_headline',true); ?></h1>

    <p class="mynext">
      <?php
        if ( mynextprevious($post->ID, 'next') ) {
            echo mynextprevious($post->ID, 'next');
        }
        else {
          echo '&nbsp;';
        }
      ?>
    </p>
  </div>

  <div id="project-overview" style="width:100%;display:inline-block;margin-bottom:0;margin-bottom:1rem;">

    <p id="project-challenge" style="float:left;width:32%;border:1px solid #58414b;padding:1rem;background-color:#FCFAFB;margin-bottom:0;margin-right:2%;">
      <span style="font-weight:500;">Challenge</span>
      <br/><?php echo get_post_meta($post->ID,'project_details_challenge',true); ?>
    </p>

    <p id="project-solution" style="float:left;width:32%;border:1px solid blue;margin-bottom:0;margin-right:2%;">
      <?php echo get_post_meta($post->ID,'project_details_solution',true); ?>
    </p>

    <p id="project-contribution" style="float:right;width:32%;border:1px solid blue;margin-bottom:0;">
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

  <div id="project-content" style="padding-top:1rem;border-top:1px dotted red;">

    <ul class="nav nav-pills" role="tablist" style="justify-content: center;padding-bottom:1rem;border-bottom:1px dotted red;">
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
