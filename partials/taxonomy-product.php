<?php
/**
 * The Template for displaying products in a product category, product tag .
 */
get_header();
$term = $wp_query->get_queried_object();
$term_type = ($term->taxonomy == 'product_cat') ? 'category' : 'tag';
?>
<div class="container">
  <h1 class="page-title"><?php _e( $term->name ); ?></h1>
  <div class="products-wrapper">
    <?php echo do_shortcode("[products limit='-1' columns='3' $term_type='".$term->slug."' ]"); ?>
  </div>
</div>
<?php get_footer(); ?>
