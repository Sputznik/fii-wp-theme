<?php

class FII_SHORTCODE {

    public function __construct() {
      add_shortcode( 'fii_read', array( $this, 'fii_read' ) );
    }

    public function fii_read( $atts ) {
      $args = shortcode_atts( array(
        'text'  => 'Link Text',
        'url'   => '#'
      ), $atts );
      ob_start(); ?>
      <div class="fii-read fii-dec-bf fii-dec-af">
        <span class="title">» Also read: </span>
        <a href="<?php _e( $args['url'] );?>"><?php _e( $args['text'] );?></a>
      </div>

      <?php return ob_get_clean();
    }
}

new FII_SHORTCODE;
