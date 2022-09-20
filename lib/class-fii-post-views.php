<?php

class FII_POST_VIEWS extends FII_BASE {

	private $count_meta_key;

	function __construct() {

		$this->count_meta_key = 'post_views_count';

		add_action( 'wp_ajax_fii_view_count', array( $this, 'update_count_ajax' ) );
		add_action( 'wp_ajax_nopriv_fii_view_count', array( $this, 'update_count_ajax' ) );

		// POST VIEWS SUPPORT
    add_filter( 'manage_post_posts_columns', array( $this, 'manage_post_posts_columns' ) );
    add_action( 'manage_post_posts_custom_column', array( $this, 'manage_post_posts_custom_column' ), 10, 2 );

		// SHORTCODES
		add_shortcode( 'fii_popular_posts', array( $this, 'fii_popular_posts' ) );

	}

	function update_count_ajax(){

		// CHECK TOKEN / NONCE
	  if( !check_ajax_referer('fii_post_view_count', 'token') ){
	    return wp_send_json_error( 'Invalid Token' );
	  }

		if( isset( $_POST['post_id'] ) && !empty( $_POST['post_id'] ) ){

			$cookie_id = 'fii-pc-'.$_POST['post_id'];

			if( !isset( $_COOKIE[$cookie_id] ) ) {

				// UPDATE COUNT
				$this->update_count( $_POST['post_id'] );

				// SET COOKIE TO PREVENT INCREMENT ON REFRESH
				setcookie( $cookie_id, "incremented", time() + ( 60 * 30 ) );

			}

		}

		wp_die();

	}

	function update_count( $postid ){

		$count = $this->get_count( $postid );

		if ( !$count ) {
			delete_post_meta( $postid, $this->count_meta_key );
			add_post_meta( $postid, $this->count_meta_key, 1 );
		}
		else {
			$count ++;
			update_post_meta( $postid, $this->count_meta_key, $count );
		}

	}

	// RETURNS POST VIEWS COUNT
	function get_count( $postid ){
		$count = get_post_meta( $postid, $this->count_meta_key, true );
		return (int) ( !empty( $count ) ? $count : 0 );
	}

	function manage_post_posts_columns( $columns ) {
    $columns['fii_post_views'] = 'Views';
    return $columns;
  }

  function manage_post_posts_custom_column( $column_name, $post_id ){
    if( $column_name === 'fii_post_views' ){
      echo $this->get_count( $post_id );
    }
  }

	function defaultAtts(){
		return array(
			'posts_per_page' 	=> '7',
			'style'			 			=> 'list'
		);
	}

	function show_fii_posts( $cache_key, $atts, $args ){

		$transient_name = FII_UTIL::getTransientKey( $cache_key, $atts );

		$post_in = get_transient( $transient_name );

		if ( false === $post_in ) {

			$query = new WP_Query( $args );

			if( $query->have_posts() ){

        $post_ids = array();

        while( $query->have_posts() ){
          $query->the_post();
          $post_ids[] = get_the_ID();
        }

        wp_reset_postdata();

        if( count( $post_ids ) ){

					$post_in = implode( ',', $post_ids );

          //setting transient for in seconds -- num_hour * HOUR_IN_SECONDS
					$cache_time = (int) $args['cache'] * HOUR_IN_SECONDS;
          set_transient( $transient_name , $post_in, $cache_time );
        }

      } // end have_posts

		} // end $post_in

		if( $post_in ){

			// REMOVE ATTS THAT ARE NOT PART OF THE ORBIT QUERY
			unset( $args['cache'] );
			unset( $args['date_query'] );

			$args['post__in'] = $post_in;

			$orbit_query_shortcode = '';

			$orbit_query_shortcode = FII_UTIL::getShortcodeString( 'orbit_query', $args );

			echo do_shortcode( $orbit_query_shortcode );

		}

	}

	function fii_popular_posts( $atts ){
		$atts = shortcode_atts( $this->defaultAtts(), $atts, 'fii_popular_posts' );

		$args =  array(
			'post_status' 				=> 'publish',
			'posts_per_page'			=> $atts['posts_per_page'] ? $atts['posts_per_page'] : '7',
			'style'			 					=> $atts['style'] ? $atts['style'] : 'list',
			'cache'	 							=> '6',
			'meta_key'            => $this->count_meta_key,
	    'order'               => 'DESC',
	    'orderby'             => 'meta_value_num'
		);

		ob_start();

		$this->show_fii_posts( 'fii_pp', $atts, $args );

		return ob_get_clean();

	}

}

FII_POST_VIEWS::getInstance();
