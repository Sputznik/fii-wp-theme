<?php

/* RETURNS SIDEBAR BASED ON ID */
add_action( 'fii_sidebar', function( $fii_sidebar_id ){
	if( is_active_sidebar( $fii_sidebar_id ) && $fii_sidebar_id ){
		dynamic_sidebar( $fii_sidebar_id );
  }
});

/* HEADER MENU ATTRIBUTES */
add_action('fii_nav_menu', function(){
	global $fii_customize;
  $menu_items = array('stories_1','stories_2','stories_3','stories_4','stories_5');
	$stories = $fii_customize->get_theme_option( 'translation', 'stories_menu_item', 'Stories' );
  $html = '<li class="mega-dropdown">
            <a title="'.$stories.'" href="#" class="dropdown-toggle" aria-haspopup="true">'.$stories.' <span class="caret"></span></a>
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
