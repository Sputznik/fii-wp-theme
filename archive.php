<?php
/**
 * The template for displaying archive pages
 */
get_header();

global $fii_customize;
$date_query = '';
$archive_query = $wp_query->query;
if( is_day()  ) {
  $date_query = 'year:'.$archive_query['year'].'ANDmonth:'.$archive_query['monthnum'].'ANDday:'.$archive_query['day'];
} elseif( is_month() ) {
  $date_query = 'year:'.$archive_query['year'].'ANDmonth:'.$archive_query['monthnum'];
} elseif( is_year() ){
  $date_query = 'year:'.$archive_query['year'];
}

?>
<div class="container archive-page wrapper-margin">
  <h1 class="page-title"><?php echo $fii_customize->get_theme_option( 'translation', 'archive_headline', 'Archive' ); ?></h1>
  <div class="orbit-posts-wrapper">
    <?php echo do_shortcode("[orbit_query posts_per_page='9' style='grid3' date_query='".$date_query."' pagination='1' ]"); ?>
  </div>
  <div class="archive-sidebar">
    <?php if ( is_active_sidebar( 'fii-category-sidebar' ) ) { dynamic_sidebar( 'fii-category-sidebar' ); } ?>
  </div>
</div>
<?php get_footer(); ?>
