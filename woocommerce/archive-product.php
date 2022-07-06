<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive.
 *
 * Override this template by copying it to yourtheme/woocommerce/archive-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.4.1
 */
get_header();

?>
<div class="shop-header">
  <?php do_action( 'fii_sidebar', 'fii-shop-header' ); ?>
</div>
<div class="container products">
  <?php
    $fii_product_categories = array(
      array(
        'title' => 'FII Membership Plans',
        'cat-slug' => 'membership-plans'
      ),
      array(
        'title' => 'FII Merchandise',
        'cat-slug' => 'fii-merchandise'
      ),
      array(
        'title' => 'FII Research Reports',
        'cat-slug' => 'fii-research-reports'
      )
    );

    foreach ( $fii_product_categories as $category ):
  ?>
    <div class="cat-products">
      <h2 class="title"><?php echo $category['title']?></h2>
      <?php echo do_shortcode("[product_category limit='-1' columns='3' category='".$category['cat-slug']."' ]");?>
    </div>
  <?php endforeach;?>
</div>
<?php get_footer(); ?>
