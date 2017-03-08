<?php
/**
* @package eztheme
*
* Content to be included in About page
*/
?>

<div id="page-block" class="">

<?php if ( have_posts() ) : ?>

<?php while ( have_posts() ) : the_post(); ?>


	here is the loop of content


<?php endwhile; ?>

<?php else : ?>

No posts !

<?php endif; ?>

</div><!-- end #page-block -->
