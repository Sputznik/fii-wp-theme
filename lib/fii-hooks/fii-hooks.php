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

// DISABLE SOCIAL SHARE ON 404 PAGE
add_filter( 'addtoany_sharing_disabled', function(){
	if( is_404() ){ return true; }
} );

// CUSTOMIZE RSS CONTENT TAG OUTPUT
add_filter( 'the_content_feed', function( $content ){
	$content_character_count = 400; // CHARACTER COUNT

	// RETURN IF CONTENT IS EMPTY
	if( empty( $content ) ) return $content;

	// STRIP HTML TAGS TO COUNT THE CHARACTERS
	$content = strip_tags($content);

	// RETURN IF CONTENT IS EMPTY
	if( empty( $content ) ) return $content;

	// TRUNCATE THE CONTENT AND APPEND '...'
	if( strlen( $content ) > $content_character_count ){
		return substr( $content, 0, $content_character_count ).'...';
	}

	return substr( $content, 0, $content_character_count );
} );

// ADD FEATURED IMAGE LINK IN RSS FEED
add_action( 'rss2_item', function(){
	global $post;

	if( !has_post_thumbnail( $post->ID ) ) return;

	$thumbnail_id = get_post_thumbnail_id( $post->ID );

	if( empty( $thumbnail_id ) ) return;

	$post_thumbnail = wp_get_attachment_image_src( $thumbnail_id, 'full' );

	if( empty( $post_thumbnail ) ) return;

	$mime_type = get_post_mime_type( $thumbnail_id );

	if( empty( $mime_type ) ) return;

	$featured_image_filesize = 0;
	$file_path = get_attached_file( $thumbnail_id );

	// GET FILESIZE
	if( $file_path && file_exists( $file_path ) ){
		$featured_image_filesize = filesize( $file_path );
	}

	if( empty( $featured_image_filesize ) ) return;

	echo '<enclosure url="'.$post_thumbnail[0].'" length="'.$featured_image_filesize.'" type="'.$mime_type.'" />';

} );
