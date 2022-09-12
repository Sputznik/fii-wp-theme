<?php
/**
 * The Template for displaying all single jobs
 */
get_header();
?>
<div class="container" style="margin-top:20px;">
  <div id="fii-main-content">
    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
      <h1 class="job-title"><?php the_title();?></h1>
      <?php if( FII_UTIL::fii_has_featured_img() ): $image_url = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' )[0]; ?>
        <div class="featured-img" style="background-image:url(<?php _e( $image_url );?>);" role="img" aria-label="<?php _e( get_the_title( $post->ID ) ); ?>"></div>
      <?php endif;?>
      <div class="single-post-content"><?php the_content(); ?></div>
    <?php endwhile; endif; ?>
    <?php do_action( 'fii_sidebar', 'fii-support-work' );?>
  </div>
  <div id='fii-sidebar'>
    <?php do_action( 'fii_sidebar', 'fii-single-post-sidebar' ); ?>
  </div>
  <div class="fii-clear-footer"></div>
</div>
<?php get_footer(); ?>
