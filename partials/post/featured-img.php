<?php
/**
 * Single Post Featured Image
 */
 $feat_img_id = get_post_thumbnail_id( $post->ID );
 $feat_img_src_text = get_post_meta( $feat_img_id, 'source_text', true );
 $feat_img_src_link = get_post_meta( $feat_img_id, 'source_link', true );
?>
<?php if( FII_UTIL::fii_has_featured_img() ): $image_url = get_the_post_thumbnail( $post->ID, 'full', array( 'alt'=> 'Featured Image' ) ); ?>
  <div class="featured-img">
    <?php echo $image_url; ?>
    <?php if( $feat_img_src_text ): global $fii_customize; ?>
      <div class="feat-img-src">» <?php echo $fii_customize->get_theme_option( 'translation', 'feat_img_src', 'Featured Image source' ); ?>:
        <?php if( !$feat_img_src_link ){ echo $feat_img_src_text; } else { _e("<a href='$feat_img_src_link'>$feat_img_src_text</a>"); } ?>
      </div>
    <?php endif;?>
  </div>
<?php endif;?>
