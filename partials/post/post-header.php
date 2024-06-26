<?php
/**
 * The template for displaying single post header.
 */
 $author_name   = get_the_author();
 $author_url    = get_author_posts_url( get_the_author_meta('ID') );
 $edit_post_url = admin_url( 'post.php?post='.$post->ID ).'&action=edit&classic-editor__forget';
?>
<div class="fii-single-post-header">
  <div class="fii-breadcrumb">
    <span>
      <?php
        $single_cat = get_the_category( get_the_ID() );
        $first_single_cat  = array_shift( $single_cat );
        if( $first_single_cat ){ echo FII_UTIL::fii_nested_breadcrumb(  $first_single_cat->term_id ); }
      ?>
    <span><?php the_title(); ?></span>
  </div>
  <h1 class="title"><?php the_title();?></h1>
  <?php if( $post->post_excerpt ): ?>
    <div class="sub-title"><?php echo $post->post_excerpt; ?></div>
  <?php endif; ?>
  <div class="post-meta">
    <span class="author">
      By <a href="<?php echo $author_url;?>" title="<?php _e( 'View all posts by '. $author_name );?>"><?php echo $author_name; ?></a>
    </span>
    <span class="dot"></span>
    <span class="post-date"><?php _e( the_time( 'M j, Y' ) );?></span>
    <span class="dot"></span>
    <span><?php echo do_shortcode('[rt_reading_time postfix="min read" postfix_singular="min"]'); ?></span>
    <?php if( current_user_can('administrator') ): ?>
      <span class="dot"></span>
      <span class="edit-post-link"><a href="<?php _e( $edit_post_url );?>">Edit Post</a></span>
    <?php endif; ?>
  </div>
  <div class="fii-social-share"><?php echo do_shortcode('[addtoany]');?></div>
</div>
