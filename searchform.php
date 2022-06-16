<!-- SEARCH BAR FORM  -->
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'fii' ); ?></label>
  <input type="text" placeholder="<?php _e('Search', 'fii'); ?>" class="search-input" name="s" id="s" />
  <button type="submit" class="search-submit" aria-label="search"><i class="fas fa-search"></i></button>
</form>
