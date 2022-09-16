<?php
/**
 * The template for displaying 404 pages (not found)
 */
get_header();
global $fii_customize;
$option = $fii_customize->get_option();

?>
<div class="container wrapper-margin">
  <?php
    // CHECK IF THE 404 TEMPLATE IS SET FROM THE THEME CUSTOMIZER
    if( !isset( $option['error_404_template'] ) || !$option['error_404_template'] || ( $option['error_404_template'] === 'default' ) ){
      get_template_part( 'partials/default-404' );
    } else{
      $query = new WP_Query( 'pagename='.get_page_by_path( $option['error_404_template'] )->post_name );
      while ( $query->have_posts() ) : $query->the_post(); the_content(); endwhile;
		 	wp_reset_postdata();
    }
  ?>
</div>
<?php get_footer(); ?>
