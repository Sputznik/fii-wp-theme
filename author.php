<?php
/**
 * The template for displaying author page
 */
get_header();

$current_author_id =  get_the_author_meta( 'ID' );
$is_current_author_guest = is_guest_author();
$current_author_type = !$is_current_author_guest ? 'user' : 'guest';
?>
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
<div class="container author-page">
  <div class="orbit-posts-wrapper">
    <h2>Published Posts</h2>
    <?php if( have_posts() ){
        echo do_shortcode( FII_MOLONGUI::fii_get_author_posts( $current_author_id, $current_author_type ) );
      }
    ?>
  </div>
</div>
<?php get_footer(); ?>
