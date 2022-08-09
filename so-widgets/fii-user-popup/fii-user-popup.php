<?php
/*
	Widget Name: FII User Popup
	Description: User grid with popup
	Author: Stephen Anil, Sputznik
	Author URI:	https://sputznik.com
	Widget URI:
	Video URI:
*/
class FII_User_Popup extends SiteOrigin_Widget {

	function __construct() {
		//Here you can do any preparation required before calling the parent constructor, such as including additional files or initializing variables.
		//Call the parent constructor with the required arguments.
		parent::__construct(
			// The unique id for your widget.
			'fii-user-popup',
			// The name of the widget for display purposes.
			__('FII User Popup', 'siteorigin-widgets'),
			// The $widget_options array, which is passed through to WP_Widget.
			// It has a couple of extras like the optional help URL, which should link to your sites help or support page.
			array(
				'description' => __('User grid with popup.', 'siteorigin-widgets'),
				'help'        => '',
			),
			//The $control_options array, which is passed through to WP_Widget
			array(),
			//The $form_options array, which describes the form fields used to configure SiteOrigin widgets. We'll explain these in more detail later.
			array(
				'fii_users' => array(
					'type' 	=> 'repeater',
					'label' => __( 'Panels' , 'siteorigin-widgets' ),
					'item_label' => array(
						'selector' => "[id*='user_name']",
						'update_event' => 'change',
						'value_method' => 'val'
					),
					'fields' => array(
						'user_image' => array(
							'type' 		=> 'media',
							'label' 	=> __( 'Profile Picture', 'siteorigin-widgets' ),
							'choose' 	=> __( 'Choose image', 'siteorigin-widgets' ),
							'update' 	=> __( 'Set image', 'siteorigin-widgets' ),
							'library' 	=> 'image',
							'fallback' 	=> false
						),
						'user_name' => array(
							'type' 			=> 'text',
							'label' 		=> __( 'Name', 'siteorigin-widgets' ),
							'default' 	=> '',
						),
						'user_role' => array(
							'type' 			=> 'text',
							'label' 		=> __( 'Company / Role', 'siteorigin-widgets' ),
							'default' 	=> '',
						),
						'user_bio' => array(
							'type' => 'tinymce',
							'label' => __( 'About', 'siteorigin-widgets' ),
							'default' => '',
							'rows' => 10,
							'default_editor' => 'tinymce'
						),
						'linkedin_profile' => array(
							'type' 			=> 'text',
							'label' 		=> __( 'Linkedin Profile URL', 'siteorigin-widgets' ),
							'default' 	=> '',
						),
						'twitter_profile' => array(
							'type' 			=> 'text',
							'label' 		=> __( 'Twitter Profile URL', 'siteorigin-widgets' ),
							'default' 	=> '',
						),


					)
				),

			),
			//The $base_folder path string.
			get_template_directory()."/so-widgets/fii-user-popup"
		);
	}

	function get_template_name($instance) {
		return 'template';
	}
	function get_template_dir($instance) {
		return 'templates';
	}
    function get_style_name($instance) {
        return '';
    }
}
siteorigin_widget_register('fii-user-popup', __FILE__, 'FII_User_Popup');
