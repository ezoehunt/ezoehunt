<ul class="navbar-nav mr-auto">

<li class="nav-item<?php if ( is_front_page() OR is_search() OR is_404() ) { echo ' active'; } ?>">
  <a title="Go to home page" class="nav-link" href="<?php echo home_url('/'); ?>">Home</a>
</li>

<li class="nav-item<?php if ( is_category('work') OR in_array('work',$bodyclass) ) { echo ' active'; } ?>">
  <a title="Go to Work section" class="nav-link" href="<?php echo home_url('/work'); ?>">Work</a>
</li>

<li class="nav-item<?php if ( is_category('words') OR in_array('words',$bodyclass) ) { echo ' active'; } ?>">
  <a title="Go to Words section" class="nav-link" href="<?php echo home_url('/words'); ?>">Words</a>
</li>

<li class="nav-item<?php if ( is_page('about') ) { echo ' active'; } ?>">
  <a title="About Me" class="nav-link" href="<?php echo home_url('/about'); ?>">About Me</a>
</li>

<li class="nav-item">
  <a title="Email me" class="nav-link" href="mailto:<?php echo antispambot("eh@ezoehunt.com"); ?>">Contact <i class="fa fa-envelope-o" aria-hidden="true"></i></a>
</li>

</ul>
