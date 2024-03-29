<?php

class FII_MOLONGUI {

  // RETURNS ORBIT SHORTCODE
  public static function fii_get_author_posts( $author_id, $type = 'user', $per_page = 9 ) {
    return (
      '[orbit_query post_type="post" pagination="1" style="grid3" posts_per_page="'.$per_page.'"
       meta_key="_molongui_author"  meta_value="'.$type.'-'.$author_id.'" ]'
    );
  }

  /**
   * @param array   $fii_author. Array of author arguments.
   *
	 * Possible attributes include:
   *
   * `type: user, guest`
   * `class: post, profile`
   * `linked: true, false` show link to author-page
   * @return Author_Box
   */
  public static function fii_author_box( Array $fii_author ){
    include( locate_template( 'partials/fii-author-box.php' ) );
  }

  // RETURNS SINGLE POST AUTHOR BOX
  public static function fii_post_author_box(){
    if ( self::is_active_molongui_shortcode() && function_exists('molongui_get_authors') ) {
      get_template_part('partials/post/author-box');
    }
  }

  // RETURNS AUTHOR POSTS LINK
  public static function fii_author_posts_link( $post_id ){
    return function_exists( 'get_the_molongui_author_posts_link' ) ? the_molongui_author_posts_link( $post_id ) : the_author_posts_link();
  }

  /**
   * Checks if molongui shortcode is active.
   * @return bool True if active, false otherwise.
   */
  public static function is_active_molongui_shortcode(){
    return shortcode_exists('molongui_author_name');
  }

  /**
   * Checks if the current author is a guest-author.
   * @return bool True if guest-author, false otherwise.
   */
  public static function is_guest_author(){
    global $wp_query;
    return isset( $wp_query->is_guest_author ) ? $wp_query->is_guest_author : false;
  }

}
