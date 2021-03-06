<?php get_template_part('partials/mobile-menu');?>
<div class="fii-top-bar">
  <strong>
    FII was created with the vision of dismantling patriarchy and social injustice. <a href="#">Learn more here.</a>
  </strong>
</div>
<nav id="fii-navigation" class="navbar navbar-expand-md fixed-top" role="navigation">
  <div class="container">
    <a class="site-logo" href="<?php _e( get_bloginfo('url') ); ?>">
      <img class="logo-mobile" src="<?php _e( FII_THEME_URI . '/assets/logo.png' ); ?>">
    </a>
    <?php do_action('fii_nav_menu'); ?>
    <div class="navbar-buttons">
      <button class="nav-search">
        <i class="fas fa-search"></i>
      </button>
      <button class="navbar-toggler" type="button">
        <i class="fas fa-bars"></i>
      </button>
    </div>
  </div>
</nav>
