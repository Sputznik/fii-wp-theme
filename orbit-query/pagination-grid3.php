<?php
if( $atts['pagination'] != '0' ): $img = FII_THEME_URI.'/assets/images/slash.jpg';
global $fii_customize;
$load_more_text 	 = $fii_customize->get_theme_option( 'translation', 'orbit_load_more', 'Load More' );
$loading_more_text = $fii_customize->get_theme_option( 'translation', 'orbit_loading_more', 'Loading ...' );
?>
<div class='orbit-btn-load-parent fii-load-more'>
	<button data-behaviour='oq-ajax-loading' data-list="<?php _e('#'.$atts['id']);?>" data-loading-text="<?php _e( $loading_more_text );?>" class="load-more" type="button">
		<?php echo $load_more_text; ?>
	</button>
</div>
<?php endif;?>

<style>
.fii-load-more .load-more::after {
	background-image: url('<?php _e($img);?>');
}
</style>
