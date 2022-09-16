<?php

	$inc_files = array(
		'settings/class-fii-theme-customize.php',
		'settings/translations.php',
		'settings/error-404.php'
	);

	foreach( $inc_files as $inc_file ){
		require_once( $inc_file );
	}
