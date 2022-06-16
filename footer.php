
    </main> <!-- end of main section  -->
    <footer>
      <div class="container">
        <?php if ( is_active_sidebar( 'footer-sidebar' ) ) { dynamic_sidebar( 'footer-sidebar' ); } ?>
      </div>
      <div class="scroll-top"><a href="#top" class="back-to-top"><i class="fas fa-angle-up"></i></a></div>
    </footer>
    <!-- SEARCH MODAL -->
    <div id="search-modal" class="fii-modal" tabindex="-1" role="dialog">
      <div class="modal-backdrop"></div>
      <div class="modal" role="dialog" aria-labelledby="modalTitle" aria-describedby="modalDescription">
        <div class="modal-header" id="modalTitle">
          <button class="close-modal" type="button" aria-label="Close modal"><i class="fas fa-times"></i></button>
        </div>
        <div class="modal-body">
          <div class="search-field">
            <?php get_search_form(); ?>
          </div>
        </div>
      </div>
    </div> <!-- end of #site  -->
<?php wp_footer(); ?>
</body>
</html>
