<?php
  $thumbnail = get_the_post_thumbnail( $post->ID, 'full', array( 'alt'=> 'Featured Image' ) );
?>
<a href="<?php _e( get_the_permalink() );?>" class="fii-fluid-thumbnail">
  <?php if( $thumbnail ): echo $thumbnail; ?>
  <?php else: ?>
    <div class="no-thumbnail" aria-hidden="true"></div>
  <?php endif;?>
</a>
