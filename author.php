<?php
/**
 * The template for displaying author page
 */
get_header();

$current_author_id =  get_the_author_meta( 'ID' );
$is_current_author_guest = FII_MOLONGUI::is_guest_author();
$current_author_type = !$is_current_author_guest ? 'user' : 'guest';
?>
<?php if( FII_MOLONGUI::is_active_molongui_shortcode() ): ?>
  <div class="author-header">
    <div class="container">
      <?php
        FII_MOLONGUI::fii_author_box( array(
          'id'      => $current_author_id,
          'type'    => $current_author_type,
          'name'    => !$is_current_author_guest ? get_the_author() : '',
          'class'   => 'profile',
          'linked'  => false,
          'size'    => '200'
        ) );
      ?>
    </div>
  </div>
<?php endif; ?>
<?php $shortcode_str = do_shortcode( FII_MOLONGUI::fii_get_author_posts( $current_author_id, $current_author_type ) ); ?>
<?php if( strlen( $shortcode_str ) > 0 ): ?>
  <div class="container author-page">
    <div class="orbit-posts-wrapper">
      <h2>Published Posts</h2>
      <?php echo $shortcode_str; ?>
    </div>
  </div>
<?php endif; ?>
<?php get_footer(); ?>
