<?php if( have_posts() ) : ?>
  <div class="orbit-posts-wrapper">
    <div class="fii-grid fii-grid-3">
      <?php while( have_posts() ) : the_post();?>
        <article class="post-card">
          <?php get_template_part( 'partials/orbit/post-card' );?>
        </article>
      <?php endwhile;?>
    </div>
  </div>
  <!-- PAGINATION -->
 <div class="archive-pagination">
   <?php
     the_posts_pagination(
       array(
         'mid_size' 	=> 1,
         'prev_text' => __( '&laquo;' ),
         'next_text' => __( '&raquo;' ),
       )
     );
   ?>
 </div>
<?php endif; ?>
