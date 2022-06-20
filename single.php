<?php
/**
 * The Template for displaying all single posts
 */
get_header();
?>
<div class="container" style="margin-top:20px;">
  <div id="fii-main-content">
    <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
      <?php get_template_part( 'partials/post/content-single' ); ?>
      <div data-behaviour="post-view-stat" data-id="<?php _e( $post->ID );?>"></div>
    <?php endwhile; endif; ?>
  </div>
  <div id='fii-sidebar'>
    <?php do_action( 'fii_sidebar', 'fii-single-post-sidebar' ); ?>
  </div>
  <div class="fii-clear-footer"></div>
  <?php get_template_part( 'partials/post/related-posts' ); ?>
</div>
<?php get_footer(); ?>
