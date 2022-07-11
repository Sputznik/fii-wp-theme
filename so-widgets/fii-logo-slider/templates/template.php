<?php
	if( !isset( $instance['show_slides'] ) && !$instance['show_slides'] ){
		$instance['show_slides'] = 6;
	}
?>
<div class="fii-logo-sl-full">
	<div class="fii-logo-sl-wrap">
		<section class="fii-logo-slider" data-slides="<?php _e( $instance['show_slides'] );?>" data-behaviour="fii-logo-slider">
			<?php foreach( $instance['slides'] as $slide ): ?>
			<div class="logo-slider-item">
				<img src="<?php _e( wp_get_attachment_url( $slide['image'] ) );?>" />
			</div>
			<?php endforeach;?>
		</section>
	</div>
</div>
