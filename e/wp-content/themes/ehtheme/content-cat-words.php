<?php
/**
* @package eztheme
*
* Content to be included on Words Category page
*
*/
?>

<p id="breadcrumb" class="breadcrumb">
  <a href="/" title="Return to home page">Home</a>
  &nbsp; / &nbsp;
  <?php echo mygetcatname($post->ID);?>
</p>

<div id="page-block" class="row page-block-bread">

  <div id="page-content" class="page-content-list">

    <h1 id="page-headline" class="col-12 <?php echo 'post-';echo the_ID();?>">Thinking about Things</h1>

<?php if ( have_posts() ) :
$count_posts = $wp_query->found_posts;
?>

    <ul class="entries">

<?php while ( have_posts() ) : the_post();
$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(400,400) );
?>

      <li class="row entry-foto" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <div class="col-3 fotos fotos-img">
        <a href="<?php the_permalink(); ?>">
          <img class="img-fluid" src="<?php echo $featuredImage[0];?>">
    	  </a>
      </div>

      <div class="col-9 fotos fotos-text">
        <?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?>

        <br/><span class="entry-excerpt"><?php echo get_the_excerpt(); ?></span>
      </div>

      </li>

<?php endwhile; ?>

    </ul>

<?php if ($count_posts > 10) : ?>
    <div id="ezpagination">
<?php the_posts_pagination( array(
  'prev_text' => '< <span class="screen-reader-text">' . __( 'Previous page', 'ehtheme' ) . '</span>',
  'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'ehtheme' ) . '</span> > <span class="meta-nav screen-reader-text">' . __( 'Page', 'ehtheme' ) . ' </span>',
) );
?>
    </div>
<?php endif; ?>

<?php else : ?>

    <p>Sorry there are no posts right now !</p>

<?php endif; ?>

  </div><!-- end #page-content -->

</div><!-- end #page-block -->
