<?php get_header(); ?>
<?php
$thispostid = $post->ID;
$parentid = $post->post_parent;
$parenttitle = get_the_title($parentid);
?>
<div class="col-xs-12">

    <ol class="breadcrumb">
        <li><a href="<?php echo get_permalink($post->post_parent); ?>" title="Back to the project page">&#171; back to the project page</a></li>
    </ol>

    <div class="ez-main-row">

        <div id="<?php echo 'post-';echo the_ID();?>" class="ez-post hentry">
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php
$imageargs = array(
    'media_tags'   => 'portfolio-image,portfolio-ux',
    'numberposts' => -1,
    'post_parent' => $post->post_parent,
    'orderby'     => 'date',
    'order'       => 'ASC'
);
/*
$images = get_attachments_by_media_tags($imageargs);
foreach ($images as $image) {
    $media[] += $image->ID;
}
$prevID = ez_prev_tag($post->ID,$media);
$nextID = ez_next_tag($post->ID,$media);
wp_reset_postdata();
*/
?>
            <div id="project-title-small" class="visible-xs wrapper-posts">
                <div class="arrow-wrapper">
<?php if (!empty($prevID)) : ?>
                <a class="nav-arrow arrow-left" href="<?php echo get_permalink($prevID);?>" title="Go to the <?php echo get_the_title($prevID);?> image"></a>

<?php elseif (empty($prevID)) : ?>
                <a class="arrow-left-none"></a>
<?php endif; ?>
                </div><!-- / previous -->

                <div class="arrow-wrapper">
<?php if (!empty($nextID)) : ?>
                <a class="nav-arrow arrow-right" href="<?php echo get_permalink($nextID);?>" title="Go to the <?php echo get_the_title($nextID);?> image"></a>
<?php elseif (empty($nextID)) :  ?>
                    <a class="arrow-left-none"></a>
<?php endif; ?>
                </div><!-- / next -->

                <div class="clearfix"></div>

                <div class="col-xs-12 title-posts"><?php echo get_the_title(); ?>
                </div>
            </div><!-- / wrapper-posts project-title xs -->


            <div id="project-title-big" class="hidden-xs wrapper-posts">
                <div class="arrow-wrapper pull-left">
<?php if (!empty($prevID)) : ?>
                    <a class="nav-arrow arrow-left" href="<?php echo get_permalink($prevID);?>" title="Go to the <?php echo get_the_title($prevID);?> image"></a>
<?php elseif (empty($prevID)) :  ?>
                    <a class="arrow-left-none">&nbsp;</a>
<?php endif; ?>
                </div><!-- / previous -->

                <div class="arrow-wrapper pull-right">
<?php if (!empty($nextID)) : ?>
                    <a class="nav-arrow arrow-right" href="<?php echo get_permalink($nextID);?>" title="Go to the <?php echo get_the_title($nextID);?> image"></a>
<?php elseif (empty($nextID)) :  ?>
                    <a class="arrow-right-none">&nbsp;</a>
<?php endif; ?>
                </div><!-- / next -->

                <div class="title-posts title-big"><?php echo get_the_title(); ?>
                </div>
            </div><!-- / wrapper-posts project-title md -->



			<div class="clearfix"></div>

            <div class="portfolio-attachment wrapper-posts">

<?php if ( wp_attachment_is_image( $post->id ) ) : $att_image = wp_get_attachment_image_src( $post->id, "full"); ?>

                <div class="tab-image">
                    <img src="<?php echo $att_image[0];?>" alt="<?php echo the_title(); ?>" />
                </div>

<?php endif; ?>
<?php endwhile; ?>
<?php endif; ?>
            </div><!-- / wrapper-posts portfolio-attachment -->

        </div><!-- / ez-post -->
    </div><!-- / ez-main-row -->
</div><!-- / main col-xs-12 -->
<?php get_footer(); ?>
