<?php
$generalKeys ='Elizabeth Hunt, Making Things and Thinking About Them, UX, UX designer, user experience designer, interaction designer, experience designer';
?>
<meta name="google-site-verification" content="LyDdNPpktO9ARDfK24VqqDNiQXj1akZ_lCytrJc_hfk" />
<meta content="IE=edge" http-equiv="X-UA-Compatible">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<!-- Meta Data -->
<title><?php
  if ( is_single() )
  { echo 'Elizabeth Hunt &#187; '.get_the_title(); }
  else { echo 'Elizabeth Hunt &#187; Making Things &#38; Thinking About Them'; }?></title>
<meta name="description" content="Making Things &#38; Thinking About Them: Work &#38; Words from Elizabeth Hunt"
<meta name="designed_by" content="Elizabeth Hunt" />
<meta name="author" content="Elizabeth Hunt" />
<meta name="copyright" content="Elizabeth Hunt 2006-<?php echo date('Y');?>" />
<meta name="rating" content="general" />
<meta name="keywords" content="<?php
  if ( get_post_meta($post->ID,'_portfolio_keywords',true) ) {
    echo $generalKeys. ', '. get_post_meta($post->ID,'_portfolio_keywords',true);
  }
  elseif ( get_post_meta($post->ID,'_blog_keywords',true) ) {
    echo $generalKeys. ', '. get_post_meta($post->ID,'_blog_keywords',true);
  }
  else { echo $generalKeys; }
  ?>"/>

<!-- Meta Social -->

<!-- Auto discovery -->
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS2 feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="<?php bloginfo('name'); ?> RSS.92 feed" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom 0.3 feed" href="<?php bloginfo('atom_url'); ?>" />
