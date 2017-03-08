<?php
/**
* @package eztheme
*
* Content to be included on Words Category page
*/
?>

<div id="page-block" class="">

<?php if ( have_posts() ) : ?>

<?php while ( have_posts() ) : the_post(); ?>

  <?php
    // inlcude date time
    if ( is_single() ) {
      the_title( '<h1 class="entry-title">', '</h1>' );
    } else {
      the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    }
  ?>

  <?php if ( '' !== get_the_post_thumbnail() && ! is_single() ) : ?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail( 'twentyseventeen-featured-image' ); ?>
			</a>
		</div><!-- .post-thumbnail -->
	<?php endif; ?>

  <?php
    /* translators: %s: Name of current post */
    the_content( sprintf(
      __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ),
      get_the_title()
    ) );

    wp_link_pages( array(
      'before'      => '<div class="page-links">' . __( 'Pages:', 'twentyseventeen' ),
      'after'       => '</div>',
      'link_before' => '<span class="page-number">',
      'link_after'  => '</span>',
    ) );
  ?>

  <?php
    the_posts_pagination( array(
      'prev_text' => '< <span class="screen-reader-text">' . __( 'Previous page', 'twentyseventeen' ) . '</span>',
      'next_text' => '<span class="screen-reader-text">' . __( 'Next page', 'twentyseventeen' ) . '</span> > <span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyseventeen' ) . ' </span>',
    ) );
?>

<?php endwhile; ?>

<?php else : ?>

No posts !

<?php endif; ?>

</div><!-- end #page-block -->
