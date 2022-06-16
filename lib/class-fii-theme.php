<?php

class FII_THEME {

  public function __construct() {
    add_action( 'wp_enqueue_scripts', array( $this, 'assets' ) );
  }

  function assets() {
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', false, null );
    wp_enqueue_style( 'fii-core-style', FII_THEME_URI.'/css/main.css', array('font-awesome'), time() );

    //ENQUEUE SCRIPTS
    wp_enqueue_script('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js', array('jquery'), null, true);

    wp_enqueue_script( 'fii-core-js', FII_THEME_URI.'/js/main.js', array('jquery'), time(), true );

  }

}

global $fii_theme;

$fii_theme = new FII_THEME;
