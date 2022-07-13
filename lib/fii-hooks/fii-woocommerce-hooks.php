<?php

remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 ); // remove opening divs for the content
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 ); // remove closing divs for the content


/* Opening div for fii content wrapper */
add_action( 'woocommerce_before_main_content', function(){ echo '<div class="container">'; }, 5 );

/* Closinng div for fii content wrapper */
add_action( 'woocommerce_after_main_content', function(){ echo '</div>'; }, 50 );


/* REMOVE BREADCRUMB FROM DEFAULT LOACATION */
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );


/*  RENAME HOME IN WOOCOMMERCE BREADCRUMB */
add_filter( 'woocommerce_breadcrumb_defaults', function( $defaults ){
  $defaults['home'] = 'Shop';
	return $defaults;
} );

/* REPLACE HOME URL IN WOOCOMMERCE BREADCRUMB */
add_filter( 'woocommerce_breadcrumb_home_url', function(){
  return wc_get_page_permalink( 'shop' );
} );

/* REMOVE SIDEBAR FROM SINGLE PRODUCT PAGE  */
add_action( 'wp', function(){
  if ( is_product() ) {
    remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
  }
} );

/* REMOVE TABS FROM SINGLE PRODUCT PAGE */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );


/* REMOVE SKU, CATEGORIES, TAGS FROM SINGLE PRODUCT PAGE */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

/* SHOW CATEGORIES */
add_action( 'woocommerce_single_product_summary', function(){
  global $product;
  ?>
  <div class="product_meta">
    <?php echo wc_get_product_category_list( $product->get_id(), ', ', '<span class="posted_in">' . _n( 'Category:', 'Categories:', count( $product->get_category_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>
  </div>
  <?php
}, 40 );
