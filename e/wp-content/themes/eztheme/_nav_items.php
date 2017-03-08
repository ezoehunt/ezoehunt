<ul class="navbar-nav mr-auto">

<li class="nav-item<?php if ( in_array('home',$bodyclass) OR is_search() OR is_404() ) { echo ' active'; } ?>">
  <a title="Go to home page" class="nav-link" href="<?php echo home_url('/'); ?>">Home</a>
</li>

<li class="nav-item<?php if ( in_array('category-work',$bodyclass) OR in_array('single-work',$bodyclass) ) { echo ' active'; } ?>">
  <a title="Go to Work section" class="nav-link" href="<?php echo home_url('/work'); ?>">Work</a>
</li>

<!--li class="nav-item<?php //if ( in_array('category-words',$bodyclass) OR in_array('single-words',$bodyclass) ) { echo ' active'; } ?>">
  <a title="Go to Words section" class="nav-link" href="<?php //echo home_url('/words'); ?>">Words</a>
</li-->

<li class="nav-item">
  <a title="Email me" class="nav-link" href="#contacts">Contact</a>
</li>

<!--li class="nav-item">
  <a title="Email me" class="nav-link" href="mailto:<?php echo antispambot("eh@ezoehunt.com"); ?>">Contact</a>
</li-->

</ul>
