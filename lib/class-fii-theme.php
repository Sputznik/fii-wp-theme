<?php

/**
 * BOOTSTRAPS THEME SPECIFIC FUNCTIONALITIES
 */
class FII_THEME extends FII_BASE {

  private $sidebars;

  public function __construct() {

    $this->sidebars = array(
      'fii-topbar'  	=> array(
        'name' 				=> __( 'FII Topbar', 'fii-wp-theme' ),
        'description' => __( 'Appears above the primary navigation menu', 'fii-wp-theme' )
      ),
      'fii-single-post-sidebar'	=> array(
        'name' 				=> __( 'Single Post Sidebar', 'fii-wp-theme' ),
        'description' => __( 'Appears in the single post page before the pre-footer area', 'fii-wp-theme' )
      ),
      'fii-above-post-content'	=> array(
        'name' 				=> __( 'Above Single Post Content', 'fii-wp-theme' ),
        'description' => __( 'Appears in the single post page before the post content', 'fii-wp-theme' )
      ),
      'fii-support-work'	=> array(
        'name' 				=> __( 'Support the work', 'fii-wp-theme' ),
        'description' => __( 'Appears in the single post page before the social share area', 'fii-wp-theme' )
      ),
      'fii-category-sidebar'	=> array(
        'name' 				=> __( 'Category Sidebar', 'fii-wp-theme' ),
        'description' => __( 'Appears in the category page before the footer area', 'fii-wp-theme' )
      ),
      'fii-shop-header'	=> array(
        'name' 				=> __( 'Shop Page Header', 'fii-wp-theme' ),
        'description' => __( 'Appears in the shop page after the primary navigation', 'fii-wp-theme' )
      ),
      'footer-sidebar'	=> array(
        'name' 				=> __( 'Footer', 'fii-wp-theme' ),
        'description' => __( 'Appears in the footer area', 'fii-wp-theme' )
      )
    );

    add_action( 'wp_enqueue_scripts', array( $this, 'assets' ) );  // LOAD ASSETS

    add_action( 'after_setup_theme', array(  $this, 'after_setup_theme' ) );  // AFTER THE THEME HAS BEEN ACTIVATED

    add_action( 'widgets_init', array( $this, 'widgets_init' ) );  // INITIALIZE ALL THE WIDGETS IN THE SIDEBAR

    add_filter( 'excerpt_length', function( $length ){ return 20; } );  // EXCERPT LENGTH

    add_filter( 'excerpt_more', function( $more ){ return '&hellip;'; } );  // EXCERPT MORE

    // add_filter( 'posts_search', array( $this, 'fii_posts_search' ), 500, 2 );  // LIMIT SEARCH TO POST TITLES

    /* ADD SOW FROM THE THEME */
    add_action('siteorigin_widgets_widget_folders', function( $folders ){
      $folders[] = FII_THEME_PATH . '/so-widgets/';
      return $folders;
    });

    /* INCREASE POSTS_PER_PAGE FOR CATEGORY / TAG ARCHIVE */
    add_action( 'pre_get_posts', function( $query ){
      if( ! is_admin() && $query->is_main_query() && ( is_category() || is_tag() ) ) $query->set( 'posts_per_page', 15 );
    });

  }

  function assets() {
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', false, null );
    wp_enqueue_style( 'fii-core-style', FII_THEME_URI.'/css/main.css', array('font-awesome'), FII_THEME_VERSION );
    wp_enqueue_style( 'fii-woocommerce', FII_THEME_URI.'/css/fii-woocommerce.css', array('fii-core-style'), FII_THEME_VERSION );

    //ENQUEUE SCRIPTS
    wp_enqueue_script('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js', array('jquery'), null, true);

    wp_enqueue_script( 'fii-core-js', FII_THEME_URI.'/js/main.js', array('jquery'), FII_THEME_VERSION, true );

    wp_enqueue_script('fii-user-popup', FII_THEME_URI.'/js/fii-user-popup.js', array('jquery'), FII_THEME_VERSION, true ); // SOW USER POPUP SCRIPT

    // FII POST VIEWS COUNT
		if( is_singular( 'post' ) ){
			wp_enqueue_script('fii-post-views', FII_THEME_URI.'/js/fii-post-view-count.js', array('jquery'), FII_THEME_VERSION, true );
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

  function after_setup_theme(){

    // REGISTER THEME MENUS
    register_nav_menus( array(
      'primary' 	  => __( 'Primary Menu', 'fii-wp-theme' ),
      'stories_1' 	=> __( 'Stories Menu 1', 'fii-wp-theme' ),
      'stories_2' 	=> __( 'Stories Menu 2', 'fii-wp-theme' ),
      'stories_3' 	=> __( 'Stories Menu 3', 'fii-wp-theme' ),
      'stories_4' 	=> __( 'Stories Menu 4', 'fii-wp-theme' ),
      'stories_5' 	=> __( 'Stories Menu 5', 'fii-wp-theme' )
    ) );


    // REGISTER THEME SUPPORTS
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-slider' );

    show_admin_bar(false);  //HIDE ADMIN BAR FROM THE FRONTEND

  }

  function widgets_init() {
    foreach( $this->sidebars as $id => $sidebar ) {
      $sidebar['id'] = $id;
      $this->register_sidebar( $sidebar );
    }
  }

  function register_sidebar( $sidebar ) {
    register_sidebar( array(
      'name' 			    => $sidebar['name'],
      'id' 			      => $sidebar['id'],
      'description' 	=> $sidebar['description'],
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' 	=> "</aside>",
      'before_title' 	=> '<h3>',
      'after_title' 	=> '</h3>'
    ) );
  }

  function fii_posts_search( $search, $wp_query ){
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
  }

}

FII_THEME::getInstance();
