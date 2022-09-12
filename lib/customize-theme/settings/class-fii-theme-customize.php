<?php


	class FII_THEME_CUSTOMIZE {

		var $option;
		var $option_slug;

		function __construct(){

			$this->option_slug = 'fii_theme';
			$this->option = get_option( $this->option_slug );

		}

		function get_option(){ return $this->option; }

		function get_option_slug( $id = '' ){ return $this->option_slug.$id; }

		function get_one_option( $slug, $default ){
			$option = $this->get_option();

			if( isset( $option[ $slug ] ) && $option[ $slug ] ){
				return $option[ $slug ];
			}

			return $default;
		}

		// RETURNS DEFAULT THEME SETTINGS
		function get_theme_option( $section, $slug, $default ){
			$option = $this->get_option();

			if( isset( $option[$section][ $slug ] ) && $option[$section][ $slug ] ){
				return $option[$section][ $slug ];
			}

			return $default;
		}

		function panel( $wp_customize, $panel_id, $panel_label ){

			$wp_customize->add_panel( $panel_id, array(
				'priority' 		=> 30,
				'capability' 	=> 'edit_theme_options',
				'theme_supports'=> '',
				'title' 			=> $panel_label,
				'description' => '',
			));

		}

		function section( $wp_customize, $panel_id, $section_id, $section_label, $section_desc ){

			$wp_customize->add_section( $section_id , array(
    		'title'       	=> $section_label,
	    	'priority'    	=> 30,
	    	'description' 	=> $section_desc,
	    	'panel'					=> $panel_id
			));

		}

		function text( $wp_customize, $section_id, $setting_id, $setting_label, $default_setting ){

			$setting_id = $this->get_option_slug( $setting_id );

			$wp_customize->add_setting( $setting_id, array(
   			'default' 	=> $default_setting,
   			'capability'=> 'edit_theme_options',
   			'type'      => 'option',
  		));

			$wp_customize->add_control( $setting_id, array(
				'settings' 	=> $setting_id,
	  		'type' 			=> 'text',
	    	'label' 		=> $setting_label,
	  		'section' 	=> $section_id,
      ));

		}

		function textarea( $wp_customize, $section_id, $setting_id, $setting_label, $default_setting ){

			$setting_id = $this->get_option_slug( $setting_id );

			$wp_customize->add_setting( $setting_id, array(
   			'default' 	=> $default_setting,
   			'capability'=> 'edit_theme_options',
   			'type'      => 'option',
  		));

			$wp_customize->add_control( $setting_id, array(
				'settings' 	=> $setting_id,
    		'type' 			=> 'textarea',
	    	'label' 		=> $setting_label,
    		'section' 	=> $section_id,
      ));

		}

		/* wrap add setting function of wp customize */
		function add_setting( $wp_customize, $setting_id, $default_setting ){

			$wp_customize->add_setting( $setting_id, array(
  			'default' 		=> $default_setting,
  			'transport'   => 'postMessage',
  			'type'				=> 'option'
  		));

		}

	}

	global $fii_customize;

	$fii_customize = new FII_THEME_CUSTOMIZE;
