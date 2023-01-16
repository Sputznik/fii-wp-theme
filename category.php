<?php
/**
 * This template will display category page
 */
get_header();
$category = $wp_query->get_queried_object();
$description = $category->category_description;
?>
<div class="container wrapper-margin">
  <div class="category-header">
    <?php
      if( $category->parent == 0 ) {
        include( locate_template( 'partials/category/parent-cat-header.php' ) );
      } else {
        include( locate_template( 'partials/category/sub-cat-header.php' ) );
      } ?>
  </div>
  <?php get_template_part( 'partials/grid3-numbered-pagination' );?>
  <div class="category-sidebar">
    <?php if ( is_active_sidebar( 'fii-category-sidebar' ) ) { dynamic_sidebar( 'fii-category-sidebar' ); } ?>
  </div>
</div>
<?php get_footer(); ?>
