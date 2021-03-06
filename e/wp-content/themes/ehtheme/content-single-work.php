<?php
/**
* @package eztheme
*
* Content to be included on Single Work pages
*
*/
global $post;
$cat_slug = eh_get_cat_slug($post->ID);
$cat_name = eh_get_cat_name($post->ID);

/*  Get portfolio ids for sorting next/previous based on Portfolio Display Order  */
$portfolio_ids = array();
$argswork = array(
  'post_type'       =>  'work',
  'post_status'     =>  'publish',
  'orderby'         =>  'meta_value_num',
  'meta_key'        =>  '_portfolio_display_order',
  'order'           =>  'DESC',
  /*  Exclude old or uninteresting projects - these have display order = "99"   */
  'meta_query' => array(
    array(
      'key' => '_portfolio_display_order',
      'value' => 'NULL',
      'compare' => '!='
    )
  ),
);
$findwork = new WP_Query($argswork );
if ( $findwork->have_posts() ) : $count = $findwork->found_posts;
  while ( $findwork->have_posts() ) : $findwork->the_post();
    $portfolio_ids[] += $post->ID;
  endwhile;
endif;
wp_reset_postdata();
?>

<div id="leftcol" class="col col-sm-5 col-md-15 bg-work"></div>


<div id="maincol" class="col col-sm-90 col-md-70 bg-white <?php echo 'post-';echo the_ID();?>">

  <div id="breadcrumb">
    <p class="page-breadcrumb">
      <a class="work" href="/" title="Return to home page">Home</a>
      &nbsp; / &nbsp;
      <a class="work" href="/<?php echo $cat_slug;?>" title="Go to <?php echo $cat_name;?> section"><?php echo $cat_name;?></a>
      &nbsp; / &nbsp;
      <?php echo get_the_title(); ?>
    </p>
  </div>


  <div id="page-title">

    <ul class="page-pagination">

      <li class="item-middle">
        <h1 class="page-headline"><?php echo get_post_meta($post->ID,'_portfolio_headline',true); ?></h1>
      </li>
<?php
$myprev = eh_nextprev($post->ID, $cat_slug, 'work', 'previous', $count, $portfolio_ids);
$mynext = eh_nextprev($post->ID, $cat_slug, 'work', 'next', $count, $portfolio_ids);
?>
      <li class="item-left">
<?php
  if ( !empty( $myprev ) ) {
    echo $myprev;
  }
  else {
    echo '&nbsp;';
  }
?>
      </li>

      <li class="item-right">
<?php
  if ( !empty( $mynext ) ) {
    echo $mynext;
  }
  else {
    echo '&nbsp;';
  }
?>
      </li>

    </ul>

  </div>


  <div id="page-column">

    <div class="blog-center col-sm-95">

      <ul id="myTab" class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link laquo active" data-toggle="tab" data-selected="design" href="#design" role="tab" onclick="changeIt('design');" >Viewing Designs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link raquo" data-toggle="tab" data-selected="process" href="#process" role="tab" onclick="changeIt('process');">See Process</a>
        </li>
      </ul>

<?php
if ( have_posts() ) :
  while ( have_posts() ) : the_post();
  $prefix = '_portfolio_attach_';
  $design = [];
  $process = [];
  $attachments = rwmb_meta('_portfolio_attachments' );
  if ( ! empty($attachments) ) {
    foreach ( $attachments as $attachment ) {
      if ( $attachment[$prefix.'type'] == 'd' && $attachment[$prefix.'display'] == 'y' ) {
        array_push($design, $attachment);
      }
      elseif ( $attachment[$prefix.'type'] == 'p'  && $attachment[$prefix.'display'] == 'y' ) {
        array_push($process, $attachment);
      }
    }
  }
?>

      <div class="tab-content">

        <div id="design" class="tab-pane active" role="tabpanel">

<?php if ( ! empty($design) ) : ?>

          <p class="overview">
            <span>Challenge</span>
            <br/><?php echo get_post_meta($post->ID,'_portfolio_challenge',true); ?>
          </p>

          <p class="overview">
            <span>Solution</span>
            <br/><?php echo get_post_meta($post->ID,'_portfolio_solution',true); ?>
          </p>

          <p class="overview">
            <span>Contribution</span>
            <br/>
            <ul>
              <li>
                <?php echo get_post_meta($post->ID,'_portfolio_role',true); ?> at <a class="work" href="<?php echo get_post_meta($post->ID,'_portfolio_employer_website',true);?>" title="Go to <?php echo get_post_meta($post->ID,'_portfolio_employer',true);?>" target="_blank"><?php echo get_post_meta($post->ID,'_portfolio_employer',true); ?></a>
              </li>
              <li>
                For <a class="work" href="<?php echo get_post_meta($post->ID,'_portfolio_website',true);?>" title="Go to <?php echo get_post_meta($post->ID,'_portfolio_client',true);?>" target="_blank"><?php echo get_post_meta($post->ID,'_portfolio_client',true); ?></a>
              </li>
            </ul>
          </p>

<?php
foreach ( $design as $attachment ) :

  $attach_title = $attachment[$prefix.'title'];
  $attach_alt = $attachment[$prefix.'alt'];
  $attach_description = $attachment[$prefix.'description'];

  // Set up attach_id
  if ( $attachment[$prefix.'format'] == 'i' ) {
    $format = 'images';
  }
  elseif ( $attachment[$prefix.'format'] == 'p' ) {
    $format = 'pdf';
  }
  $attach_id = $attachment[$prefix.$format];
  $attach_id = $attach_id[0];

  // Set up links to things other than attachment pages
  if ( $attachment[$prefix.'preview'] == 'y' ) {
    $preview = 'yes';
    if ( !empty( $attachment[$prefix.'preview_url'] ) ) {
      $tmp_url = $attachment[$prefix.'preview_url'];
    }
    if ( !empty( $attachment[$prefix.'preview_title'] ) ) {
      $tmp_url_title = $attachment[$prefix.'preview_title'];
    }
  }
  elseif ( $attachment[$prefix.'preview'] == 'n' ) {
    $preview = 'no';
  }

  if ( $preview == 'yes' ) {
    $image = get_the_title($attach_id);
    $image = 'image-'.eh_sluggify($image);
    $image_post = get_page_by_title($image, '', 'attachment');
    $attach_src = wp_get_attachment_image_src( $image_post->ID, '' );
    $attach_src = $attach_src[0];
    if ( !empty( $tmp_url ) && !empty( $tmp_url_title ) ) {
      $page_url = $tmp_url;
      $attach_link_title = $tmp_url_title;
    }
    else {
      $page_url = get_permalink($attach_id);
      $attach_link_title = 'View larger image';
    }
  }
  elseif ( $preview == 'no' ) {
    $attach_src = wp_get_attachment_image_src( $attach_id, 'full' );
    $attach_src = $attach_src[0];
    $page_url = get_permalink($attach_id);
    $attach_link_title = 'View larger image';
  }
?>
          <div class="row item-row">

            <div class="col-sm-100 col-md-40 floatleft item-text">

              <p class="item-text-title"><?php echo $attach_title; ?></p>

              <p class="item-text-copy"><?php echo $attach_description; ?></p>

              <p class="item-text-copy">
<a class="work" title="<?php echo $attach_link_title;?>"<?php if ($preview == 'yes' && !empty($attachment[$prefix.'preview_url'])) { echo ' target="_blank"';}?> href="<?php echo $page_url;?>"><?php echo $attach_link_title.' &raquo;'; ?></a>
              </p>

            </div>

            <div class="col-sm-100 col-md-60 floatleft item-image">
<a class="work" title="<?php echo $attach_link_title;?>"<?php if ($preview == 'yes' && !empty($attachment[$prefix.'preview_url'])) { echo ' target="_blank"';}?> href="<?php echo $page_url;?>">
    <img alt="<?php echo $attach_alt;?>" src="<?php echo $attach_src;?>">
</a>
            </div>

          </div>

<?php endforeach; ?>

<?php endif; ?>

        </div><!-- end #design tab -->

        <div id="process" class="tab-pane" role="tabpanel">
<?php if ( get_the_content() != false ) : ?>
          <p class="overview">
            <span>Overview</span>
            <br/><?php echo get_the_content(); ?>
          </p>
<?php endif; ?>

<?php if ( ! empty($process) ) : ?>

<?php
foreach ( $process as $attachment ) :

  $attach_title = $attachment[$prefix.'title'];
  $attach_alt = $attachment[$prefix.'alt'];
  $attach_description = $attachment[$prefix.'description'];

  // Set up attach_id
  if ( $attachment[$prefix.'format'] == 'i' ) {
    $format = 'images';
  }
  elseif ( $attachment[$prefix.'format'] == 'p' ) {
    $format = 'pdf';
  }
  $attach_id = $attachment[$prefix.$format];
  $attach_id = $attach_id[0];

  // Set up links to things other than attachment pages
  if ( $attachment[$prefix.'preview'] == 'y' ) {
    $preview = 'yes';
    if ( !empty( $attachment[$prefix.'preview_url'] ) ) {
      $tmp_url = $attachment[$prefix.'preview_url'];
    }
    if ( !empty( $attachment[$prefix.'preview_title'] ) ) {
      $tmp_url_title = $attachment[$prefix.'preview_title'];
    }
  }
  elseif ( $attachment[$prefix.'preview'] == 'n' ) {
    $preview = 'no';
  }

  if ( $preview == 'yes' ) {
    $image = get_the_title($attach_id);
    $image = 'image-'.eh_sluggify($image);
    $image_post = get_page_by_title($image, '', 'attachment');
    $attach_src = wp_get_attachment_image_src( $image_post->ID, '' );
    $attach_src = $attach_src[0];
    if ( !empty( $tmp_url ) && !empty( $tmp_url_title ) ) {
      $page_url = $tmp_url;
      $attach_link_title = $tmp_url_title;
    }
    else {
      $page_url = get_permalink($attach_id);
      $attach_link_title = 'View larger image';
    }
  }
  elseif ( $preview == 'no' ) {
    $attach_src = wp_get_attachment_image_src( $attach_id, 'full' );
    $attach_src = $attach_src[0];
    $page_url = get_permalink($attach_id);
    $attach_link_title = 'View larger image';
  }
?>
          <div class="row item-row">

            <div class="col-sm-100 col-md-40 floatleft item-text">

              <p class="item-text-title"><?php echo $attach_title; ?></p>

              <p class="item-text-copy"><?php echo $attach_description; ?></p>

              <p class="item-text-copy">
<a class="work" title="<?php echo $attach_link_title;?>"<?php if ($preview == 'yes' && !empty($attachment[$prefix.'preview_url'])) { echo ' target="_blank"';}?> href="<?php echo $page_url;?>"><?php echo $attach_link_title.' &raquo;'; ?></a>
              </p>

            </div>

            <div class="col-sm-100 col-md-60 floatleft item-image">
<a class="work" title="<?php echo $attach_link_title;?>"<?php if ($preview == 'yes' && !empty($attachment[$prefix.'preview_url'])) { echo ' target="_blank"';}?> href="<?php echo $page_url;?>">
    <img alt="<?php echo $attach_alt;?>" src="<?php echo $attach_src;?>">
</a>
            </div>

          </div>

<?php endforeach; ?>

<?php endif; ?>

        </div><!-- end #process tab -->

      </div><!-- end .tab-content -->

<?php endwhile; ?>

<?php else : ?>

      <p><b>Nothing here !</b></p>

<?php endif; ?>

    </div><!-- end .blog-center -->

  </div><!-- end #page-column -->

</div><!-- end #maincol -->


<div id="rightcol" class="col col-sm-5 col-md-15 bg-work"></div>

<script>
/*
* Store most recent selected tab so when we can come back to it from the Attachment Page
*/
$(document).ready(function(){
  $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
      localStorage.setItem('eh_activeTab', $(e.target).attr('href'));
  });
  var eh_activeTab = localStorage.getItem('eh_activeTab');
  if(eh_activeTab){
      $('#myTab a[href="' + eh_activeTab + '"]').tab('show');
      // Update selected style
      if (eh_activeTab) {
        newActiveTab = eh_activeTab.substring(1);
        changeIt(newActiveTab);
      }
  }
});
</script>
