<div id="<?php _e( $atts['id'] );?>" class="fii-featured-grid" data-target="<?php _e('li.post-item');?>" data-url="<?php _e( $atts['url'] );?>">
  <?php $i = 1; while( $this->query->have_posts() ) : $this->query->the_post();?>
  <article class="post-item<?php if( $i == 1){ echo ' wide'; }?>">
    <?php include( locate_template( 'partials/orbit/featured-grid.php' ) ); ?>
  </article>
  <?php $i++; endwhile;?>
</div>
