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
<?php include 'template-parts/header/_content_head_meta.php'; ?>

<!-- Wordpress included stuff -->
<?php wp_head(); ?>

<!-- Favicon, Fonts, and Style -->
<link rel="icon" type="image/x-icon" href="<?php echo home_url('/images/favicon.ico'); ?>" />
<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
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

<div id="wrapper" class="container-fluid">

<!-- nav for SMALL devices -->
<nav class="navbar navbar-toggleable-sm navbar-inverse bg-inverse hidden-md-up">

  <div class="navbar-header" style="">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="noborder"><img class="navicon" src="/images/navicon.png" style=""></span>
    </button>
    <a title="Go to home page" class="navbar-brand noborder" href="<?php echo esc_url( home_url('/') ); ?>"><img src="<?php echo home_url('/images/logo.png'); ?>" alt="<?php esc_attr(bloginfo('name')); ?>" width="50" height="50" /> <span>Elizabeth Hunt</span></a>
  </div>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">

<?php include 'template-parts/header/_nav_items.php'; ?>

  </div>

</nav>

<!-- nav for MEDIUM+ devices -->
<nav class="hidden-sm-down">

  <div id="page-top">
    <div class="page-top-arrow"></div>
  </div>

  <div id="logo">
    <a title="Go to home page" href="<?php echo esc_url( home_url('/') ); ?>" class="noborder hvr-wobble-vertical"><img class="logo" src="/images/logo.png">
    <h3>Elizabeth Hunt</h3></a>
  </div>

  <div id="nav-medium">
<?php include 'template-parts/header/_nav_items.php'; ?>
  </div>

</nav>
