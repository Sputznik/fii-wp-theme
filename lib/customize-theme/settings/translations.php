<?php

	add_action( 'customize_register', function( $wp_customize ){

    $translation_options = array(
      'stories_menu_item' => array(
        'type'    => 'text',
        'label'   => 'Stories Menu Item',
        'default' => 'Stories'
      ),
      'feat_img_src' => array(
        'type'    => 'text',
        'label'   => 'Featured Image Source',
        'default' => 'Featured Image source'
      ),
			'related_posts' => array(
        'type'    => 'text',
        'label'   => 'Related Posts',
        'default' => 'Related Posts'
      ),
			'published_posts' => array(
				'type'    => 'text',
				'label'   => 'Published Posts',
				'default' => 'Published Posts'
			),
      'share_this' => array(
        'type'    => 'text',
        'label'   => 'Share This',
        'default' => 'Share this'
      ),
      'also_read' => array(
        'type'    => 'text',
        'label'   => 'Also Read',
        'default' => 'Also read'
      ),
			'editors_note' => array(
				'type'    => 'text',
				'label'   => 'Editors Note',
				'default' => 'Editors Note'
			),
			'follow_channels' => array(
        'type'    => 'textarea',
        'label'   => 'Follow Channels',
        'default' => 'Follow FII channels on <a href="https://www.youtube.com/channel/UCh9Z5tOOo7D3Jb22K6gItHQ" target="_blank" rel="noopener">Youtube</a> and
											<a href="https://t.me/feminisminindia" target="_blank" rel="noopener">Telegram</a> for latest updates.'
      ),
			'archive_headline' => array(
				'type'    => 'text',
				'label'   => 'Archive Page Headline',
				'default' => 'Archive'
			),
			'orbit_load_more' => array(
				'type'    => 'text',
				'label'   => 'Load More Button',
				'default' => 'Load More'
			),
			'orbit_loading_more' => array(
				'type'    => 'text',
				'label'   => 'Loading More Button',
				'default' => 'Loading ...'
			)
    );

		global $fii_customize;

		$fii_customize->panel( $wp_customize, 'fii_theme_panel', 'Theme Options' );

    $fii_customize->section( $wp_customize, 'fii_theme_panel', 'fii_translation_section', 'Translations', 'Translation Options' );

    foreach( $translation_options as $slug => $translation ){
      $fii_customize->{$translation['type']}( $wp_customize, "fii_translation_section", "[translation][$slug]", $translation['label'], $translation['default'] );
    }


	});
