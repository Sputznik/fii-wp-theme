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

}
