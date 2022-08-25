<?php
  $author_type = " id='".$fii_author['id']."' type='".$fii_author['type']."' display_errors='no'";
  $author_bio = "[molongui_author_bio $author_type]";
  $author_url = do_shortcode("[molongui_author_url $author_type]");
  $author_name = $fii_author['name'] ? $fii_author['name'] : do_shortcode("[molongui_author_name $author_type]");
  $author_avatar = do_shortcode("[molongui_author_avatar width='".$fii_author['size']."' height='".$fii_author['size']."' $author_type]");
  $author_social = array(
    'facebook'  => 'facebook-f',
    'twitter'   => 'twitter',
    'instagram' => 'instagram'
  );
?>
<div class="<?php _e( $fii_author['class'] );?>-author-box">
  <div class="content-wrapper">
    <div class="author-avatar">
      <?php if( $fii_author['linked'] ):?>
        <a href="<?php _e( $author_url );?>">
          <?php echo $author_avatar;?>
        </a>
      <?php else: echo $author_avatar; endif?>
    </div>
    <div class="author-info">
      <div class="author-name">
        <?php if( $fii_author['linked'] ):?>
          <a href="<?php _e( $author_url );?>"><?php echo $author_name;?></a>
        <?php else: echo $author_name; endif?>
      </div>
      <p class="author-desc">
        <?php echo do_shortcode( $author_bio );?>
      </p>
      <ul class="author-social list-unstyled">
        <?php foreach ( $author_social as $slug => $icon ):?>
          <?php
            $url = '';
            if( $fii_author['type'] == 'user' ){
              $url = get_user_meta( $fii_author['id'], 'molongui_author_'.$slug, true ); // CHECK FOR MOLONGUI USER META

              // CHECK FOR PREVIOUSLY USED THEME BASED USER META IF MOLONGUI USER META IS EMPTY
              if( !$url ){
                $url = get_user_meta( $fii_author['id'], $slug, true );
              }

            } else{
              $url = get_post_meta( $fii_author['id'], '_molongui_guest_author_'.$slug, true );
            }
            if( $url ):?>
            <li>
              <a href="<?php _e( $url );?>" aria-label="<?php _e( $slug );?>">
                <i class="fab fa-<?php _e( $icon );?>" aria-hidden="true"></i>
              </a>
            </li>
          <?php endif;?>
        <?php endforeach;?>
      </ul>
     </div>
  </div>
</div>
