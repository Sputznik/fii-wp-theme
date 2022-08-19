<?php
add_action( 'widgets_init', function(){

  register_sidebar( array(
    'name' 			    => 'FII Topbar',
    'description'   => 'Appears above the primary navigation menu',
    'id' 			      => 'fii-topbar',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' 	=> '</aside>',
    'before_title' 	=> '<h3 class="widget-title">',
    'after_title' 	=> '</h3>',
  ));

  register_sidebar( array(
    'name' 			    => 'Single Post Sidebar',
    'description'   => 'Appears in the single post page before the pre-footer area',
    'id' 			      => 'fii-single-post-sidebar',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' 	=> '</aside>',
    'before_title' 	=> '<h3 class="widget-title">',
    'after_title' 	=> '</h3>',
  ));

  register_sidebar( array(
    'name' 			    => 'Support the work',
    'description'   => 'Appears in the single post page before the social share area',
    'id' 			      => 'fii-support-work',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' 	=> '</aside>',
    'before_title' 	=> '<h3 class="widget-title">',
    'after_title' 	=> '</h3>',
  ));

  register_sidebar( array(
    'name' 			    => 'Category Sidebar',
    'description'   => 'Appears in the category page before the footer area',
    'id' 			      => 'fii-category-sidebar',
    'before_widget' => '<aside id="%1$s" class="widget %2$s fii-dec-bf">',
    'after_widget' 	=> '</aside>',
    'before_title' 	=> '<h3 class="widget-title">',
    'after_title' 	=> '</h3>',
  ));

  register_sidebar( array(
    'name' 			    => 'Shop Page Header',
    'description'   => 'Appears in the shop page after the primary navigation',
    'id' 			      => 'fii-shop-header',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' 	=> '</aside>',
    'before_title' 	=> '<h3 class="widget-title">',
    'after_title' 	=> '</h3>',
  ));

  register_sidebar( array(
    'name' 			    => 'Footer',
    'id' 			      => 'footer-sidebar',
    'description' 	=> 'Appears in the footer area',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' 	=> '</aside>',
    'before_title' 	=> '<h3 class="widget-title">',
    'after_title' 	=> '</h3>',
  ));

});
