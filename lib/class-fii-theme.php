<?php

class FII_THEME {

  public function __construct() {
    add_action( 'wp_enqueue_scripts', array( $this, 'assets' ) );
  }

  function assets() {
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', false, null );
    wp_enqueue_style( 'fii-core-style', FII_THEME_URI.'/css/main.css', array('font-awesome'), time() );
    wp_enqueue_style( 'fii-woocommerce', FII_THEME_URI.'/css/fii-woocommerce.css', array('fii-core-style'), time() );

    //ENQUEUE SCRIPTS
    wp_enqueue_script('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js', array('jquery'), null, true);

    wp_enqueue_script( 'fii-core-js', FII_THEME_URI.'/js/main.js', array('jquery'), time(), true );

    wp_enqueue_script('fii-user-popup', FII_THEME_URI.'/js/fii-user-popup.js', array('jquery'), time(), true ); // SOW USER POPUP SCRIPT

    // FII POST VIEWS COUNT
		if( is_singular( 'post' ) ){
			wp_enqueue_script('fii-post-views', FII_THEME_URI.'/js/fii-post-view-count.js', array('jquery'), time(), true );
			wp_localize_script( 'fii-post-views', 'FII_POST_VIEW', array(
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
		    'token' =>  wp_create_nonce('fii_post_view_count')
		  ) );
		}

    // ENQUEUE THE JS THAT PERFORMS IN-LINK FANCINEESS
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
      wp_enqueue_script( 'comment-reply' );
    }

  }

}

global $fii_theme;

$fii_theme = new FII_THEME;
