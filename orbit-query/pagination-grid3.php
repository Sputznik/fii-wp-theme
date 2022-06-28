<?php if($atts['pagination'] != '0'): $img = FII_THEME_URI.'/assets/images/slash.jpg'; ?>
<div class='orbit-btn-load-parent fii-load-more'>
	<button data-behaviour='oq-ajax-loading' data-list="<?php _e('#'.$atts['id']);?>" class="load-more" type="button">
    Load More
	</button>
</div>
<?php endif;?>

<style>
.fii-load-more .load-more::after {
	background-image: url('<?php _e($img);?>');
}
</style>
