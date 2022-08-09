jQuery.fn.fii_user_modal = function() {

	return this.each(function() {

		var $el           = jQuery(this),
        $image         = $el.find('.thumbnail-bg'),
				imageUrl			=	$image.attr('style'),
        name          = $el.find('.name').text(),
        role          = $el.find('.role').text(),
        bio           = $el.find('.bio').html(),
        social_links  = $el.data('social');

    // CREATES DYNAMIC USER MODAL
		$el.on( 'click', function() { $el.createModal(); });

    // FII USER MODAL LAYOUT
    $el.createModal = function() {

      html = `
      <div id="fii-user-modal" class="fii-modal" tabindex="-1" role="dialog">
				<div class="modal-backdrop"></div>
				<div class="modal" role="dialog" aria-labelledby="modalTitle" aria-describedby="modalDescription">
					<div class="modal-header" id="modalTitle">
						<button class="close-modal" type="button" aria-label="Close modal"><i class="fas fa-times"></i></button>
					</div>
					<div class="modal-body">
						<div class="fii-card-body">
							<div class="thumbnail-bg" style="${imageUrl}"></div>
							<div class="meta">
								<h5 class="name">${name}</h5>
								<span class="role">${role}</span>
								<div class="fii-dec-af"></div>
								<div class="bio">${bio}</div>
								<ul class="social-links list-unstyled">
									${social_links.linkedin ?
										`<li>
											<a href="${social_links.linkedin}" target="_blank" aria-label="linkedin">
												<i class="fab fa-linkedin-in" aria-hidden="true"></i>
											</a>
										</li>` : ''}
									${social_links.twitter ?
										`<li>
											<a href="${social_links.twitter}" target="_blank" aria-label="twitter">
												<i class="fab fa-twitter" aria-hidden="true"></i>
											</a>
										</li>` : ''}
								</ul><!-- Social Links -->
							</div><!-- Meta -->
						</div><!-- Card Body -->
					</div><!-- Modal Body -->
				</div><!-- Modal Dialog -->
			</div><!-- Modal -->
      `;

      jQuery("body").append(html);

			// REMOVES USER MODAL FROM THE DOM
	    jQuery(document).on( 'click', '#fii-user-modal .close-modal', function () {
	      jQuery('#fii-user-modal').remove();
	    });

		}

	}); //End each()

};

jQuery(document).ready(function () {
	jQuery('[data-behaviour~=fii-user-modal]').fii_user_modal();
});
