<?php
/**
 * The template for displaying sub-category header.
 */
$parent_term = get_term( $category->parent, 'category' );
?>
<nav aria-label="Breadcrumb" class="subcat-breadcrumb">
  <ol class="list-unstyled">
    <li>
      <a href="<?php _e( get_category_link( $parent_term->term_id ) );?>"><?php _e( $parent_term->name ); ?></a>
      <i class="fas fa-angle-right" aria-hidden="true"></i>
    </li>
    <li aria-current="page"><?php _e( $category->name ); ?></li>
  </ol>
</nav>
<div class="page-description"><?php _e( $description ); ?></div>
