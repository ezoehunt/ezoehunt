<?php
$args = array(
  'post_type'       =>  'work',
  'post_status'     =>  'publish',
  'posts_per_page'  =>  2,
  'orderby'         =>  'date',
  'order'           =>  'DESC'
);

$find = new WP_Query($args );

if ( $find->have_posts() ) : ?>

<div class="row featured-wrapper" style="border:1px solid green;">

<?php
while ( $find->have_posts() ) : $find->the_post();

$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(150,150) );


$group_value = rwmb_meta( 'project_details' );

$prefix = 'project_details_';

echo rwmb_meta( 'project_details_keywords' ).'<br/>';
echo rwmb_meta( 'project_details_website' ).'<br/>';
echo rwmb_meta( 'project_details_headline' ).'<br/>';
echo rwmb_meta( 'project_details_challenge' ).'<br/>';
echo rwmb_meta( 'project_details_solution' ).'<br/>';
echo rwmb_meta( 'project_details_contribution' ).'<br/>';

$itemprefix = 'project_details_image_';
$images = rwmb_meta( 'project_details_images' );
$design = [];
$process = [];
if ( ! empty( $images ) ) {
// also check if array - if so do loop
// if not ref each item directly

  foreach ( $images as $image ) {
    if ($image[$itemprefix.'type'] == 'd') {
      array_push($design, $image);
    }
    elseif ($image[$itemprefix.'type'] == 'p') {
      array_push($process, $image);
    }
  }
}

echo '<pre>';
var_dump($process);
echo '</pre>';

?>


<?php
endwhile;
?>


</div>

<?php
endif;
?>
