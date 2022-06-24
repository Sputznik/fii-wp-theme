<?php
/**
 * The template for displaying single post content.
 */
 $has_featured_img = !empty( get_the_post_thumbnail() ) ? true : false;
?>
<div class="single-post-wrapper">
  <?php get_template_part('partials/post/post-header'); ?>
  <?php if( $has_featured_img ): $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0]; ?>
    <div class="featured-img" style="background-image:url(<?php _e( $image_url );?>);" role="img" aria-label="<?php _e( get_the_title( $post->ID ) ); ?>"></div>
  <?php endif;?>
		<div class="editors-note fii-dec-af">
			<span class="title">» Editor’s Note: </span>
      It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.
		</div>
	<div class="single-post-content"><?php the_content(); ?></div>
  <?php if( $has_featured_img ): $feat_img_src = get_post( get_post_thumbnail_id( $post->ID ) )->post_content;
    if( strlen( trim( $feat_img_src ) ) > 0  ): ?>
  	<div class="feat-img-note fii-dec-bf fii-dec-af">
  		<span class="title">» Featured Image sources: </span><?php _e( $feat_img_src );?>
  	</div>
  <?php endif; endif; ?>
	<?php do_action( 'fii_sidebar', 'fii-support-work' );?>
	<div class="follow-channel">
		Follow FII channels on
		<a href="https://www.youtube.com/channel/UCh9Z5tOOo7D3Jb22K6gItHQ" target="_blank" rel="noopener">Youtube</a> and
		<a href="https://t.me/feminisminindia" target="_blank" rel="noopener">Telegram</a> for latest updates.
	</div>
  <div class="entry-comments">
    <?php
      // If comments are open or we have at least one comment, load up the comment template.
      if ( comments_open() || get_comments_number() ) {
        comments_template();
      }
    ?>
  </div>
</div>
