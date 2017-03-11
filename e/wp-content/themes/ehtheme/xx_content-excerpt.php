<?php
/**
* @package ehtheme
*
* Based on Twentyseventeen Wordpress theme
*
* Template part for displaying posts with excerpts
*
*/
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <p class="entry-meta">
    <?php echo the_date('l, F j, Y');?>
  </p>

  <p>
    <?php the_title( sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a>' ); ?>
  </p>

	<p class="entry-summary">
		<?php the_excerpt(); ?>
	</p>

</article>
