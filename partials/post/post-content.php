<?php
/**
 * The template for displaying single post content.
 */
 global $fii_customize;
?>
<div class="single-post-content"><?php the_content(); ?></div>
<?php if( has_tag() ):?>
  <div class="post-tags">Tagged Under: <?php the_tags( '', '', '' ); ?></div>
<?php endif;?>
<?php FII_MOLONGUI::fii_post_author_box(); ?>
<?php do_action( 'fii_sidebar', 'fii-support-work' );?>
<div class="fii-social-share"><span class="title">» <?php echo $fii_customize->get_theme_option( 'translation', 'share_this', 'Share this' ); ?> </span><?php echo do_shortcode('[addtoany]');?></div>
<div class="follow-channel">
  <?php
    $follow_channel = 'Follow FII channels on <a href="https://www.youtube.com/channel/UCh9Z5tOOo7D3Jb22K6gItHQ" target="_blank" rel="noopener">Youtube</a> and ';
    $follow_channel .= '<a href="https://t.me/feminisminindia" target="_blank" rel="noopener">Telegram</a> for latest updates.';
    echo $fii_customize->get_theme_option( 'translation', 'follow_channels', $follow_channel );
  ?>
</div>
<div class="entry-comments">
<?php
  // If comments are open or we have at least one comment, load up the comment template.
  if ( comments_open() || get_comments_number() ) {
    comments_template();
  }
?>
</div>
