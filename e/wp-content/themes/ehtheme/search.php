<?php
/**
* @package ehtheme
*
* Based on Twentyseventeen Wordpress theme
*
* Search Results template
*
*/

get_header();

?>

<div id="content-wrapper" class="row">

  <div id="colmain" class="col col-sm-90 col-md-70 bg-white">

    <div id="breadcrumb">
      <p class="page-breadcrumb">
        <a href="/" title="Return to home page">Home</a>
        &nbsp; / &nbsp;
        Search Results
      </p>
    </div>


    <div id="page-title">

      <ul class="page-nopag">
        <li class="item-middle">
          <?php if ( have_posts() ) :
            $count_posts = $wp_query->found_posts;
          ?>
          <h1 class="page-headline-nopag">
            <?php
              printf( _n( '%s result', '%s results', $count_posts, 'ehtheme' ), $count_posts );
              echo ' for <br/><span class="search-query">' . get_search_query() . '</span>';
            ?>
          </h1>
          <?php else : ?>
          <h1 class="page-headline-nopag">
            <?php
              printf( __( 'No Results for<br/>%s', 'ehtheme' ), '<span class="search-query">' . get_search_query() . '</span>' );
            ?>
          </h1>
          <?php endif; ?>
        </li>
      </ul>

    </div>


    <div id="page-column">

      <div class="blog-center col-xs-100 col-sm-90 col-md-85 col-lg-80">

<?php if ( have_posts() ) : ?>

        <div id="mysearch">
          <?php get_search_form(); ?>
        </div>

        <ul class="entries entries-search">

<?php while ( have_posts() ) : the_post();
        $featuredImage = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array(400,400) );
        ?>

          <li <?php post_class('entry-foto'); ?> id="post-<?php the_ID(); ?>">

            <div class="col-sm-20 floatleft fotos fotos-img">
              <a title="View <?php echo the_title(); ?>" href="<?php the_permalink(); ?>">
                <img title="Image of this post" src="<?php echo $featuredImage[0];?>">
              </a>
            </div>

            <div class="col-sm-80 floatleft fotos fotos-text">

              <p class="entry-meta">
                <?php echo get_the_date( 'j M Y' ); ?>
              </p>

              <p>
<?php
$projectit = get_post_meta($post->ID,'project_details_headline',true);
$postit = get_post_meta($post->ID,'eh_headline',true);
if ( !empty($projectit) ) : ?>
              <a title="View <?php echo $projectit; ?>" href="<?php the_permalink() ?>"><?php echo $projectit; ?></a>
<?php elseif ( !empty($postit) ) : ?>
              <a title="View <?php echo $postit; ?>" href="<?php the_permalink() ?>"><?php echo $postit; ?></a>
<?php endif; ?>
              </p>

              <p class="entry-excerpt">
                <?php echo get_the_excerpt(); ?>
              </p>

            </div>

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

        <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>

        <div id="mysearch">
          <?php get_search_form(); ?>
        </div>

<?php endif; ?>

      </div><!-- end .blog-center -->

    </div><!-- end #page-column -->

  </div><!-- end #colmain -->


  <div id="leftcol" class="col col-sm-5 col-md-15 bg-other"></div>


  <div id="rightcol" class="col col-sm-5 col-md-15 bg-other"></div>


</div><!-- end #content-wrapper -->

<?php get_footer(); ?>

<script src="<?php echo home_url('/js/application.min.js'); ?>"></script>

</body>
</html>
