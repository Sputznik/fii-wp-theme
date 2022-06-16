<?php
  $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0];
?>
<div class="fii-thumbnail-bg" style="background-image: url( <?php _e( $thumbnail );?> );">
  <a href="<?php _e( get_the_permalink() );?>" class="img-link"></a>
</div>
