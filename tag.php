<?php
/**
 * The template for displaying tag page
 */
get_header();
$tag = get_queried_object();
?>
<div class="container wrapper-margin">
  <div class="tag-header">
    <h1 class="page-title"><?php _e( $tag->name ); ?></h1>
    <div class="page-description"><?php _e( $tag->description ); ?></div>
  </div>
  <?php get_template_part( 'partials/grid3-numbered-pagination' );?>
  <div class="tag-sidebar">
    <?php if ( is_active_sidebar( 'fii-category-sidebar' ) ) { dynamic_sidebar( 'fii-category-sidebar' ); } ?>
  </div>
</div>
<?php get_footer(); ?>
