<?php
/**
* @package ehtheme
*
* Based on Twentyseventeen Wordpress theme
*
* Archive Template for Custom Post Type = Work
*
*/
global $post;

get_header();

?>

<div id="leftcol" class="col col-sm-5 col-md-15 bg-work"></div>


<div id="maincol" class="col col-sm-90 col-md-70 bg-white">

  <div id="breadcrumb">
    <p class="page-breadcrumb">
      <a class="work" href="/" title="Return to home page">Home</a>
      &nbsp; / &nbsp;
      <?php echo mygetcatname($post->ID); ?>
    </p>
  </div>


  <div id="page-title">

    <ul class="page-nopag">
      <li class="item-middle">
        <h1 class="page-headline-nopag">Making Things</h1>
      </li>
    </ul>

  </div>


  <div id="page-column">

    <div class="blog-center col-xs-100 col-sm-90 col-md-85 col-lg-80">
<?php
query_posts( $query_string . '&orderby=date&order=asc' );
if ( have_posts() ) :
$count_posts = $wp_query->found_posts;
?>

      <ul class="gridit">

<?php while ( have_posts() ) : the_post();
$featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(400,400) );
?>

        <li <?php post_class(); ?> id="post-<?php the_ID(); ?>">
          <a class="work" title="View project" href="<?php the_permalink() ?>">

            <img class="grid-image" src="<?php echo $featuredImage[0];?>">

            <figcaption class="grid-img-overlay">
              <p><?php echo the_title(); ?>
                <br/><span>&#8212; view project &#8212;</span></p>
            </figcaption>
          </a>
        </li>

<?php endwhile; ?>

      </ul>

<?php if ($count_posts > 10) : ?>
      <div id="list-pagination">
        <?php echo mypaginate($wp_query); ?>
      </div>
<?php endif; ?>

<?php
wp_reset_postdata();
else : ?>

      <p>Sorry there are no projects to show right now !</p>

<?php endif; ?>

    </div><!-- end .blog-center -->

  </div><!-- end #pagecolumn -->

</div><!-- end #maincol -->


<div id="rightcol" class="col col-sm-5 col-md-15 bg-work"></div>


<?php get_footer(); ?>
