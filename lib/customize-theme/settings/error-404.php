<?php

add_action( 'customize_register', function( $wp_customize ){

  global $fii_customize;;

  $fii_customize->panel( $wp_customize, 'fii_theme_panel', 'Theme Options' );

  $fii_customize->section( $wp_customize, 'fii_theme_panel', 'fii_404_section', '404 Template', 'Change 404 Template' );

  // FETCH ALL THE PAGES FROM BACKEND
  $pages_arr = $fii_customize->get_error_template();

  $fii_customize->dropdown( $wp_customize, 'fii_404_section', '[error_404_template]', '404 Template', 'default', $pages_arr );

});
