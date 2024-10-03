<?php

	if ( ! defined( 'ABSPATH' ) ) {
		exit;
	}

	/**
	 * Add Carbon Fields
	 */

	add_action( 'after_setup_theme', 'carbon_load' );

	function carbon_load() {
		require get_template_directory() . '/vendor/autoload.php';
		\Carbon_Fields\Carbon_Fields::boot();
	}

	/**
	 * WPML Support
	 */

	function dolphincargo_lang_prefix() {
		$prefix = '';
		if ( ! defined( 'ICL_LANGUAGE_CODE' ) ) {
			return $prefix;
		}

		$prefix = '_' . ICL_LANGUAGE_CODE;
		return $prefix;
	}

	/**
	 * Add Blocks
	 */

	require ('carbon-blocks/page-option.php');
	require ('carbon-blocks/post-types.php');
	require ('carbon-blocks/page-home.php');
	require ('carbon-blocks/page-about.php');
	require ('carbon-blocks/page-how-we-work.php');
	require ('carbon-blocks/page-services.php');