<?php
/**
* @package ehtheme
*
* Based on Twentyseventeen Wordpress theme
*
* Search Form template
*
*/
?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form id="search-form" role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

  <label for="<?php echo $unique_id; ?>">
    <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'ehtheme' ); ?></span>
  </label>

  <div class="row" style="width:100%;position:relative;">

    <button class="btn-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i>
      <span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'ehtheme' ); ?></span></button>

    <input id="search-input" type="search" id="<?php echo $unique_id; ?>" class="form-control" placeholder="Search for..." value="<?php echo get_search_query(); ?>" name="s">

  </div>

</form>
