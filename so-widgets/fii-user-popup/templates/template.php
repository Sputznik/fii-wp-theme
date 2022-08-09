<!-- USER POPUP -->
<div class="fii-user-grid">
  <?php
  foreach( $instance['fii_users'] as $item ): $image = wp_get_attachment_url( $item['user_image'] );

    $social_links = array(
      'linkedin'   => !empty( $item['linkedin_profile'] )   ? $item['linkedin_profile'] : '',
      'twitter'    => !empty( $item['twitter_profile'] )   ? $item['twitter_profile'] : ''
    ); ?>
    <div class="fii-user-card">
      <div data-behaviour="fii-user-modal" data-social='<?php _e( json_encode( $social_links ) );?>'>
        <div class="fii-card-body">
          <div class="thumbnail-bg" style="background-image: url('<?php _e( $image );?>');"></div>
          <div class="meta">
            <h5 class="name"><?php _e( $item['user_name'] );?></h5>
            <span class="role"><?php _e( $item['user_role'] );?></span>
          </div>
          <div class="bio" style="display:none;height:0;">
            <?php echo $item['user_bio'];?>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach;?>
</div>
