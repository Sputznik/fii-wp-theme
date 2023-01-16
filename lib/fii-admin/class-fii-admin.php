<?php

class FII_ADMIN extends FII_BASE {

  var $attachment_fields;

  function __construct(){

    $this->attachment_fields = array(
      'source_text' 	=> array(
        'label' => 'Source Text',
        'helps' => 'If provided, source text will be displayed'
      ),
      'source_link' 	=> array(
        'label' => 'Source Link',
        'helps' => 'If provided, the source text will link here'
      ),
    );

    add_action('admin_enqueue_scripts', array( $this, 'admin_assets' ) );
    add_filter( 'attachment_fields_to_edit', array( $this, 'attachment_fields_to_edit' ), 11, 2 );
    add_filter( 'attachment_fields_to_save', array( $this, 'attachment_fields_to_save' ), 11, 2 );

  }

  function admin_assets(){
    wp_enqueue_style( 'admin-css', FII_THEME_URI. '/css/admin.css', array(), FII_THEME_VERSION );
  }

  function attachment_fields_to_edit( $form_fields, $post = null ){
    foreach ( $this->attachment_fields as $field => $value ) {
      // GET SAVED META VALUE
      $meta = get_post_meta( $post->ID, $field, true );

      // SET FIELD TYPE TO 'text'
      $value['input'] = 'text';

      // SET FIELD VALUE
      $value['value'] = $meta;

      // ADD ALL THE FIELDS TO THE $form_fields array
      $form_fields[$field] = $value;
    }

    // Return $form_fields array
    return $form_fields;

  }

  function attachment_fields_to_save( $post, $attachment ){

    // IF FIELDS ARE NOT EMPTY
    if ( ! empty( $this->attachment_fields ) ) {
      // LOOP THROUGH ALL THE FIELDS
      foreach ( $this->attachment_fields as $field => $values ) {
        // UPDATE META IF NOT EMPTY ELSE DELETE META IF ALREADY EXISTS
        if ( isset( $attachment[$field] ) && $attachment[$field]  ) {
          update_post_meta( $post['ID'], $field, $attachment[$field] );
        } else {
          delete_post_meta( $post['ID'], $field );
        }
      }
    }

    return $post;

  }

}

FII_ADMIN::getInstance();
