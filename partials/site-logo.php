<?php
  $site_logo = ( isset( $_SERVER['HTTP_ACCEPT'] ) && strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) ) ? "logo.webp" : "logo.png";
?>
<a class="site-logo" href="<?php _e( get_bloginfo('url') ); ?>">
  <img class="logo-mobile" src="<?php _e( FII_THEME_URI . "/assets/$site_logo" ); ?>">
</a>
