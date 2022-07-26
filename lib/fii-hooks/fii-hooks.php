<?php

include('fii-widgets.php');

/* EXCERPT LENGTH */
add_filter( 'excerpt_length', function( $length ){
  return 20;
});

/* EXCERPT MORE */
add_filter( 'excerpt_more', function( $more ){
	return '&hellip;';
});

add_action( 'fii_sidebar', function( $fii_sidebar_id ){
	if( is_active_sidebar( $fii_sidebar_id ) && $fii_sidebar_id ){
		dynamic_sidebar( $fii_sidebar_id );
  }
});

/* NESTED BREADCRUMB */
if ( ! function_exists( 'fii_nested_breadcrumb' ) ) {
	function fii_nested_breadcrumb( $cat_id ) {
		$level  = '';
		$parent = get_term( $cat_id, 'category' );

		if( is_wp_error( $parent ) ){ return ''; }

		$name = $parent->name;

		if ( $parent->parent && ( $parent->parent != $parent->term_id ) ) {
      $level .= fii_nested_breadcrumb( $parent->parent );
		}

		$level .= '<span><a class="crumb" href="' . esc_url( get_category_link( $parent->term_id ) ) . '">' . $name . '</a></span><i class="fa fa-angle-right"></i>';

		return $level;
	}
}

/* HEADER MENU ATTRIBUTES */
add_action('fii_nav_menu', function(){

  $menu_items = array('stories_1','stories_2','stories_3','stories_4','stories_5');
  $html = '<li class="mega-dropdown">
            <a title="Stories" href="#" class="dropdown-toggle" aria-haspopup="true">Stories <span class="caret"></span></a>
            <div class="mega-dropdown-menu"><div class="container">';
  foreach ( $menu_items as $item ) {
    $current_item = wp_nav_menu( array(
      'menu'              => $item,
      'theme_location'    => $item,
      'depth'             => 1,
      'container'         => false,
      'menu_class'        => 'mega-menus mb-0 list-unstyled',
      'echo'               => false,
      'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
      'walker'            => new WP_Bootstrap_Navwalker(),
    ) );

    $html .= $current_item;

  }

  $html .= '</div></div></li>';

	$fii_nav_menu_options = apply_filters( 'fii_nav_menu_options', array(
    'menu'              => 'primary',
    'theme_location'    => 'primary',
    'depth'             => 2,
    'container'         => false,
    'menu_class'        => 'menu',
    'items_wrap'        => '<ul id="menu-header" class="%2$s">'.$html.'%3$s</ul>',
    'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
    'walker'            => new WP_Bootstrap_Navwalker(),
	));

	wp_nav_menu( $fii_nav_menu_options );

});

/* CHECK IF THE POST HAS FEATURED IMAGE */
if ( ! function_exists( 'fii_has_featured_img' ) ) {
  function fii_has_featured_img() {
    return !empty( get_the_post_thumbnail() ) ? true : false;
  }
}

/* LIMIT SEARCH TO POST TITLES */
add_filter( 'posts_search', function( $search, $wp_query ){
  global $wpdb;

  if ( empty( $search ) ) return $search; // skip processing - no search term in query

  $q = $wp_query->query_vars;
  $n = ! empty( $q['exact'] ) ? '' : '%';

  $search =
  $searchand = '';

  foreach ( (array) $q['search_terms'] as $term ) {
    $term = esc_sql( $wpdb->esc_like( $term ) );
    $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
    $searchand = ' AND ';
  }

  if ( ! empty( $search ) ) {
    $search = " AND ({$search}) ";
    if ( ! is_user_logged_in() ) $search .= " AND ($wpdb->posts.post_password = '') ";
  }

  return $search;

}, 500, 2 );
