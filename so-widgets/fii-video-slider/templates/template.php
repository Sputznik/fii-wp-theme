<?php
  if( !isset( $instance['show_slides'] ) && !$instance['show_slides'] ){
    $instance['show_slides'] = 3;
  }
?>
<div class="fii-vid-sl-full">
  <div class="fii-vid-sl-wrap">
    <div class="fii-video-slider" data-slides="<?php _e( $instance['show_slides'] );?>" data-behaviour="fii-video-slider">
    <?php foreach( $instance['slides'] as $slide ): $image_url = wp_get_attachment_url( $slide['video_thumbnail'] ); ?>
      <a href="<?php _e( $slide['playlist_url'] ); ?>" class="video-slider-item">
        <div class="video-slider-inner">
          <div class="video-meta">
            <h3 class="mt-0 mb-0"><?php _e( $slide['video_title'] ); ?></h3>
            <p class="mb-0">View full playlist »</p>
          </div>
          <div class="fii-thumbnail-bg" <?php if( isset( $image_url ) && $image_url ){ echo 'style="background-image:url('.$image_url.');"'; } ?>></div>
        </div>
      </a>
    <?php endforeach;?>
    </div>
  </div>
</div>
