  <ul class="navbar-nav">

<li class="nav-item<?php if ( is_front_page() ) { echo ' active'; } ?>">
  <a title="Go to home page" class="nav-link noborder" href="<?php echo home_url('/'); ?>">Home</a>
</li>

<li class="nav-item<?php if ( in_array( 'work',$bodyclass ) OR in_array('post-type-archive-work',$bodyclass) ) { echo ' active'; } ?>">
  <a title="Go to Work section" class="nav-link noborder" href="<?php echo home_url('/work'); ?>">Work</a>
</li>

<li class="nav-item<?php if ( is_category('words') OR in_array('words',$bodyclass) ) { echo ' active'; } ?>">
  <a title="Go to Words section" class="nav-link noborder" href="<?php echo home_url('/words'); ?>">Words</a>
</li>

<li class="nav-item<?php if ( is_page('about') ) { echo ' active'; } ?>">
  <a title="Go to About Me section" class="nav-link noborder" href="<?php echo home_url('/about'); ?>">About Me</a>
</li>

<li class="nav-item">
  <a title="Email me" class="nav-link noborder" href="mailto:<?php echo antispambot("eh@ezoehunt.com"); ?>">Email <i class="fa fa-envelope-o" aria-hidden="true"></i></a>
</li>

</ul>
