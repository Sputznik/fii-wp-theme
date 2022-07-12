<?php
/**
 * The template for displaying parent category header.
 */
?>
<h1 class="page-title"><?php _e( $category->name ); ?></h1>
<div class="page-description"><?php _e( $description ); ?></div>
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
