<?php
/**
 * Single Post Featured Image
 */
 $feat_img_id = get_post_thumbnail_id( $post->ID );
 $feat_img_src_text = get_post_meta( $feat_img_id, 'source_text', true );
 $feat_img_src_link = get_post_meta( $feat_img_id, 'source_link', true );
?>
<?php if( FII_UTIL::fii_has_featured_img() ): $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0]; ?>
  <div class="featured-img" style="background-image:url(<?php _e( $image_url );?>);" role="img" aria-label="<?php _e( get_the_title( $post->ID ) ); ?>">
    <?php if( $feat_img_src_text ): ?>
      <div class="feat-img-src">» Featured Image source:
        <?php if( !$feat_img_src_link ){ echo $feat_img_src_text; } else { _e("<a href='$feat_img_src_link'>$feat_img_src_text</a>"); } ?>
      </div>
    <?php endif;?>
  </div>
<?php endif;?>
