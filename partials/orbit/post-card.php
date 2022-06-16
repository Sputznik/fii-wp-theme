<?php get_template_part('partials/fii-thumbnail-bg');?>
<div class="post-desc">
	<h4 class="title"><a href="<?php _e( get_the_permalink() );?>"><?php the_title();?></a></h4>
	<p class="author">
    By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>
  </p>
	<span class="meta"><?php echo do_shortcode('[rt_reading_time postfix="min read"]'); ?> | <?php the_time( 'F j, Y' );?></span>
</div>
