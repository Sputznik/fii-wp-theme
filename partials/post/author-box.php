<?php
/**
 * The template for displaying author-box on single posts
*/
$authors = get_post_authors();?>
<div class="single-post-author-box">
  <?php
    foreach( $authors as $author ){
      FII_MOLONGUI::fii_author_box( array(
          'id'      => $author->id,
          'type'    => $author->type,
          'name'    => '',
          'class'   => 'post',
          'linked'  => true,
          'size'    => '150'
      ) );
    }
  ?>
</div>
