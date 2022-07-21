<?php
/**
 * Single Post Featured Image
 */
?>
<?php if( fii_has_featured_img() ): $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0]; ?>
  <div class="featured-img" style="background-image:url(<?php _e( $image_url );?>);" role="img" aria-label="<?php _e( get_the_title( $post->ID ) ); ?>"></div>
<?php endif;?>
