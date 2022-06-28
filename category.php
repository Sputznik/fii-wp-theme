<?php
/**
 * This template will display category page
 */
get_header();
$category = $wp_query->get_queried_object();
?>
<div class="container" style="margin-top:20px;margin-bottom: 40px;">
  <div class="category-header">
    <h1 class="page-title"><?php _e( $category->name ); ?></h1>
    <div class="page-description"><?php _e( $category->category_description ); ?></div>
    <div class="fii-category-children">
      <?php if( $category->parent == 0 ):
        $args             = array(
          'order'        => 'ASC',
          'orderby'      => 'name',
          'taxonomy'     => 'category',
          'child_of'     => $category->term_id,
        );
        $term_children = get_categories( $args );
      ?>
        <?php if( !empty( $term_children ) ): ?>
          <ul class="list-unstyled mb-0">
            <li><a href="<?php _e( get_category_link( $category->term_id ) );?>" class="parent-cat">All</a></li>
            <?php foreach ( $term_children as $term ): ?>
              <li><a href="<?php _e( get_category_link( $term->term_id ) );?>"><?php _e( $term->name ); ?></a></li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      <?php endif; ?>
    </div>
  </div>
  <div class="orbit-posts-wrapper">
    <?php
      $shortcode_str = do_shortcode("[orbit_query posts_per_page='9' style='grid3' cat='".$category->term_id."' pagination='1' ]");
      if( strlen( $shortcode_str ) > 0 ){ echo $shortcode_str; }
    ?>
  </div>
  <div class="category-sidebar">
    <?php if ( is_active_sidebar( 'fii-category-sidebar' ) ) { dynamic_sidebar( 'fii-category-sidebar' ); } ?>
  </div>
</div>
<?php get_footer(); ?>
