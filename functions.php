<?php

/*  CONSTANTS */
if( !defined( 'FII_THEME_PATH' ) ) {
  define( 'FII_THEME_PATH', get_template_directory() );
}

if( !defined( 'FII_THEME_URI' ) ) {
  define( 'FII_THEME_URI', get_template_directory_uri() );
}

// INCLUDE FILES
$inc_files = array(
  'lib/class-fii-theme.php',
  'lib/wp-bootstrap-navwalker.php',
  'lib/fii-hooks/fii-hooks.php',
  'lib/class-fii-shortcode.php',
  'lib/class-fii-post-views.php',
  'lib/fii-hooks/fii-woocommerce-hooks.php',
  'lib/class-fii-molongui.php'
);

foreach( $inc_files as $inc_file ){ require_once( $inc_file ); }

/* HIDE ADMIN BAR FROM THE FRONTEND */
add_filter('show_admin_bar', '__return_false');

/** REGISTERING NAV MENU */
add_action( 'init', function(){
  register_nav_menus( array(
    'primary' 	  => __( 'Primary Menu', 'fii' ),
    'stories_1' 	=> __( 'Stories Menu 1', 'fii' ),
    'stories_2' 	=> __( 'Stories Menu 2', 'fii' ),
    'stories_3' 	=> __( 'Stories Menu 3', 'fii' ),
    'stories_4' 	=> __( 'Stories Menu 4', 'fii' ),
    'stories_5' 	=> __( 'Stories Menu 5', 'fii' )
  ));
});

add_action( 'after_setup_theme', function() {
	add_theme_support( 'post-thumbnails' );
  add_theme_support( 'wp-block-styles' );
  add_theme_support( 'responsive-embeds' );
  add_theme_support( 'woocommerce' );
  add_theme_support( 'wc-product-gallery-slider' );
});

/* ADD SOW FROM THE THEME */
add_action('siteorigin_widgets_widget_folders', function( $folders ){
  $folders[] = get_template_directory() . '/so-widgets/';
  return $folders;
});
