<div class="fii-single-post-header">
  <div class="fii-breadcrumb">
    <span><a class="crumb" href="<?php bloginfo('url');?>">Home</a></span><i class="fa fa-angle-right"></i>
    <span>
      <?php
        $single_cat = get_the_category( get_the_ID() );
        $first_single_cat  = array_shift( $single_cat );
        if( $first_single_cat ){ echo fii_nested_breadcrumb(  $first_single_cat->term_id ); }
      ?>
    <span><?php the_title(); ?></span>
  </div>
  <h1 class="title"><?php the_title();?></h1>
  <?php if( $post->post_excerpt ): ?>
    <div class="sub-title"><?php echo $post->post_excerpt; ?></div>
  <?php endif; ?>
  <div class="post-meta">
    <span class="author">
      By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>
    </span>
    <span class="dot"></span>
    <span class="post-date"><?php _e( the_time( 'F j, y' ) );?></span>
    <span class="dot"></span>
    <span><?php echo do_shortcode('[rt_reading_time postfix="min read" postfix_singular="min"]'); ?></span>
  </div>
  <div class="fii-social-share"><?php echo do_shortcode('[addtoany]');?></div>
</div>
