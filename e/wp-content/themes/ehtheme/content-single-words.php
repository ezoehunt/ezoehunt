<?php
/**
* @package eztheme
*
* Content to be included on Single Words pages
*
*/
?>

<div id="page-block" class="">

<?php
if ( have_posts() ) :
  while ( have_posts() ) : the_post(); ?>

	here is the loop of content

<?php
// If comments are open or we have at least one comment, load up the comment template.
    if ( comments_open() || get_comments_number() ) :
    	comments_template();
    endif;

    // Navigation is through all posts - but causes error
    // if there is no cat template for the post
    // Make sure all cats have templates
    the_post_navigation( array(
    	'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper"> < </span>%title</span>',
    	'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper"> > </span></span>',
    ) );

  endwhile;
else :
?>
No posts !

<?php endif; ?>

</div><!-- end #page-block -->
