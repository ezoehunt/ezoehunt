<?php
/**
* @package eztheme
*/
?>
<!doctype html>
<!--[if IE 8] <html class="no-js lt-ie9"> ![endif]-->
<!--[if gt IE 8] <!--> <html class="ie" lang="en"> <!-- ![endif]-->
<html <?php language_attributes(); ?>>

<head>
  <meta content="IE=edge" http-equiv="X-UA-Compatible">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

  <title>title</title>
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="keywords" content="">
  <link rel="icon" type="image/x-icon" href="<?php echo home_url('/images/favicon.ico'); ?>" />

  <!-- Font + Style -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

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

<?php	//wp_head(); ?>

</head>

<body <?php body_class(); ?>>

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

<?php include '_nav_items.php'; ?>

  </div>

</nav>


<!-- nav for MEDIUM+ devices -->

<nav class="hidden-sm-down">

  <div id="page-top">
    <div class="page-top-arrow"></div>
  </div>

  <div id="logo">
    <a href="" class="noborder hvr-wobble-vertical"><img class="logo" src="/images/logo.png"></a>
    <h1>Elizabeth Hunt</h1>
  </div>

  <div id="nav-medium">
<?php include '_nav_items.php'; ?>
  </div>

</nav>
