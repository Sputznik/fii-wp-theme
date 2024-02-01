<?php get_template_part('partials/mobile-menu');?>
<?php do_action( 'fii_sidebar', 'fii-topbar' ); ?>
<nav id="fii-navigation" class="navbar" role="navigation">
  <div class="container">
    <?php get_template_part('partials/site-logo'); ?>
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
