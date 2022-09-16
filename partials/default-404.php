<div class="error-header">
  <h1>Ooops… Error 404</h1>
  <p>Sorry, but the page you are looking for doesn’t exist.</p>
  <?php echo do_shortcode("[fii_button text='Go To Homepage' url='".get_bloginfo('url')."' align='center']"); ?>
</div>
<div class="orbit-posts-wrapper">
  <h2>Latest Posts</h2>
  <?php echo do_shortcode("[orbit_query posts_per_page='6' style='grid3']"); ?>
</div>
