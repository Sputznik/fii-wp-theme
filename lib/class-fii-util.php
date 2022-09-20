<?php

class FII_UTIL {

  // NESTED BREADCRUMB
  public static function fii_nested_breadcrumb( $cat_id ) {
    $level  = '';
    $parent = get_term( $cat_id, 'category' );

    if( is_wp_error( $parent ) ){ return ''; }

    $name = $parent->name;

    if ( $parent->parent && ( $parent->parent != $parent->term_id ) ) {
      $level .= self::fii_nested_breadcrumb( $parent->parent );
    }

    $level .= '<span><a class="crumb" href="' . esc_url( get_category_link( $parent->term_id ) ) . '">' . $name . '</a></span><i class="fa fa-angle-right"></i>';

    return $level;
  }

  // CHECK IF THE POST HAS FEATURED IMAGE
  public static function fii_has_featured_img() {
    return !empty( get_the_post_thumbnail() ) ? true : false;
  }

  // PASS ARRAY AS ARGUMENT TO RETURN UNIQUE ID
  public static function getUniqueID( $data ){ return substr( md5( json_encode( $data ) ), 0, 8 ); }

  // PASS BASE NAME AND ARGUMENTS OF AN ARRAY TO RETURN UNIQUE TRANSIENT KEY
  public static function getTransientKey( $base_name, $args ){ return $base_name . self::getUniqueID( $args ); }

  public static function getShortcodeString( $shortcode_str, $atts ){
    $shortcode_str = "[$shortcode_str";
    foreach ($atts as $slug => $value) {
      $shortcode_str .= " $slug='$value'";
    }
    $shortcode_str .= "]";
    return $shortcode_str;
  }

}
