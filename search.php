<?php
/**
 * The template for displaying search results.
 */
	get_header();
	$search_str = get_search_query();
?>

<div class="container search-page wrapper-margin">
	<?php if ( have_posts() ) : ?>
		<h1 class="page-title">
			Search Results <?php if( strlen( trim( $search_str ) ) != 0 ){ printf( esc_html__( 'for: "%s"', 'fii-wp-theme' ), $search_str ); }?>
		</h1>
		<div class="orbit-posts-wrapper fii-dec-af">
			<?php
				 echo do_shortcode("[orbit_query posts_per_page='9' style='grid3' s='".$search_str."' pagination='1' ]");
			?>
		</div>
		<?php else : ?>
		<div class="fii-nothing-found">
			<h2><?php _e( 'Sorry, we couldn’t find any matching results.', 'fii-wp-theme' ); ?></h2>
			<button data-behaviour="fii-search-modal"><?php _e( 'Search Again', 'fii-wp-theme' );?></button>
		</div>
	<?php endif; ?>
</div>
<?php get_footer(); ?>
