<?php get_template_part('partials/fii-thumbnail-bg');?>
<div class="post-desc">
	<h4 class="title"><a href="<?php _e( get_the_permalink() );?>"><?php the_title();?></a></h4>
	<p class="author">By <?php FII_MOLONGUI::fii_author_posts_link( $post->ID ); ?></a>
  </p>
	<span class="meta"><?php echo do_shortcode('[rt_reading_time postfix="min read" postfix_singular="min"]'); ?> | <?php the_time( 'M j, Y' );?></span>
</div>
