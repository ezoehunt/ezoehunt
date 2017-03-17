<?php
/**
* @package ehtheme
*
* Based on Twentyseventeen Wordpress theme
*
* Header template
*
*/
//Get bodyclasses for comparison in _nav_items
global $bodyclass;
$bodyclass = get_body_class();

// Connect to DB
include('/Users/mozilla/Sites/ezoehunt/connectToWP.php');
//include('/home/rkxgktjc/db/connectToWP.php');

// Remove some things from wp_head()
//remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
//remove_action('wp_head', 'alternate');
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

$generalKeys ='Elizabeth Hunt, Making Things and Thinking About Them, UX, UX designer, user experience designer, interaction designer, experience designer, Code for America, Mozilla';

?>
<!doctype html>
<!--[if IE 8] <html class="no-js lt-ie9"> ![endif]-->
<!--[if gt IE 8] <!--> <html class="ie" lang="en"> <!-- ![endif]-->
<html <?php language_attributes(); ?>>

<head>
<?php include '_content_head_meta.php'; ?>

<!-- Wordpress included stuff -->
<?php wp_head(); ?>

<!-- Favicon, Fonts, and Style -->
<link rel="icon" type="image/x-icon" href="<?php echo home_url('/images/favicon.ico'); ?>" />
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700" rel="stylesheet">
<!--link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet"-->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet">

<link rel="stylesheet" href="<?php echo home_url('/css/application.min.css'); ?>">

<!-- Scripts -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!--script>window.jQuery || document.write('<script src="<?php echo home_url('/js/fallback_jquery.min.js'); ?>"><\/script>')</script-->

</head>

<body <?php body_class(); ?>>

<!-- Google Analytics -->
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-25204728-1']);
_gaq.push(['_trackPageview']);

(function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>

<noscript><div id="nojswarn" class="" style="margin:0;font-size:1em;font-weight:600;font-color:#58414b;letter-spacing:.05rem;">
	<p style="margin:12px 0 12px 30px;">It seems that Javascript is disabled in your browser.</p>
	<p style="margin:0 0 12px 30px;">You can continue, but to experience this website as it was designed, please enable Javascript in your browser.</p>
</div></noscript>

<!--div id="wrapper" class="container"-->

<nav class="row navbar navbar-toggleable-sm">

  <div class="navbar-brand">

    <!-- for Small down -->
    <button class="hidden-md-up navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <img class="navicon" src="/images/navicon.png">
    </button>
    <!-- end for Small down -->

    <a title="Go to home page" href="<?php echo esc_url( home_url('/') ); ?>" class="hvr-wobble-vertical">
      <h3>Elizabeth Hunt</h3>
    </a>

    <!-- for Medium up -->
    <div id="nav-items" class="hidden-sm-down">
      <?php include '_nav_items.php'; ?>
    </div>
    <!-- end for Medium up -->

  </div>

  <!-- for Small down -->
  <div class="hidden-md-up collapse navbar-collapse" id="navbarsExampleDefault">
    <?php include '_nav_items.php'; ?>
  </div>
  <!-- end for Small down -->
</nav>
