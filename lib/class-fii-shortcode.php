<?php

class FII_SHORTCODE extends FII_BASE {

    public function __construct() {
      add_shortcode( 'fii_read', array( $this, 'fii_read' ) );
      add_shortcode( 'fii_button', array( $this, 'fii_button' ) );
    }

    public function fii_read( $atts ) {
      $args = shortcode_atts( array(
        'text'  => 'Link Text',
        'url'   => '#'
      ), $atts );
      ob_start(); ?>
      <div class="fii-read fii-dec-bf fii-dec-af">
        <span class="title">» <?php _e( 'Also read', 'fii-wp-theme' );?>: </span>
        <a href="<?php _e( $args['url'] );?>"><?php _e( $args['text'] );?></a>
      </div>

      <?php return ob_get_clean();
    }

    public function fii_button( $atts ) {
      $img = FII_THEME_URI.'/assets/images/slash.jpg';

      $args = shortcode_atts( array(
        'text'  => 'Link Text',
        'url'   => '#',
        'style' => 'default',  //default, dark
        'align' => 'left'     // left, right, center
      ), $atts );
      ob_start(); ?>
      <div class="fii-btn-<?php _e( $args['align'] ); ?>">
        <a href="<?php _e( $args['url'] );?>" class="fii-btn-sh fii-btn-sh-<?php _e( $args['style'] );?>">
          <span class="btn-text"><?php _e( $args['text'] );?></span>
          <span class="fii-btn-img" style="background-image:url(<?php _e( $img );?>);" role="img" aria-hidden="true"></span>
        </a>
      </div>
      <?php return ob_get_clean();
    }
}

FII_SHORTCODE::getInstance();
