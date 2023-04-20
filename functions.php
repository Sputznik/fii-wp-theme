<?php

/*  CONSTANTS */
if( !defined( 'FII_THEME_PATH' ) ) {
  define( 'FII_THEME_PATH', get_template_directory() );
}

if( !defined( 'FII_THEME_URI' ) ) {
  define( 'FII_THEME_URI', get_template_directory_uri() );
}

if( !defined( 'FII_THEME_VERSION' ) ) {
  define( 'FII_THEME_VERSION', '1.0.1' );
}

// INCLUDE FILES
$inc_files = array(
  'lib/class-fii-base.php',
  'lib/class-fii-theme.php',
  'lib/customize-theme/customize-theme.php',
  'lib/fii-admin/class-fii-admin.php',
  'lib/wp-bootstrap-navwalker.php',
  'lib/fii-hooks/fii-hooks.php',
  'lib/class-fii-shortcode.php',
  'lib/class-fii-post-views.php',
  'lib/fii-hooks/fii-woocommerce-hooks.php',
  'lib/class-fii-molongui.php',
  'lib/class-fii-util.php'
);

foreach( $inc_files as $inc_file ){ require_once( $inc_file ); }
