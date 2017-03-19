<?php
$args = array(
  'post_type'       =>  'post',
  'post_status'     =>  'publish',
  'category_name'   =>  'words',
  'posts_per_page'  =>  1,
  'orderby'         =>  'date',
  'order'           =>  'DESC'
);

$find = new WP_Query($args );
?>

<p style="float:right;color:white;font-size: 90%;"><a title="See all Words" href="<?php echo esc_url( home_url('/words') );?>">See all</a> <span class="link-raquo">&raquo;</span></p>

<p style="height:40px;background-color:black;color:white;font-weight:600;">Recent Thoughts</p>

<?php if ( $find->have_posts() ) : ?>
<?php while ( $find->have_posts() ) : $find->the_post();
$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(400,400) );
$title = get_the_title();
?>

<p><?php echo get_post_meta($post->ID,'eh_headline',true); ?></p>

<a class="work" title="View project" href="<?php the_permalink() ?>">
    <img style="float: left;
    max-width: 130px;
    height: auto;" class="" src="<?php echo $featuredImage[0];?>">
  </a>

<?php $title = get_the_content(); ?>
<p style=""><?php echo break_text($title); ?></p>


<?php endwhile; ?>
<?php endif; ?>
